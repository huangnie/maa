<?php
/**
 * Admin controller
 * 后台系统
 * @author Nickel huang - nickelyellow@gmail.com
 * @version 1.1
 * @date 2,10, 2016
 * @date updated 2,10, 2016
 */

namespace Controllers;

use Core\Tpl;
use Core\Controller;
use Controllers\Auth;

use Models\ViewCategory;

use User\Models\Login;
use Design\Models\ViewDesign;

/**
 * Admin controller.
 */
class Admin extends Controller
{

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
        
    }

    function before()
    {
        
    }

    function after()
    {

    }

    function index()
    {  
        $auth = new Auth();
        $auth->isLogin();  
        

        Tpl::render('admin/index');
    }

    function comment()
    {
        $data['title'] = $this->language->get('welcome_text');
        $data['welcome_message'] = $this->language->get('welcome_message');

        Tpl::render('admin/tpl/form-wysiwyg');
    }

    /**
     * 用户登陆表单
     */
    public function login()
    {
 
        Tpl::display('admin/login');
    }

    /**
     * 注册
     */
    public function signup()
    {

    }

    /**
     * 登陆验证
     */
    public function signin()
    {
        echo 'suucess';

    }
 
}
