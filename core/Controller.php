<?php
/**
 * Yookyik Controller Class
 *
 * @package   FOS 2.5 (FTI Module)
 * @author    Jakkrit Sangakong
 * @copyright Copyright (c) 2017 Phuket FantaSea. All rights reserved. 
 * @version   0.0.1
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Yookyik_Controller
{
	public function __construct()
	{
		//add log
	}
	public function view($_controller_path)
	{
		include("render/".$_controller_path.".php"); 
	}
}