<?php
    $connection = new mysqli("localhost", "root", "", "userDatabase");

    if ($connection->connect_error) {
        die ("Connection Error". $connection->connect_error);
    }
?>