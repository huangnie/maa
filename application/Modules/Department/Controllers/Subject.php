<?php
/**
 * Subject controller
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

use Api\Models\Edit;
use Api\Models\View;

/**
 * Subject controller.
 */
class Subject extends Controller
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
    public function edit($limit=15, $designId='')
    {
        $limit = intval($limit);  
        $isLatest = ( $limit < 0 );

        $designId = abs(intval($designId));


        $view = new ViewDesign(); 
        $data = array(
            'list' => $view->designFall(abs($limit), $designId, $isLatest)
        );

        Tpl::display('tpl/index', $data);
        
    }

    public function save($comptentId=0)
    {
        $designId = abs(intval($designId));
        $view = new ViewDesign(); 
        $detail = $view->getDetailById($designId);
        // format
        // todo:

        Json::success($detail);
    }

}
