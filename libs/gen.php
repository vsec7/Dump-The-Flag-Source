<?php

require_once ('func.php');
require_once ('MysqliDb.php');


if(isset($_GET['h'])&&isset($_GET['u'])&&isset($_GET['p'])&&isset($_GET['d'])){

$host = $_GET['h'];
$dbuser = $_GET['u'];
$dbpass = $_GET['p'];
$dbname = $_GET['d'];

// http://localhost/a/libs/gen.php?h=sql12.freemysqlhosting.net&u=sql12228757&p=Ar7pmLfGxy&d=sql12228757

// init
$con = new MysqliDb ($host,$dbuser,$dbpass,$dbname);
// Hapus Db lama
$con->rawQuery("DROP DATABASE IF EXISTS $dbname");
// Buat Db baru
$con->rawQuery("CREATE database $dbname CHARACTER SET `gbk`");
// Buat table 
$con->rawQuery("CREATE TABLE IF NOT EXISTS $dbname.$rand_table
		(
			id INT(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
			vote VARCHAR(250) NOT NULL,			
			$rand_column CHAR(32) NOT NULL		
		)");

	$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

	
	// Buat key
	$key = "SHL{".rand_str(12, $chars)."}";

	$isi = array("1" => "Kebawahhhhh", "2" => "Kebawah Lagi", "3" => "Uhhhh bawahh", "4" => "Terussss",
	 "5" => "Emmhhhh", "6" => "Teruss kebawah", "7" => "terussss", "8" => "Unchhh", "9" => "mwwaaahhh", "10" => "Capek Belum ?", "11" => "Kebawahhhhh", "12" => "Kebawah Lagi", "13" => "Uhhhh bawahh", "14" => "Terussss",
	 "15" => "Emmhhhh", "16" => "Teruss kebawah", "17" => "terussss", "18" => "Unchhh", "19" => "mwwaaahhh", "20" => "Capek Belum ?" );

	for($i=1;$i<=20;$i++){
		$r = rand(0,1);
		$con->rawQuery("INSERT INTO $dbname.$rand_table VALUES ($i, '$r', '$isi[$i]')");
	}
	$con->rawQuery("INSERT INTO $dbname.$rand_table VALUES ('21', '1', '$key')");
	
}