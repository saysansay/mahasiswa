<?php
$host = 'localhost';
$user =  'root';
$pass = 'Ais03082012yk';
$db = 'budiluhur';
$conn = mysqli_connect($host,$user,$pass,$db);
if(!$conn){
    echo "Error : ". mysqli_connect_error();
    exit();
}  
?>