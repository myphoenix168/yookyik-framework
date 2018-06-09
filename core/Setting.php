<?php
/**
 * Setting Class
 *
 * @package   FOS 2.5 (FTI Module)
 * @author    Jakkrit Sangakong
 * @copyright Copyright (c) 2017 Phuket FantaSea. All rights reserved. 
 * @version   0.0.1
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting
{
	public static function getSetting()
	{
		return [
			'db1' => [
				'dbhost' => 'xxx',
			    'dbuser' => 'xxx',
			    'dbpass' => 'xxx',
			    'dbname' => 'xxx',
			],
			'db2' => [
				'dbhost' => 'xxx',
			    'dbuser' => 'xxx',
			    'dbpass' => 'xxx',
			    'dbname' => 'xxx',
			],
			'encode' => [
				'SHA-256' => 'b2b84dd09d546cca40b8131581a97f2631eca121a1bbe6abfc4b4e2e8e3836c9',
			]
		];
	}
}
