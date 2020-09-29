<?php
require_once ('MysqliDb.php');
require_once ('func.php');
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "wtf_chall";

$db = new MysqliDb ($host,$dbuser,$dbpass,$dbname);
$tbl = table_name($host,$dbuser,$dbpass,$dbname);
$clm = column_name("2",$host,$dbuser,$dbpass,$dbname);
$k = dump_data($tbl,$clm,$host,$dbuser,$dbpass,$dbname,'21');

//print($k);