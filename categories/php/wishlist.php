<?php
require 'config.php'; // Connect to the database

// Handle Delete Report
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteID"])) {
    $deleteID = $_POST["deleteID"];
    $deleteSql = "DELETE FROM wishlist_items WHERE ItemID = '$deleteID'";

    if ($connection->query($deleteSql)) {
        $deleteSuccess = "Item Successfully Deleted!";
    } else {
        $deleteError = "Error Deleting Item: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles3.css">
    <title>Wishlist</title>
</head>
<body>
    
    <center><h1>Wishlist</h1></center>
    <button onclick="window.location.href='/userDatabase/insertWishlist.php';">
        Create New Wishlist Item
    </button><br><br>
    

    <!-- Display success or error messages for delete -->
    <?php
        if (!empty($deleteSuccess)) echo "<p style='color:green;'>$deleteSuccess</p>";
        if (!empty($deleteError)) echo "<p style='color:red;'>$deleteError</p>";
    ?>

    <?php
        // Fetch and display all reports
        $readSql = "SELECT * FROM wishlist_items";
        $result = $connection->query($readSql);

        echo "<center>";
        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>ItemID</th> <th>Item Name</th> <th>Price</th> <th>Date Added</th><th>Edit</th><th>Delete</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["ItemID"]."</td><td>".$row["ItemName"]."</td><td>".$row["Price"]."</td><td>".$row["DateAdded"]."</td>";

                // Edit button form
                echo "<td>
                        <form method='POST' action='updateWishlist.php'>
                            <input type='hidden' name='editID' value='".$row['ItemID']."'>
                            <input type='submit' value='Edit'>
                        </form>
                      </td>";
                
                // Delete button form
                echo "<td>
                        <form method='POST' action=''>
                            <input type='hidden' name='deleteID' value='".$row['ItemID']."'>
                            <input type='submit' value='Delete'>
                        </form>
                      </td>";

                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No Reports Found!</p>";
        }
        echo "</center>";

        $connection->close(); // Close the connection
    ?>

</body>
</html>
