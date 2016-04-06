<?php

/**
 * Mobile
 *
 * @author Nickelhuang - nickelyellow@mail.com
 * @version 1.1
 * @date created 2 12, 2016
 * @date updated 2 12, 2016
 */

namespace Helpers;

class Mobile 
{
	
	function __construct()
	{
        
	}


	 /**
     *
     * 移动：134、135、136、137、138、139、150、151、152、157、158、159、182、183、184、187、188、178(4G)、147(上网卡)；
     * 联通：130、131、132、155、156、185、186、176(4G)、145(上网卡)；
     * 电信：133、153、180、181、189 、177(4G)；
     * 卫星通信：1349
     * 虚拟运营商：170
     *
     */
    public static function isMobileNumber($mobile)
    {
        if (!is_numeric($mobile)) {
            return false;
        } else {
            $pattern = '#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#';  
            return preg_match($pattern, $mobile) ? true : false;
        }
    }
}