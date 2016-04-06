<?php
/**
 * Index contr oller
 * 各种用户（访客，客户，设计师，施工师傅，商户，系统管理员）
 * @author Nickel huang - nickelyellow@gmail.com
 * @version 1.1
 * @date 2,10, 2016
 * @date updated 2,10, 2016
 */

namespace Controllers;

use Core\Controller;
use Core\Tpl;
use Core\Json;
use Core\Language;
use Helpers\Request;

use Models\ViewTree;

use Project\Models\View as ProjectView;
use Subject\Models\View as SubjectView;
use Subject\Models\Edit as SubjectEdit;

/**
 * Index controller.
 */
class Index extends Controller
{

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Define Index page title and load template files
     */
    public function index()
    {
       

        Tpl::client('index'); 
    }


    /**
     * Define Index page title and load template files
     */
    public function edit()
    {
       

        Tpl::client('edit'); 
    }

    public function myProject()
    {
        $view = new ProjectView(); 
        $list = $view->projectList();
        $project = array();
        foreach ($list as $key => $value) {
            $project[] = array(
                'id' => $value['id'],
                "label" => $value['name'], 
                "expanded" => false,
                "selected" => false, 
                "items" => array(
                    array(
                        "value" => "/project/{$value['id']}",
                        "label" => "Loading..." 
                    )
                )
            );
        }
 
        $data = array(
            'list' => array_values($project) 
        );

        Json::success($data);
    }

    public function project($projectId=0)
    {
        if(empty($projectId)) {
            Json::failure(111000001);
        }
        $projectId = abs(intval($projectId));
        $view = new SubjectView(); 
        $list = $view->subjectList($projectId);  


        // format
        $treeMdel = new ViewTree();
        $list = $treeMdel->create($list);
 
        $data = array(
            'list' => array_values($list) 
        );

        Json::success($data);
    }

    public function subject($subjectId=0)
    {
        if(empty($projectId)) {
            Json::failure(111000002);
        }
        $view = new ProjectView(); 
        $list = $view->projectList();
        $project = array();
        foreach ($list as $key => $value) {
            $project[] = array(
                'id' => $value['id'],
                "label" => $value['name'], 
                "expanded" => false,
                "selected" => false, 
                "items" => array(
                    array(
                        "value" => "/project/{$value['id']}",
                        "label" => "Loading..." 
                    )
                )
            );
        }
 
        $data = array(
            'list' => array_values($project) 
        );

        Json::success($data);
    }
  
    function subjectDetail($subjectId)
    {
        if(empty($subjectId)) {
            Json::failure(111000004);
        } else {
            $data = array(
                'id' => 0,
                'name' => '',
                'content' => ''
            );

            $view = new SubjectView(); 
            $data1 = $view->subjectName($subjectId);
            if(isset($data1['name'])) {
                $data['name'] = $data1['name'];

                $data2 = $view->subjectDescribe($subjectId);
                if(isset($data2['content'])) {
                    $data['content'] = $data2['content'];
                }
            }
            
            Json::success($data); 
        }
    }
    

    function subjectDescribe($id)
    {
        if(empty($id)) {
            Json::failure(111000004);
        } else {
            $view = new SubjectView(); 
            $data = $view->subjectDescribe($id);
            if(!isset($data['content'])) {
                $data = array(
                    'id' => 0,
                    'subject_id' => 0,
                    'content' => ''
                );
            }
            Json::success($data); 
        }
    }

    function saveSubject()
    {
        $userId = 1; //$this->loginUserId();  
        $projectId = 1; //Request::input('project_id', 'int', 0);
        $subjectId = Request::input('subject_id', 'int', 0);
        $name = Request::input('subject_name', 'string', '');
        $content = Request::input('subject_describe', 'string', '');

        if(empty($subjectId)) {
            Json::failure(111000004);
        } else {

            $edit = new SubjectEdit(); 
            $subjectId = $edit->saveSubject($userId, $subjectId, $name, $content);
            if($subjectId && $subjectId > 0) {
                Json::success($subjectId);
            } else {
                Json::failure();
            }
        }
   
    }

    function moveSubject()
    {
        $userId = 1; //$this->loginUserId();  
        $projectId = 1; //Request::input('project_id', 'int', 0);
        $subjectId = Request::input('subject_id', 'int', 0);
       

        if(empty($subjectId)) {
            Json::failure(111000004);
        } else {
            $edit = new SubjectEdit(); 
            $subjectId = $edit->moveSubject($userId, $subjectId, $projectId);
            if($subjectId && $subjectId > 0) {
                Json::success(array(
                    'projectId' => $projectId,
                    'subjectId' => $subjectId
                ));
            } else {
                Json::failure();
            }
        }
    }

    public function viewTest($subjectId=0)
    {
        
    }


    public function doTest($subjectId=0)
    {
        
    }

}
