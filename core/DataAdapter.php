<?php
/**
 * DataAdapter Class
 *
 * @package   FOS 2.5 (FTI Module)
 * @author    Jakkrit Sangakong
 * @copyright Copyright (c) 2017 Phuket FantaSea. All rights reserved. 
 * @version   0.0.1
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class DataAdapter
{

	const xxx = "xxx";

	/**
	 * @var Database Hostname
	 */
	private $_dbhost;

	/**
	 * @var Database Username
	 */
	private $_dbuser;

	/**
	 * @var Database Password
	 */
	private $_dbpass;

	/**
	 * @var Database Name
	 */
	private $_dbname;

	/**
	 * @var Database Connector
	 */
	private $_db;

	public function __construct()
	{
		$conf = Setting::getSetting();
		$this->_dbhost = $conf['db1']['dbhost'];
		$this->_dbuser = $conf['db1']['dbuser'];
		$this->_dbpass = $conf['db1']['dbpass'];
		$this->_dbname = $conf['db1']['dbname'];

		/*$this->_db = new Mysqlidb($this->_dbhost, $this->_dbuser, $this->_dbpass, $this->_dbname);
		if(!$this->_db) die("Database error");

		date_default_timezone_set("Asia/Bangkok");*/

	}

	public function course_active_list()
	{
		$this->_db = new Mysqlidb($this->_dbhost, $this->_dbuser, $this->_dbpass, $this->_dbname);
		if(!$this->_db) die("Database error");

		$row = $this->_db->query("SELECT * 
			FROM 
				(SELECT opn.CourseIdKey,opn.StartDate,mst.CategoryID,opn.FlagActive,opn.CourseIdKey as CourseIdKey2,opn.Course_Name,opn.Course_Id 
					FROM 
					(select * from fos2_fti.Train_CourseOfStHD l1_o where DATE_FORMAT(l1_o.EndDate,'%Y%m%d') >= '20171016') as opn 
					LEFT JOIN 
					(select * from fos2_fti.Train_MstCourse l1_m where l1_m.FlagActive = 'Y') AS mst 
					ON opn.Course_Id = mst.CourseID AND opn.CourseIdKey = mst.CourseIDKey 
				WHERE  
				opn.FlagActive='A' order by opn.StartDate desc) AS m2 
			ORDER BY m2.StartDate");

		$this->_db = NULL;
		return json_encode($row);
	}
	public function course_active_one($courseId = NULL)
	{
		$this->_db = new Mysqlidb($this->_dbhost, $this->_dbuser, $this->_dbpass, $this->_dbname);
		if(!$this->_db) die("Database error");

		$row = $this->_db->query("SELECT * FROM fos2_personal_training.course_master WHERE course_master_id ='$courseId'");
		$this->_db = NULL;
		return json_encode($row);
	}
}