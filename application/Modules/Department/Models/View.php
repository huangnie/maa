<?php
/**
 * Department/view table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Department\Models;

use Core\Model;

class View extends Model
{
	 
   
    function firstLayerList()
    {
        $tab =  new Department();
        $tab->where_eq('parent_id', 0);
        return $this->table($tab)->noLimit()->getMultiRows();
    }

    function departmentList($userId=0)
    {
        $tab =  new Department();
        if(is_numeric($userId) && $userId > 0) {
            $tab->where_eq('user_id', $userId);
        }
        return $this->table($tab)->noLimit()->getMultiRows();
    }

   
     
    function departmentDescribe($apiId)
    {
        $tab =  new Describe();
        $tab->where_in('api_id', $apiId);
        return $this->table($tab)->noLimit()->getMultiRows();
    }
}