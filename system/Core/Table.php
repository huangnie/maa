<?php
/**
 * Table - the base table
 *
 * @author huangnie  nickelyelow@gmail.com
 * @version 1
 * @date 2016-2-8
 * @date updated 2016-2-8
 */

namespace Core;

/**
 * Base table class all other tables will extend from this base.
 */
abstract class Table
{
    /**
     * table 
     *
     */
    protected $_tableName;
    protected $_tableWith;
    protected $_tableField;


    /**
     * sql generate
     */   
    private $_selectArr = array();
    private $_whereFieldArr = array();
    private $_whereValueArr = array();

    private $_orderbyArr = array();
    private $_groupbyArr = array();

    private $_offset = 0;
    private $_limit = 1;

    private $_havingFieldArr = array();
    private $_havingValueArr = array();

    private $_lastSqlArr = array();
    
    /**
     * Create a new instance of the database helper.
     */
    public function __construct()
    {
       $this->select($this->_tableField);
    }

    function getTableName()
    {
        return $this->_tableName;
    }

    function getTableField()
    {
        return $this->_tableField;
    }


    function getInsertField()
    {
        return $this->_tableField;
    }

    function getUpdateField()
    {
        return $this->_tableField;
    }

    function tmpSelect($fields)
    {
        if(is_array($fields)) $fields = implode(',', $fields); 
        return "SELECT {$fields}";
    }

    function getSelect($fields=null)
    {
        if(!empty($fields)) {
            $this->select($fields);  
        }   
        $this->_selectArr = array_unique(array_filter($this->_selectArr)); 
        $select = is_array($this->_selectArr) && count($this->_selectArr) > 0 ? implode(',', $this->_selectArr) : "*";
        return "SELECT {$select} ";
    }

    function getFrom($table = '')
    {
        $table = !empty($table) ? $table : $this->_tableName;
        return " FROM {$table} ";
    }

    function getWhereField()
    {
        if(is_array($this->_whereFieldArr) && count($this->_whereFieldArr) > 0) {
            $where = implode(' AND ', $this->_whereFieldArr);
            $where = strrpos($where, '(') !== false ? preg_replace('/\(\s*and/i', '(', $where) : $where;
            $where = preg_replace('/AND\s*?OR\s*?AND/', ' OR ', $where);
            return " WHERE {$where} "; 
        } else {
            return  '';
        }
    }

    function getWhereValue()
    {
        return is_array($this->_whereValueArr) && count($this->_whereValueArr) > 0 ? $this->_whereValueArr : array();
    }

    function getOrderby()
    {
        return is_array($this->_orderbyArr) && count($this->_orderbyArr) > 0 ? implode(',', $this->_orderbyArr) : '';
    }

    function getGroupby()
    {
        return is_array($this->_groupbyArr) && count($this->_groupbyArr) > 0 ? implode(',', $this->_groupbyArr) : '';
    }

    function getLimit()
    {
        return $this->_limit;
    }

    function getOffset()
    {
        return $this->_offset;
        
    }

    function getHavingField()
    {
        $str = is_array($this->_havingFieldArr) && count($this->_havingFieldArr) > 0 ? implode(' ', $this->_havingFieldArr) : '';

        return !empty($str) ? preg_replace('/AND\s*?OR\s*?AND/', ' OR ', $str) : '';
    }

    function getHavingValue()
    {
        return is_array($this->_havingValueArr) && count($this->_havingValueArr) > 0 ? $this->_havingValueArr : array();
    }

    function getWithElement($name)
    {
        return array_key_exists($name, $this->_tableWith) ? $this->_tableWith[$name] : '';
    }

    function select($field="*")
    {
        if(is_string($field)) {
            $this->_selectArr[$field] = $field;
        } else if(is_array($field)) {
            foreach ($field as $name => $alias) {
                if(!is_numeric($name)) {
                    if($name != $alias && !empty($alias) && !is_numeric($alias)){
                        $this->_selectArr[$name] = "{$name} AS {$alias}";
                    } else {
                        $this->_selectArr[$name] = $name;
                    }
                } else if( !empty($alias) && !is_numeric($alias) ) {
                    $this->_selectArr[$alias] = $alias;
                }
            }
        }
        return $this;
    }


    function where_eq($field, $value=null, $isField = false)
    {
        if(is_array($field) && count($field) > 0) {
            foreach ($field as $key => $value) {
                $this->_where_eq($key, $value);    //只有第一层可以等于同表字段
            }
        } else if(!empty($field)){
            $this->_where_eq($field, $value, $isField);
        }

        return $this;
    }

    private function _where_eq($field, $value=null, $isField = false)
    {
        if(is_null($value)) {
            $this->_whereFieldArr[] = "`{$field}` IS NULL ";
        } else if(!$isField){
            $this->_whereFieldArr[] = "`{$field}` = :{$field}";
            $this->_setWhereValue($field, $value);
        } else {
            $this->_whereFieldArr[] = "`{$field}` = `{$field}`";
        }
    }

    function where_neq($field, $value=null, $isField = false)
    {
        if(is_array($field) && count($field) > 0) {
            foreach ($field as $key => $value) {
                $this->_where_neq($key, $value);   //只有第一层可以等于同表字段
            }
        } else if(!empty($field)){
            $this->_where_neq($field, $value, $isField);
        }
        return $this;
    }

