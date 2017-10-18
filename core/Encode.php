<?php
/**
 * Encode Class
 *
 * @package   FOS 2.5 (FTI Module)
 * @author    Jakkrit Sangakong
 * @copyright Copyright (c) 2017 Phuket FantaSea. All rights reserved. 
 * @version   0.0.1
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Encode
{

	/**
	 * @var Encode Key
	 */
	private $_sha256;

	public function __construct()
	{
		$conf = Setting::getSetting();
		$this->_sha256 = $conf['encode']['SHA-256'];
	}

	public function genHashHour($param)
	{
		return sha1(md5($param.$this->_sha256.date('YmdHH')));
	}
	public function isAgreeHashHour($param, $hash = NULL)
	{
		return (strcmp(sha1(md5($param.$this->_sha256.date('YmdHH'))), $hash) == 0);
	}
	public static function genHashRandom()
	{
		return $_SESSION["token"] = sha1(md5(time().mt_rand(1,99999).session_id()));
	}
	public static function isAgreeHashRandom($hash = NULL)
	{
		return (strcmp($_SESSION["token"], $hash) == 0);
	}
}