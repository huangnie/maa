<?php
/**
 * Model - the base model
 *
 * @author David Carr - dave@daveismyname.com
 * @version 2.2
 * @date June 27, 2014
 * @date updated Sept 19, 2015
 */

namespace Core;

use Helpers\Database;
use Core\Config;

/**
 * Base model class all other models will extend from this base.
 */
abstract class Model
{

    private $_page = 1;
    private $_pageSize = 15;

    private $_withArr = array();

    /**
     * Hold the database connection.
     *
     * @var object
     */
    private static $_db;

    private $_tab = null;

    private $_isLimit = true;

    /**
     * Create a new instance of the database helper.
     */
    public function __construct()
    {

        /** connect to PDO here. */
        self::$_db = Database::get();
    }


    /**
     * 开始事物
     */
    protected function begin()
    {
        self::$_db->beginTransaction();
    }

    /**
     * 提交事物
     */
    protected function commit()
    {
        self::$_db->commit();
    }

    /**
     * 回滚事物
     */
    protected function rollback()
    {
        self::$_db->rollback();
    }

    protected function table($tab)
    {
        $this->_tab = $tab; 
        return $this;
    }

    protected function add(array $data)
    {   

        $data = array_intersect_key($data, $this->_tab->getInsertField()); 
        return self::$_db->insert($this->_tab->getTableName(), $data);
    }

    protected function modify(array $data, array $where)
    {
        $updateField = $this->_tab->getUpdateField();
        $data = array_intersect_key($data, $updateField);
        if(array_key_exists('update_time', $updateField)) {
            $data['update_time'] = date('Y-m-d H:i:s'); 
        }
        $where = array_intersect_key($where, $this->_tab->getTableField());
        if(count($where)>0 && count($data) > 0) {
            return self::$_db->update($this->_tab->getTableName(), $data, $where);
        } else {
            return false;
        }
    }

    protected function delete(array $where)
    {   
        $where = array_intersect_key($where, $this->_tab->getTableField()); 
        if(count($where)>0) {
            return self::$_db->delete($this->_tab->getTableName(), $where);
        } else {
            return false;
        }
    }

    protected function _deleteById($id=0)
    {
        $this->table($tab);
        return $id > 0 && self::$_db->delete($this->_tab->getTableName(), array('id'=>$id));
    }

    protected function _removeById($tab, $id)
    {
        $this->table($tab);
        return self::$_db->update($this->_tab->getTableName(), array('is_delete' => 'yes'), array('id' => $id));
    }

    protected function _activeById($tab, $id)
    {
        $this->table($tab);
        return self::$_db->update($this->_tab->getTableName(), array('is_delete' => 'no'), array('id' => $id));
    }
 
    protected function getCount()
    {    
        return $this->getResult($this->_tab->tmpSelect('COUNT(*) as count'), 'FETCH_COUNT');
    }

    protected function getPages($pageSize='')
    {
        if(!empty($pageSize)) $this->_pageSize = $pageSize;
        $count = $this->getCount();
        return ceil($count / $this->_pageSize);
    }

    protected function getCell($field='')
    {   
        return $this->getResult($this->_tab->getSelect($field), 'FETCH_CELL');
    }


    /****** 连表查询 ******/
    protected function with($name, $alias = '')
    {
        $ele = $this->_tab->getWithElement($name);
        if(isset($ele['key']) && count($ele['key']) == 2 && isset($ele['tab']) && isset($ele['select'])) {
            $name = !empty($alias) ? $alias : $name;
            $ele['in'] = array();
            $ele['eq'] = null;
            $this->_tab->select($ele['key'][0]);
            $this->_withArr[$name] = $ele;
        }   

        return $this;
    }

    /****** 不作 limit 限制 ******/
    protected function noLimit()
    {
        $this->_isLimit = false;
        return $this;
    }

    protected function getOneRow()
    {  
        $row = $this->getResult($this->_tab->getSelect(), 'FETCH_ROW'); 
        if(!is_array($row) || count($row) == 0) return array();

        if(is_array($this->_withArr) && count($this->_withArr) > 0) {  
            foreach ($this->_withArr as $name => $value) {
                $index = $value['key'][0];
                $this->_withArr[$name]['eq'] = $row[$index];
            }

            $withRet = array();  
            foreach ($this->_withArr as $name => $item) {
                $mapId = $item['key'][1];
                $sql = "SELECT {$item['select']},{$mapId} FROM {$item['tab']} WHERE {$mapId} = {$item['eq']}";       
                          
                $ret = self::$_db->select($sql , array() , 'FETCH_ROWS');
               
                if($item['map'] == 'one') {  
                    if(count($ret) > 0) {
                        $withRet[$name] =  current($ret);
                    } else {

                        $withRet[$name] = strrpos($item['select'], ',') > 0 ? array_fill_keys(explode(',', str_replace(' ', '', $item['select'])), '') : array(trim($item['select']) => '');
                    }
                } else {
                    foreach ($ret as $value) 
                        $withRet[$name][] = $value;
                } 
            }

            foreach ($withRet as $name => $value) {
                $row[$name] = $value;
            }
        }

        return $row;
    }

