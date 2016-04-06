<?php
/**
 * User controller
 * 用户中心
 * @author Nickel huang - nickelyellow@gmail.com
 * @version 1.1
 * @date 2,10, 2016
 * @date updated 2,10, 2016
 */

namespace Controllers;

use Core\Tpl;
use Core\Controller;
use Helpers\Request;
use Helpers\Email;
use Helpers\Mobile;

use Controllers\Auth;

use user\Models\ViewUser;


/**
 * Sample controller.
 */
class User extends Auth
{

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->language->load('Welcome');
    }

    function index()
    {
        echo 'here';
    }

    

}
