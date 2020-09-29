<?php
session_start();
require_once ('libs/func.php');
require_once ('libs/MysqliDb.php');
require_once ('libs/conf.php');
require_once ('libs/waf.php');

if(isset($_POST['vote']) && isset($_POST['cans_token'])){
    if($_POST['cans_token'] == $_SESSION['cans']){
        $p = waf($_POST['vote']);
        $con = mysqli_connect($host,$dbuser,$dbpass,$dbname);
        $query = "INSERT INTO $dbname.$tbl VALUES ('', '$p', 'null')";
        $result = mysqli_query($con,$query);
        if($result){
            header('Content-Type: application/json');
            echo json_encode(array("result" => "Thanks For Voting"));          
        }else{
            header('Content-Type: application/json');
            echo json_encode(array("result" => mysqli_error($con)));
        }
        unset($_SESSION['cans']);
    }else{
        header('Content-Type: application/json');
        echo json_encode(array("result" => "Invalid cans_token"));
    }
}else{
    header('Content-Type: application/json');
    echo json_encode(array("result" => "null"));
}
