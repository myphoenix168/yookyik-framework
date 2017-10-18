<?php
/**
 * Initial Application 
 *
 * @package   FOS 2.5 (FTI Module)
 * @author    Jakkrit Sangakong
 * @copyright Copyright (c) 2017 Phuket FantaSea. All rights reserved. 
 * @version   0.0.1
 */
$system_path = 'fti';

define('BASEPATH', $system_path);

require_once('autoload.inc.php');

(new Route())->register();