<?php
/**
 * Subject/edit table
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

class Edit extends Model
{
  
    public function saveSubject($userId, $subjectId, $name, $content)
    {
    	$this->begin(); 
        // 名称
        $tab = new Subject();
    	$flag = true;
    	if (empty($subjectId)) {
			$subjectId = $this->table($tab)->add($data);
			$flag = $subjectId;
    	} else {
    		$tab->where_eq('id', $subjectId);
    		$subject = $this->table($tab)->getOneRow();
    		if($subject['name'] != $name) {
    			$flag = $this->table($tab)->modify(array('name' => $name), array('id' => $subjectId));
    		}
    		if(!$flag) {
				$this->rollback();
				return false;
			}
    	}

        // 描述
    	$tab = new Describe();
    	$tab->where_eq('subject_id', $subjectId);
    	$describe = $this->table($tab)->getOneRow();
		if(isset($describe['content']) && $describe['content'] != $content) {
			$flag = $this->table($tab)->modify(array('content' => $content), array('subject_id' => $subjectId));
		} else if(!isset($describe['content'])) {
			$data = array(
	    		'subject_id' => $subjectId,
	    		'content' => $content
	    	);
			$flag = $this->table($tab)->add($data);
		}
		if(!$flag) {
			$this->rollback();
			return false;
		} else {
			$this->commit();
			return $subjectId;
		}
		
    }

    function moveSubject($subjectId, $projectId)
    {
        $tab = new Subject();
        if (!empty($subjectId)) {
            $tab->where_eq('id', $subjectId);
            $subject = $this->table($tab)->getOneRow();
            if($subject['project_id'] != $projectId) {
                $flag = $this->table($tab)->modify( array('project_id' => $projectId), array('id' => $subjectId) );
            }
        }
        return $projectId;
    }
   
}