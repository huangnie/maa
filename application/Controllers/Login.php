<?php
/**
 * Login controller
 * 非管理用户 登陆
 * @author Nickel huang - nickelyellow@gmail.com
 * @version 1.1
 * @date 2,10, 2016
 * @date updated 2,10, 2016
 */

namespace Controllers;

use Core\Tpl;
use Core\Json;
use Core\Controller;
use Helpers\Request;
use Helpers\Email;
use Helpers\Mobile;
use Helpers\Session;

use Controllers\Auth;

use User\Models\ViewUser;
use User\Models\EditUser;
use User\Models\EditLogin;

/**
 * Login controller.
 */
class Login
{

    /**
     * Call the parent construct
     */
    public function __construct()
    {

        
    }

    /**
     * 登陆核注册表单在一起
     *
     */
    public function index()
    {
        
        Tpl::client('tpl/login'); 
    }

    /**
     * 用户注册
     */
    public function signup()
    {
        $account = Request::input('signup_account', 'string');
        $plaintext = Request::input('signup_plaintext', 'string');
        $plaintext_repeat = Request::input('signup_plaintext_repeat', 'string');
        // 参数判断
        if(empty($account)) {
            Json::failure('抱歉,账号不能为空');
        } else if(empty($plaintext)) {
            Json::failure('抱歉,密码不能为空');
        } else if($plaintext != $plaintext_repeat) {
            Json::failure('抱歉,密码两次输入不一致');
        } 
        // 注册
        $model = new ViewUser();
        $user = $model->getUserByAccount($account);
        if(!empty($user)) {
            Json::failure('抱歉,该账号已有人注册使用了');
        } else {
            $edit = new EditUser(); 
             
            if(Mobile::isMobileNumber($account)) {
                // 手机号码
                $user = $edit->telRegister($account, $plaintext);
            } else if(Email::isEmail($account)) { 
                // 邮箱
                $user = $edit->emailRegister($account, $plaintext); 
            } else { 
                // 账号不符合要求
                Json::failure('抱歉,该账号格式无效,请使用正确的手机号或电子邮箱');
            }

            if(!empty($user)) {
                // 自动登陆
                $edit = new EditLogin();
                $edit->setLoginUser($user);
                Json::success($user);
            } else {
                Json::failure("抱歉,注册失败,请重新操作!");
            }
        }
    }

    /**
     * 登陆验证: 自动鉴别 手机号 和 电子邮箱
     *
     * @param 
     * @param 
     */
    function signin()
    {
        $account = Request::input('signin_account', 'string');
        $plaintext = Request::input('signin_plaintext', 'string');

        if(empty($account)) {
            Json::failure('抱歉,账号不能为空');
        } else if(empty($plaintext)) {
            Json::failure('抱歉,密码不能为空');
        } else {
            $model = new ViewUser();

            if(Mobile::isMobileNumber($account)) {
                // 手机号码
                $user = $model->getUserByTel($account);
            } else if(Email::isEmail($account)) {  
                // 邮箱
                $user = $model->getUserByEmail($account);
            } else { 
                // 账号不符合要求
                Json::failure('抱歉,该账号格式无效,请使用正确的手机号或电子邮箱');
            }
            
            $this->verifyPassword($model, $user, $plaintext);
        }
    }

    /**
     * 密码验证
     *
     * @param 
     * @param 
     */
    private function verifyPassword($model, $user, $plaintext)
    {
        if(empty($user)) {
            Json::failure('抱歉,该账号未注册');
        } else if(isset($user['password']) && !$model->verifyPassword($plaintext, $user['password'])) {
            Json::failure('抱歉,密码错误,登陆失败');
        } else {
            // 登陆成功
            $edit = new EditLogin();
            $edit->setLoginUser($user); 
            Json::success('登陆成功');
        }
    }

   
}
