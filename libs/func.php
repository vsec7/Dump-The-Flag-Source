<?php
error_reporting(0);
// file : func.php

date_default_timezone_set('Asia/Jakarta');


function logQuery($user,$ip,$query){
	$fp = fopen("1065/".$user.".txt", "a");
	fwrite($fp, "\r\n". date('d-M-Y H:i:s')." | ".$ip." | ".$query);
	fclose($fp);
}

function rand_str($p, $c)
{
	$str = '';
 	for ($i = 0; $i < $p; $i++) 
	{
      		$str .= $c[rand(0, strlen($c) - 1)];
 	}
	return $str;
}

function persen($a, $b){
	return round(($a/$b)*100,2)." %";
}

$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
// Table Random

$rand_table = rand_str(8, $chars);
// Column random
$rand_column = "FLAG_".strtoupper(rand_str(8, $char));


function table_name($h,$u,$p,$d)
{
	$con = new MysqliDb ($h,$u,$p,$d);
	$sql = "SELECT table_name FROM information_schema.tables WHERE table_schema='$d'";
	return $con->rawQuery($sql)[0][table_name];
}


function column_name($n,$h,$u,$p,$d)
{
	$con = new MysqliDb ($h,$u,$p,$d);
	$table = table_name($h,$u,$p,$d);
	$sql = "SELECT column_name FROM information_schema.columns WHERE table_name='$table' LIMIT $n,1";
	return $con->rawQuery($sql)[0][column_name];
}


function dump_data($tab,$col,$h,$u,$p,$d,$n=1)
{
	$con = new MysqliDb ($h,$u,$p,$d);
	$sql = "SELECT $col FROM $tab WHERE id=$n";
	return $con->rawQuery($sql)[0][$col];

}
