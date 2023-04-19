<?php
    $servername = 'localhost';
    $username = 'root';
    $pass = '';
    date_default_timezone_set('Asia/Manila');
    $server_date_only = date('Y-m-d');
 

    try {
        $conn = new PDO ("mysql:host=$servername;dbname=inventory_db",$username,$pass);

         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";


    }catch(PDOException $e){
        echo 'NO CONNECTION'.$e->getMessage();
    }
?>