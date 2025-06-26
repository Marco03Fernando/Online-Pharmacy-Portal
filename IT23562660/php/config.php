<?php
$host = "localhost";         //varaible declaration
$username = "root";
$password = "";
$dbname = "supplier_db";

try {                                                                           // special notes
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password );   //try{} is used to make a connection to the database (DSN, $username, $pass)



} catch (PDOException $error) {       //$error catch the exception occured in try {}
      die("Connection Failed! : " . $error->getMessage());

}







