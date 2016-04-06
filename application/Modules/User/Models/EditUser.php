<?php

namespace User\Models;


use Core\Model;

use Helpers\Password;

use User\Tables\User;
use User\Tables\Tag;

class EditUser extends Model
{

	/**
	 * 手机号注册
	 *
	 * @param 
	 * @param 
	 */
	function telRegister($account, $plaintext)
	{
		$tab = new User();
		$data = array('tel' => $account, 'password' => Password::make($plaintext));
		if($userId = $this->table($tab)->add($data)) {
			$data['id'] = $userId;
			return $data;
		} else {
			return false;
		}
	}

	/**
	 * 电子邮箱注册
	 *
	 * @param 
	 * @param 
	 */
	function emailRegister($account, $plaintext)
	{
		$tab = new User();
		$data = array('email' => $account, 'password' => Password::make($plaintext));
		 
		if($userId = $this->table($tab)->add($data)) {
			$data['id'] = $userId;
			return $data;
		} else {
			return false;
		}
	}


	function save($data)
	{
		 
		$tab =  new User();
	 
		return $this->table($tab)->add($data);
	}

	function remove($userId)
	{
		$tab =  new User();
	 
		return $this->table($tab)->modify(array('is_delete' => 'yes'), array('id' => $userId));
	}

	function delete($userId)
	{
		$tab =  new User();
	 
		return $this->table($tab)->delete(array('id' => $userId));
	}

	function modifyName()
	{

	}

	function modifyDesc()
	{

	}

	function modifyTag()
	{
		
	}

}