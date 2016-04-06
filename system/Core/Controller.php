<?php
/**
 * Controller - base controller
 *
 * @author David Carr - dave@daveismyname.com
 * @version 2.2
 * @date June 27, 2014
 * @date updated 2,11 2016 by Nickelhuang
 */

namespace Core;

/**
 * Core controller, all other controllers extend this base controller.
 */
abstract class Controller
{
    /**
     * tpl variable to use the tpl class.
     *
     * @var string
     */
    protected $_tpl;

    /**
     * data variable to use the tpl class.
     *
     * @var string
     */
    protected $_data;

    /**
     * Language variable to use the languages class.
     *
     * @var string
     */
    protected $_language;

    /**
     * On run make an instance of the config class and tpl class.
     */
    public function __construct()
    { 
       
    }
}
