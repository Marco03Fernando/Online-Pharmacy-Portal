<?php
    require 'config.php';

    // Check if the editID is set
    if (isset($_POST["editID"])) {
        $editID = $_POST["editID"];
        
        // Fetch the record for the given ItemID
        $fetchSql = "SELECT * FROM wishlist_items WHERE ItemID = '$editID'";
        $result = $connection->query($fetchSql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['ItemName'];
            $price = $row['Price'];
            $dateadded = $row['DateAdded'];
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
        $itemid = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $dateadded = $_POST["dateadded"];

        $updateSql = "UPDATE wishlist_items SET ItemName='$name', Price='$price', DateAdded='$dateadded' WHERE ItemID='$itemid'";

        if ($connection->query($updateSql) === TRUE) {
            echo "Wishlist updated successfully!";
        } else {
            echo "Error updating wishlist: " . $connection->error;
        }

        $connection->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles3.css">
    <title>Update Wishlist</title>
</head>
<body>
    <fieldset>
        <legend>Update Wishlist</legend>
        <form method="POST" action="">
            <input type="hidden" name="editID" value="<?php echo $editID; ?>"> <!-- Send editID as hidden input -->
            Item ID: <input type="text" name="id" value="<?php echo $editID; ?>" readonly><br>
            Item Name: <input type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>" required><br>
            Price: <input type="number" name="price" value="<?php echo isset($price) ? $price : ''; ?>" required><br>
            Date Added: <input type="date" name="dateadded" value="<?php echo isset($dateadded) ? $dateadded : ''; ?>" required><br><br>
            

            <input type="submit" name="update" value="Update">
            <button type="button" onclick="window.location.href='/userDatabase/wishlist.php';">Go back</button>
        </form>
    </fieldset>
</body>
</html>
