<?php
$host = '10.1.211.136';
$user =  'wms';
$pass = 'Ais03082012yk';
$db = 'mahasiswa';
$conn = mysqli_connect($host,$user,$pass,$db);
if(!$conn){
    echo "Error : ". mysqli_connect_error();
    exit();
}  
?>