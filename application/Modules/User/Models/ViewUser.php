<?php

namespace User\Models;

use Core\Model;

use Helpers\Password;

use User\Tables\User;

class ViewUser extends Model
{

	function verifyPassword($plaintext, $password)
	{
		return Password::verify($plaintext, $password);
	}

	function userList($param=array())
	{
		$this->tab = new User();
		$this->tab->select('real_name, nick_name, icon, tel, qq');

		$total = $this->getCount();
		$pags = $this->getPages();
		$cell = $this->getCell();		
		$row = $this->getOneRow();
		$rows = $this->page(1)->getMultiRows();

		return array(
			'total' => $total,
			'pags' => $pags,
			'cell' => $cell,
			'row' => $row,
			'rows' => $rows
		);
	}

	function userDetail()
	{
		$tab = new User();

		return $this->table($tab)->getOneRow();
	}

	function getUserByAccount($account)
	{
		$tab = new User();
		 
		$tab->where_eq('tel', $account)->where_or()->where_eq('email', $account); 
		return $this->table($tab)->getOneRow();
	}

	function getUserByTel($tel)
	{
		$tab = new User();
		$tab->where_eq('tel', $tel);
		return $this->table($tab)->getOneRow();
	}

	function getUserByEmail($email)
	{
		$tab = new User();
		$tab->where_eq('email', $email);
		return $this->table($tab)->getOneRow();
	}
	
}