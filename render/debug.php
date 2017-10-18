<?php
/* TEST Get Setting
/*
$conf = Setting::getSetting();
echo $conf['hostdb1']['hostname'].'<br/>';
echo $conf['hostdb1']['user_db'].'<br/>';
echo $conf['hostdb1']['pass_db'].'<br/>';
echo $conf['hostdb1']['dbname'].'<br/>';*/


/* TEST Get Data from Class
/*
$data = new DataAdapter();
echo $data->course_active_one('0000000007');
echo $data->course_active_list();
$data = NULL;
*/

/* TEST Token Hour
/*
$encode = new Encode();
echo $encode->genHashHour('debug');
echo $encode->isAgreeHashHour('debug','d67310e663621cf27401961ac54373d87466aa99');
*/

/* TEST Token and Valid Token
/*
$encode = new Encode();
$hash =$encode->genHashRandom();
echo $hash;
echo "<br/>";
echo $encode->isAgreeHashRandom($hash);
*/
