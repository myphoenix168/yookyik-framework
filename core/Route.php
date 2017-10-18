<?php
/**
 * Route Class
 *
 * @package   FOS 2.5 (FTI Module)
 * @author    Jakkrit Sangakong
 * @copyright Copyright (c) 2017 Phuket FantaSea. All rights reserved. 
 * @version   0.0.1
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Route extends Yookyik_Controller
{
	public function register()
	{
		if (isset($_GET) && array_key_exists('render', $_GET))
		{

			switch (filter_input(INPUT_GET,'render', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES)) {
				case 'course':
					$handler = new Course();
					break;
				case 'credit':
					$this->view('404');
					exit(0);
					break;
				case 'timeline':
					include("render/404.php");
					break;
				case 'manage':
					include("render/404.php");
					break;
				case 'about':
					include("render/404.php");
					break;
				case 'debug':
					include("render/debug.php");
					break;
				default:
					include("render/404.php");
					break;
			}
			$handler->handle();
		}
		if (isset($_GET) && array_key_exists('json', $_GET) && array_key_exists('token', $_GET))
		{
			$data = new DataAdapter();
			switch (filter_input(INPUT_GET,'json', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES)) {
				case 'course':
					
					echo Encode::isAgreeHashRandom(filter_input(INPUT_GET,'token', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES)) ? $data->course_active_list():'';
					break;
				case 'credit':
					include("render/404.php");
					break;
				case 'timeline':
					include("render/404.php");
					break;
				case 'manage':
					include("render/404.php");
					break;
				case 'about':
					include("render/404.php");
					break;
				default:
					include("render/404.php");
					break;
			}
		}
		
	}
}