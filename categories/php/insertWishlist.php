<?php
    require 'config.php';

    $insertSuccess = "";
    $insertError = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $itemid = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $dateadded = $_POST["dateadded"];

        $insertSql = "INSERT INTO wishlist_items VALUES('$itemid', '$name', '$price', '$dateadded')";

        if ($connection->query($insertSql)) {
            $insertSuccess = "Wishlist Created Successfully<br>";
        }
        else {
            $insertError = "Wishlist Creation Error: ".$connection->error;
        }
    }

    $connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles3.css">
    <title>Create New Wishlist Item</title>
</head>
<body>
    <fieldset>
        <legend>New Wishlist Item</legend>
        <form method="post" action="">
            Item ID: <input type="text" name="id" required><br>
            Item Name: <input type="text" name="name" required><br>
            Price: <input type="number" name="price" required><br>
            Date Added: <input type="date" name="dateadded" required><br><br>
            <input type="submit" value="Submit"> 
            <button type="button" onclick="window.location.href='wishlist.php';">Go back</button>
        </form>
    </fieldset>

    <!-- Display success or error messages -->
    <?php
        if (!empty($insertSuccess)) {
            echo "<p style='color:green;'>$insertSuccess</p>";
        }
        if (!empty($insertError)) {
            echo "<p style='color:red;'>$insertError</p>";
        }
    ?>
</body>
</html>
