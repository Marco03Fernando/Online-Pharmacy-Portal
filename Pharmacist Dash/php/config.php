<?php
$host = "localhost";         
$username = "root";
$password = "";
$dbname = "pharma_db";


try {                                                                          
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password );   


} catch (PDOException $error) {      
      die("Connection Failed! : " . $error->getMessage());

}


?>