    private function _where_neq($field, $value=null, $isField = false)
    {
        if(is_null($value)) {
            $this->_whereFieldArr[] = "`{$field}` NOT NULL ";
        } else if(!$isField){
            $this->_whereFieldArr[] = "`{$field}` <> :{$field}";
            $this->_setWhereValue($field, $value);
        } else {
            $this->_whereFieldArr[] = "`{$field}` <> `{$field}`";
        }
    }


    function where_gt($field, $value, $isField = false)
    {
        if(is_array($field) && count($field) > 0) {
            foreach ($field as $key => $value) {
                $this->_where_gt($key, $value);
            }
        } else if(!empty($field)){
            $this->_where_gt($field, $value, $isField);
        }
        return $this;
    }

    private function _where_gt($field, $value, $isField = false)
    {
        if(!$isField) {
            $this->_whereFieldArr[] = "`{$field}` > :{$field}";
            $this->_setWhereValue($field, $value);
        } else {
            $this->_whereFieldArr[] = "`{$field}` = `{$field}`";
        }
    }

    function where_lt($field, $value, $isField = false)
    {
        if(is_array($field) && count($field) > 0) {
            foreach ($field as $key => $value) {
                $this->_where_lt($key, $value);
            }
        } else if(!empty($field)){
            $this->_where_lt($field, $value, $isField);
        }
        return $this;
    }

    private function _where_lt($field, $value, $isField = false)
    {
        if(!$isField){
            $this->_whereFieldArr[] = "`{$field}` < :{$field}";
            $this->_setWhereValue($field, $value);
        } else {
            $this->_whereFieldArr[] = "`{$field}` = `{$field}`";
        }
    }

    function where_bettween($field, $left, $right)
    {
        $this->_whereFieldArr[] = "`{$field}` BETWEEN :left_`{$field}` AND :right_`{$field}`";
        $this->_setWhereValue("left_`{$field}`", $left);
        $this->_setWhereValue("right_`{$field}`", $right);
        return $this;
    }
 
    function where_like($field, $value)
    {
        if(is_array($field) && count($field) > 0) {
            foreach ($field as $key => $value) {
                $this->_where_like($key, $value);
            }
        } else if(!empty($field)){
            $this->_where_like($field, $value, $isField);
        }
        return $this;

    }

    private function _where_like($field, $value, $isField = false)
    {
        if(!empty($value)){
            $this->_whereFieldArr[] = "`{$field}` LIKE (:{$field})";
            $this->_setWhereValue($field, "%{$value}%");
        } 
    }

    function where_or()
    {
        $this->_whereFieldArr[] = 'OR';
        return $this;
    }


    function where_in($field, $value)
    {
        if(!empty($value)){
            $this->_whereFieldArr[] = "`{$field}` IN (:{$field})";
            $this->_setWhereValue($field, is_array($value) ? implode(',', $value) : $value);
        } 
        return $this;
    }

    function where_not_in($field, $value)
    {
        if(empty($value)){
            $this->_whereFieldArr[] = "`{$field}` NOT IN (:{$field})";
            $this->_setWhereValue($field, is_array($value) ? implode(',', $value) : $value);
        }
        return $this;
    }

    function left_bracket()
    {
        $this->_whereFieldArr[] = '(';
        return $this;
    }

    function right_bracket()
    {
        $this->_whereFieldArr[] = ')';
        return $this;
    }

    function orderby($field, $direct = 'DESC')
    {
         $this->_orderbyArr[] = "`{$field}` {$direct}"; 
         return $this;
    }

    function groupby($field)
    {
        $this->_groupbyArr[] = $field; 
        return $this;
    }

    function offset($value = 0)
    {
        $this->_offset = intval($value);
        return $this;
    }

    function limit($value = 1)
    {
        $this->_limit = intval($value);
        return $this;
    }

    /********* having  ************/
    function having_eq($field, $value)
    {
        $this->_havingFieldArr[] = "`{$field}` = :{$field}";
        $this->_setHavingValue($field, $value);
        return $this;
    }

    function having_neq($field, $value)
    {
        $this->_havingFieldArr[] = "`{$field}` <> :{$field}";
        $this->_setHavingValue($field, $value);
        return $this;
    }

    function having_gt($field, $value)
    {
        $this->_havingFieldArr[] = "`{$field}` > :{$field}";
        $this->_setHavingValue($field, $value);
        return $this;
    }

    function having_lt($field, $value)
    {
        $this->_havingFieldArr[] = "`{$field}` < :{$field}";
        $this->_setHavingValue($field, $value);
        return $this;
    }

    function having_bettween($field, $left, $right)
    {
        $this->_havingFieldArr[] = "`{$field}` BETTWEEN :left_`{$field}` AND :right_`{$field}`";
        $this->_setHavingValue("left_`{$field}`", $value);
        $this->_setWhereValue($field, $value);
        return $this;
    }

 
    function having_or()
    {
        $this->_havingFieldArr[] = "OR";
        return $this;
    }


    private function _setWhereValue($field, $value)
    {
        $this->_whereValueArr[":{$field}"] = $value ;
    }

    private function _setHavingValue($field, $value)
    {
        $this->_havingValueArr[":{$field}"] = $value ;
    }

}
