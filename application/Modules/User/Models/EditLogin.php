<?php
namespace User\Models;

use Core\Model;

use Helpers\Session;

use User\Tables\User;

class EditLogin extends Model
{	
	 
	public function setLoginUser($user)
    {
        if(!empty($user) && isset($user['id']) && $user['id'] > 0) {
            Session::set('isLogin', true);
            Session::set('loginUserId', $user['id']);
            Session::set('loginUserInfo', $user);
        }
    }
}