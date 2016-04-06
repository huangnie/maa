<?php
/**
 * database Helper
 *
 * @author David Carr - dave@daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 * @date updated by nickel @ 2, 10, 2016
 */

namespace Helpers;

use PDO;

/**
 * Extending PDO to use custom methods.
 */
class Database extends PDO
{
    /**
     * @var array Array of saved databases for reusing
     */
    protected static $instances = array();

    /**
     * Static method get
     *
     * @param  array $group
     * @return \helpers\database
     */
    public static function get($group = false)
    {
        // Determining if exists or it's not empty, then use default group defined in config
        $group = !$group ? array (
            'type' => DB_TYPE,
            'host' => DB_HOST,
            'name' => DB_NAME,
            'user' => DB_USER,
            'pass' => DB_PASS
        ) : $group;

        // Group information
        $type = $group['type'];
        $host = $group['host'];
        $name = $group['name'];
        $user = $group['user'];
        $pass = $group['pass'];

        // ID for database based on the group information
        $id = "$type.$host.$name.$user.$pass";


        // Checking if the same
        if (isset(self::$instances[$id])) {
            return self::$instances[$id];
        }

        try {
            // I've run into problem where
            // SET NAMES "UTF8" not working on some hostings.
            // Specifiying charset in DSN fixes the charset problem perfectly!
            $instance = new Database("$type:host=$host;dbname=$name;charset=utf8", $user, $pass);
            $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Setting Database into $instances to avoid duplication
            self::$instances[$id] = $instance;

            return $instance;
        } catch (PDOException $e) {
            //in the event of an error record the error to ErrorLog.html
            Logger::newMessage($e);
            echo "$type:host=$host;dbname=$name;charset=utf8", $user, $pass;
            Logger::customErrorMsg("$type:host=$host;dbname=$name;charset=utf8" . $user . $pass);
        }
    }

    /**
     * run raw sql queries
     * @param  string $sql sql command
     * @return return query
     */
    public function raw($sql)
    {
        return $this->query($sql);
    }

    /**
     * method for selecting records from a database
     * @param  string $sql       sql query
     * @param  array  $array     named params
     * @param  object $fetchMode   PDO::FETCH_OBJ
     * @param  string $class     class name
     * @return array            returns an array of records
     */
    public function select($sql, $array = array(), $mode = 'FETCH_ASSOC', $class = '')
    { 
        try {
            $stmt = $this->prepare($sql);
            foreach ($array as $key => $value) {
                if (is_int($value)) {
                    $stmt->bindValue("$key", $value, PDO::PARAM_INT);
                } else {
                    $stmt->bindValue("$key", $value);
                }
            }

            $stmt->execute(); 

            switch ($mode) {
                // case 'FETCH_CLASS':
                //     return class_exists($class) ? $stmt->fetchAll(PDO::FETCH_CLASS, $class) : array();
                //     break;
                // case 'FETCH_OBJ':
                //     return $stmt->fetchAll(PDO::FETCH_OBJ);
                //     break;
                // case 'FETCH_NUM':
                //     return $stmt->fetchAll(PDO::FETCH_NUM);
                //     break;
                // case 'FETCH_COLUMN':
                //     return $stmt->fetchAll(PDO::FETCH_COLUMN);
                //     break;
                case 'FETCH_COUNT':
                case 'FETCH_CELL':
                    return $stmt->fetchColumn(0); 
                    break;
                case 'FETCH_META':
                    return $stmt->getColumnMeta(); 
                    break;    
                case 'FETCH_ROW':
                    return $stmt->fetch(PDO::FETCH_ASSOC);
                    break;    
                case 'FETCH_ROWS':
                default:
                    return $stmt->fetchAll(PDO::FETCH_ASSOC);
                    break;
            }
        } catch (PDOException $e) {
            //in the event of an error record the error to ErrorLog.html
            Logger::newMessage($e);
            Logger::customErrorMsg();
        }
        
    }

    /**
     * insert method
     * @param  string $table table name
     * @param  array $data  array of columns and values
     */
    public function insert($table, $data)
    {
        try {
            ksort($data);

            $fieldNames = implode(',', array_keys($data));
            $fieldValues = ':'.implode(', :', array_keys($data));

            $stmt = $this->prepare("INSERT INTO $table ($fieldNames) VALUES ($fieldValues)");
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }

            $stmt->execute();
            return $this->lastInsertId();
        } catch (PDOException $e) {
            //in the event of an error record the error to ErrorLog.html
            Logger::newMessage($e);
            Logger::customErrorMsg();
        }      
    }

    /**
     * update method
     * @param  string $table table name
     * @param  array $data  array of columns and values
     * @param  array $where array of columns and values
     */
    public function update($table, $data, $where)
    {
        try {
            ksort($data);

            $fieldDetails = null;
            foreach ($data as $key => $value) {
                $fieldDetails .= "$key = :field_$key,";
            }
            $fieldDetails = rtrim($fieldDetails, ',');

            $whereDetails = null;
            $i = 0;
            foreach ($where as $key => $value) {
                if ($i == 0) {
                    $whereDetails .= "$key = :where_$key";
                } else {
                    $whereDetails .= " AND $key = :where_$key";
                }
                $i++;
            }
            $whereDetails = ltrim($whereDetails, ' AND ');

            $stmt = $this->prepare("UPDATE $table SET $fieldDetails WHERE $whereDetails");

            foreach ($data as $key => $value) {
                $stmt->bindValue(":field_$key", $value);
            }

            foreach ($where as $key => $value) {
                $stmt->bindValue(":where_$key", $value);
            }

            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            //in the event of an error record the error to ErrorLog.html
            Logger::newMessage($e);
            Logger::customErrorMsg();
        }   
    }

    /**
     * Delete method
     *
     * @param  string $table table name
     * @param  array $where array of columns and values
     * @param  integer   $limit limit number of records
     */
    public function delete($table, $where, $limit = 1)
    {
        try {
            ksort($where);
            $whereDetails = array();
            foreach ($where as $key => $value) {
                // 要区别对待单元素的情况
                if(is_array($value) && count($value) > 1 ) {  
                    $whereDetails[] = " $key IN (:$key)";
                    $where[$key] = implode(',', $value);
                } else if(is_string($value) && strpos($value, ',') > 0) {
                    $whereDetails[] = " $key IN (:$key)";

                } else {
                    $whereDetails[] = " $key = :$key";
                    if(is_array($value)) $where[$key] = current($value);  //即为 单元素的情况
                }  
            }
            $whereDetails = implode(' AND ', $whereDetails);  

            //if limit is a number use a limit on the query
            if (is_numeric($limit)) {
                $uselimit = "LIMIT $limit";
            }
            $stmt = $this->prepare("DELETE FROM $table WHERE $whereDetails $uselimit");

            foreach ($where as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }

            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            //in the event of an error record the error to ErrorLog.html
            Logger::newMessage($e);
            Logger::customErrorMsg();
        } 
    }

    /**
     * truncate table
     * @param  string $table table name
     */
    public function truncate($table)
    {
        try {
            return $this->exec("TRUNCATE TABLE $table");
        } catch (PDOException $e) {
            //in the event of an error record the error to ErrorLog.html
            Logger::newMessage($e);
            Logger::customErrorMsg();
        } 
    }
}
