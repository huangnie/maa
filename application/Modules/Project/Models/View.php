<?php
/**
 * Project/view table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Project\Models;

use Core\Model;

use Project\Tables\Project;

class View extends Model
{
	
    function projectList($userId=0)
    {
        $tab =  new Project();
        if(is_numeric($userId) && $userId > 0) {
            $tab->where_eq('user_id', $userId);
        }
     
        return $this->table($tab)->noLimit()->getMultiRows();
    }

    function projectDetail($projectId)
    {
        $tab =  new Project();
        $tab->where_eq('project_id', $projectId);
        return $this->table($tab)->getOneRow();
    }
}