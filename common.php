<?php
session_start();
//我要改东西！！
error_reporting(E_ALL^E_NOTICE);
date_default_timezone_set("PRC");
try{
    $pdo=new PDO("mysql:host=localhost;dbname=web13","root","");
}catch (PDOException $e){
    echo $e->getMessage();
}
$pdo->query("set names utf8");
?>