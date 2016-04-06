<?php
/**
 * Task/view table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Task\Models;

use Core\Model;

class View extends Model
{
   
    function firstLayerList()
    {
        $tab =  new Task();
        $tab->where_eq('parent_id', 0);
        return $this->table($tab)->noLimit()->getMultiRows();
    }


    function taskListOfUser($userId=0)
    {
        $tab =  new Task();
        if(is_numeric($userId) && $userId > 0) {
            $tab->where_eq('user_id', $userId);
        }
        return $this->table($tab)->noLimit()->getMultiRows();
    }

    function taskListOfSubject($userId=0)
    {
        $tab =  new Task();
        if(is_numeric($userId) && $userId > 0) {
            $tab->where_eq('user_id', $userId);
        }
        return $this->table($tab)->noLimit()->getMultiRows();
    }

    function taskDetail($taskId)
    {
        $tab =  new Task();
        $tab->where_eq('task_id', $taskId);
        return $this->table($tab)->getOneRow();
    }
}