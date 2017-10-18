<?php
/**
 * Autoload
 *
 * @package   FOS 2.5 (FTI Module)
 * @author    Jakkrit Sangakong
 * @copyright Copyright (c) 2017 Phuket FantaSea. All rights reserved. 
 * @version   0.0.1
 */

/**
 * Debug PHP environment
 */
ini_set('display_errors', 'on');
error_reporting(E_ALL);
session_start();

require_once(dirname(__FILE__).'/core/MysqliDb.php');
require_once(dirname(__FILE__).'/core/DataAdapter.php');
require_once(dirname(__FILE__).'/core/Controller.php');
require_once(dirname(__FILE__).'/core/Setting.php');
require_once(dirname(__FILE__).'/core/Encode.php');
require_once(dirname(__FILE__).'/core/Route.php');



require_once(dirname(__FILE__).'/class/Course.php');
?>