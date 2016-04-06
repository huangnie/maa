<?php

/**
 * Email
 *
 * @author Nickelhuang - nickelyellow@mail.com
 * @version 1.1
 * @date created 2 12, 2016
 * @date updated 2 12, 2016
 */

namespace Helpers;

class Email
{
	
	function __construct()
	{
		
	}

	public static function isEmail($email)
	{
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}


	
}