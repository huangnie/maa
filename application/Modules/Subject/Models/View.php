<?php
/**
 * Subject/view table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Subject\Models;

use Core\Model;

use Subject\Tables\Subject;
use Subject\Tables\Describe;

class View extends Model
{
	 
   
    function firstLayerList()
    {
        $tab =  new Subject();
        $tab->where_eq('parent_id', 0);
        return $this->table($tab)->noLimit()->getMultiRows();
    }


    function subjectList($projectId=null)
    {
        $tab =  new Subject();

        if(!empty($projectId)) {
            if(is_numeric($projectId) && $projectId > 0) {
                $tab->where_eq('project_id', $projectId);
            } else if ( is_array($projectId) || preg_match('/\d(,\d)*/', $projectId)) {
                $tab->where_in('project_id', $projectId);
            }
        }
        
        return $this->table($tab)->noLimit()->getMultiRows();
    }

    function subjectName($id)
    {
        $tab =  new Subject();
        $tab->where_in('id', $id);
        return $this->table($tab)->getOneRow();
    }

 
    function subjectDescribe($id)
    {
        $tab =  new Describe();
        $tab->where_in('subject_id', $id)->where_or()->where_eq('id', $id);
        return $this->table($tab)->getOneRow();
    }

}