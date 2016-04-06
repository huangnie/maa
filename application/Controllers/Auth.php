<?php
/**
 * Auth controller
 * 权限验证(登陆+权限)
 * @author Nickel huang - nickelyellow@gmail.com
 * @version 1.1
 * @date 2,10, 2016
 * @date updated 2,10, 2016
 */

namespace Controllers;

use Core\Controller;
use Helpers\Session;

/**
 * Auth controller check privalige
 */
class Auth extends Controller
{

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->isLogin();
    }

    public function checkPrivalig()
    {  
        
    }

    public function isLogin()
    {
        $isLogin = Session::get('isLogin');
        if($isLogin !== true) 
            header("Location:/login");
    }

    public function loginUserId()
    {
        return Session::get('loginUserId');
    }

    public function loginUserInfo()
    {
        Session::get('loginUserInfo');
    }

    /**
     * 安全退出
     */
    public function signout()
    {
       
    }
}