    protected function page($page=1, $pageSize='')
    {
        $this->_isLimit = true; //必须
        if(!empty($pageSize)) 
            $this->_pageSize = $pageSize;
        $this->_page = $page;
        $this->_tab->offset(($page-1) * $this->_pageSize);
        $this->_tab->limit($this->_pageSize);
        return $this;
    }

    protected function getMultiRows()
    {   
        $rows = $this->getResult($this->_tab->getSelect(), 'FETCH_ROWS');  
       
        if(!is_array($rows) || count($rows) == 0) return array(); 
       
        if(is_array($this->_withArr) && count($this->_withArr) > 0) { 
          
            foreach ($rows as $row) {
                foreach ($this->_withArr as $name => $value) {
                    $index = $value['key'][0];
                    $this->_withArr[$name]['in'][] = $row[$index];
                }
            }
          
            $withRet = array();
           
            foreach ($this->_withArr as $name => $item) {
                $mapId = $item['key'][1];

                $sql = "SELECT {$item['select']},{$mapId} FROM {$item['tab']} ";
                
                $value =implode(',', array_unique($item['in']));    

                if(strpos($value, ',') > 0) {
                    $sql .= "WHERE {$mapId} IN ({$value})";
                } else {
                    $sql .= "WHERE {$mapId} = {$value}";
                }
                          
                $ret = self::$_db->select($sql , array() , 'FETCH_ROWS');
 
                $retFormat = array();
                if($item['map'] == 'one') {
                    foreach ($ret as $value)
                        $retFormat[$value[$mapId]] = $value;
                } else {
                    foreach ($ret as $value)
                        $retFormat[$value[$mapId]][] = $value;
                }
               
                $withRet[$name] = array(
                    'key' => $item['key'][0],
                    'map' => $item['map'],
                    'select' => $item['select'],
                    'ret'=> $retFormat
                );
            } 

            $rowsFormat = array();
            foreach ($rows as $key => $row) {
                foreach ($withRet as $name => $value) {
                    $index = $row[$value['key']];
                    if(empty($value['ret'][$index]) && $value['map'] == 'one') {
                        $row[$name] = strrpos($item['select'], ',') > 0 ? array_fill_keys(explode(',', str_replace(' ', '', $value['select'])), '') : array(trim($item['select']) => '');;
                    } else {
                        $row[$name] = $value['ret'][$index];
                    }
                }
                $rowsFormat[] = $row;
            }
            $rows = $rowsFormat;
        }  

        return $rows;
    }


    private function getResult($prepareSql = "SELECT * ", $mode = 'FETCH_ROWS', $class = '')
    {
        if(!is_object($this->_tab)) return false;
        $prepareSql .= $this->_tab->getFrom();
        $prepareSql .= $this->_tab->getWhereField();
        $bindValue = $this->_tab->getWhereValue();

        $orderby = $this->_tab->getOrderby();
        if(!empty($orderby)){
            $prepareSql .= ' ORDER BY :ORDER_BY ';
            $bindValue[':ORDER_BY'] = $orderby;
        }

        $groupby = $this->_tab->getGroupby();
        if(!empty($groupby)){
            $prepareSql .= ' GROUP BY :GROUP_BY ';
            $bindValue[':GROUP_BY'] = $groupby;
        }

        if($this->_isLimit) {
            if($mode != 'FETCH_ROWS') {
                $this->_tab->limit(1);
                $this->_tab->offset(0);
            }   
            $prepareSql .= " LIMIT :LIMIT  OFFSET :OFFSET"; 
            $bindValue[':OFFSET'] = $this->_tab->getOffset();
            $bindValue[':LIMIT'] =  $this->_tab->getLimit();
        } 

        $prepareSql .= $this->_tab->getHavingField();
        $bindValue = array_merge($bindValue, $this->_tab->getHavingValue()); 
        $mode = !in_array($mode, array('FETCH_ROWS','FETCH_ROW','FETCH_CELL','FETCH_META', 'FETCH_COUNT')) ? 'FETCH_ROWS' : $mode; 

        return self::$_db->select($prepareSql, $bindValue, $mode, $class);
    }

}
