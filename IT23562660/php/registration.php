<?php 

// to include the database connection made in config.php 
require 'config.php';


// next step is to intitialize the variables 
$id = 0; // id is set to auto increment form 0
$b_name = ''; // Business name
$address = '';
$f_name = ''; // first name
$l_name = ''; // last name
$email = ''; // email 
$phone = ''; // phone number

$update = false; // no update operation take place intitally

// handling CREATE and UPDATE
if (isset($_POST['save'])) {
    $b_name = $_POST['b_name'];
    $address = $_POST['address'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

// if user didnt accpt the terms of service
    if (!isset($_POST['terms'])) {
        echo "You must agree to the Terms of Service!";
        return; 
    }


//to check is email already exist
$stmt = $pdo->prepare("SELECT * FROM applications WHERE email = ?");
$stmt->execute([$email]);
$existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

if ($existingUser) {
    
    echo "Error: Email already exists!"; 
} else {

    $stmt = $pdo->prepare("INSERT INTO applications (b_name, address , f_name, l_name, email, phone) VALUES (?,?, ?, ?, ?, ?)");
    $stmt->execute([$b_name,$address, $f_name, $l_name, $email, $phone]);

    header("location: registration.php");
  }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $b_name = $_POST['b_name'];
    $address = $_POST['address'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $stmt = $pdo->prepare("UPDATE applications SET b_name = ?, address = ?,  f_name = ?, l_name = ?, email = ?, phone = ? WHERE id = ?");
    $stmt->execute([$b_name,$address, $f_name, $l_name, $email, $phone, $id]);

    header("Location: registration.php");
}

// to handle the delete 
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $stmt = $pdo->prepare("DELETE FROM applications WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: registration.php");
}

// to handle edit
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $stmt = $pdo->prepare("SELECT * FROM applications WHERE id = ?");
    $stmt->execute([$id]);
    $application = $stmt->fetch(PDO::FETCH_ASSOC);  //PDO::FETCH_ASSOC instructs fetch() to retur data from database as associative array
                                                    

    $b_name = $application['b_name'];
    $address= $application['address'];
    $f_name = $application['f_name'];
    $l_name = $application['l_name'];
    $email = $application['email'];
    $phone = $application['phone'];

    $update = true;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="../images/logo icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/regis.css">
    <title>Vendor Registration</title>
</head>

<body>
    <script src="../JavaScript/regis.js"></script>

    <button class="btn1" onclick="toggleDarkMode()">
        <img class="icon" id="dark-icon" src="../images/dark.png">
      </button>


<div class="form-container">
<div class="update-div">
        <h2 class="update"><?php echo $update ? 'Update Application' : 'Create Application'?></h2>
</div>  
<form action="registration.php" method="POST">
    <!--main container for all input-->
<div class="mainContainer">
    <!--Heading-->
    <div class="heading-div">
         <h2>Vendor Registration</h2>
    </div>

    <div class="upper-div">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="businessName">Business Name</label>
        <input type="text"  placeholder=" Enter Business Name" name="b_name"  value="<?php echo $b_name; ?>"><br><br>
                
        <label for="Address">Address</label>
        <input type="text"  placeholder="Enter Address " name="address" value="<?php echo $address; ?>" required><br><br>

    </div>

   <label for="Cname">Contact Name</label>
   <input type="text" placeholder="First" name="f_name" value="<?php echo $f_name; ?>" required>
   <input type="text" placeholder="Last" name="l_name" class="lastname" value="<?php echo $l_name; ?>" required>
   
   <br><br>

   <label for="number">Phone Number</label>
   <input type="number" placeholder="(94+) 00 000-0000" name="phone" value="<?php echo $phone; ?>" required>

   <br><br>
    
   <div class="email-div">
   <label for="email">Email Address</label>
   <input type="email" placeholder="mail@example.com" name="email" value="<?php echo $email; ?>" required>
   </div>
   <br><br>

<div class="subContainer">

    <div class="checkbox-div">
    <label>
        <input type="checkbox" name="terms">I agree to the Terms of Service
    </label>
    </div>

    <br><br>

    <div class="button-div">
   <button class="printbtn">Print</button>
        <?php if ($update): ?>
   <button type="submit" name="update" class="sendbtn">Update</button>
        <?php else: ?>
   <button type="submit" name="save" class="sendbtn">Send Application</button>
        <?php endif; ?>

                        </div>

                    </div>
            </div>

        </form>

    </div>

 
<?php 
// Fetch() the suppliers  

$stmt = $pdo->query("SELECT * FROM applications");
$applications = $stmt->fetchAll(PDO::FETCH_ASSOC) // retrive all data drom the database in associative array format
                                                    
?>
<style>
.read-table
{
    margin-top: 20px;
    margin-left: 120px;
    border: solid black 2px;
    background-color: lightskyblue;
    border-radius: 10px;
    padding: 10px 20px;
    font-size: 17px;

}
.read-table td {
    font-weight: 500;
}

.read-table th {
    margin-left: 30px;
}
.read-table th, .read-table td {
    padding: 12px; 
    text-align: left; 
    border: 1px solid black; 
}

.btn-edit {
     padding: 5px 10px;
     background-color: lightgreen;
     border-radius: 30px;
     color: black;
     font-weight: 900;
     font-size: 20px;
     text-decoration: none;  

}

.btn-edit:hover {
    background-color: darkgreen;
    color: white;
    cursor: pointer;
}

.btn-delete {
    padding: 5px 10px;
    border-radius: 30px;
    text-decoration: none;
    color: black;
    background-color: lightcoral;
    font-weight: 900;
     font-size: 20px;
}

.btn-delete:hover {
    background-color:crimson;
    color: white;
    cursor: pointer;
}
.update-div {
    position: relative;
    top: -30px;
    left: 520px;
}


</style>

<table class="read-table">
       <thead>
          <tr>
              <th>ID</th>
              <th>Business Name</th>
              <th>Address</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Phone Number</th>
          </tr>
       </thead>
       <tbody>
           <?php foreach ($applications as $application): ?>
        <tr>
            <td><?php echo $application['id']; ?></td>
            <td><?php echo $application['b_name']; ?></td>
            <td><?php echo $application['address']; ?></td>
            <td><?php echo $application['f_name']; ?></td>
            <td><?php echo $application['l_name']; ?></td>
            <td><?php echo $application['email']; ?></td>
            <td><?php echo $application['phone']; ?></td>
            <td>
                   <a href="registration.php?edit=<?php echo $application['id']; ?>" class="btn-edit">Edit</a>
                   <a href="registration.php?delete=<?php echo $application['id']; ?>" class="btn-delete">Delete</a>
            </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
   </table>  



</body>
</html>