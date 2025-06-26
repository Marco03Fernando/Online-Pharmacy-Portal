<?php

require 'config.php';

//variable declaration
$id = 0;
$m_name = '';
$dosage = '';
$frequency = '';
$duration = '';
$note = '';

$update = false;
$currentDashboard = 'dashboard1';

if (isset($_POST['save'])) {
  $m_name = $_POST['m_name'];
  $dosage = $_POST['dosage'];
  $frequency = $_POST['frequency'];
  $duration = $_POST['duration'];
  $note = $_POST['note'];
 
  $stmt = $pdo->prepare("INSERT INTO regimens (m_name, dosage , frequency, duration, note) VALUES (?,?,?,?,?)");
  $stmt->execute([$m_name,$dosage, $frequency, $duration, $note]);

  header("location: newDash.php?dashboard2");

}

  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $m_name = $_POST['m_name'];
    $dosage = $_POST['dosage'];
    $frequency = $_POST['frequency'];
    $duration = $_POST['duration'];
    $note = $_POST['note'];
  

    $stmt = $pdo->prepare("UPDATE regimens SET m_name = ?, dosage = ?,  frequency = ?, duration = ?, note = ? WHERE id = ?");
    $stmt->execute([$m_name,$dosage, $frequency, $duration, $note, $id]);

    header("Location: newDash.php?dashboard2");
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $stmt = $pdo->prepare("DELETE FROM regimens WHERE id = ?");
  $stmt->execute([$id]);

  header("Location: newDash.php?dashboard2");
}

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];

  $stmt = $pdo->prepare("SELECT * FROM regimens WHERE id = ?");
  $stmt->execute([$id]);
  $regimen = $stmt->fetch(PDO::FETCH_ASSOC);

  $m_name = $regimen['m_name'];
  $dosage = $regimen['dosage'];
  $frequency = $regimen['frequency'];
  $duration = $regimen['duration'];
  $note = $regimen['note']; 

  $update = true;


}

if (isset($_GET['dashboard2'])) {
  $currentDashboard = 'dashboard2';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="../images/logo.ico">
    <link rel="stylesheet" href="../styles/dash.css">
    <title>Pharmacist Dashboard</title>
</head>
<body>
      
  <script src="../js/dash.js"></script>
    
 
    <div class="sidemenu">

      <button class="buttn1" onclick="DarkModeButton()">
        <img class="icon" id="moon" src="../images/moon.png">
      </button>
      
      <ul>
          <button class="pbutton" onclick="showDashboard('dashboard1')">
           <li class="top-icon"><img class="fig"src="../images/dash.png">&nbsp; Dashboard</li>
          </button>
           <li class="Spacing"><img class="fig"src="../images/orders.png">&nbsp; Orders</li>
           <button class="pbutton" onclick="showDashboard('dashboard2')">
           <li class="Spacing"><img class="fig"src="../images/prescrip.png">&nbsp; Prescriptions</li>
          </button>
           <li class="Spacing"><img class="fig"src="../images/Lab.png">&nbsp; Lab Reports</li>
           <li class="Spacing"><img class="fig"src="../images/Profile1.png">&nbsp; Profile</li>
           <li class="Spacing"><img class="fig"src="../images/inventory.png">&nbsp; Inventory</li>
           <li class="Spacing"><img class="fig"src="../images/contactSup.png">&nbsp; Contact Supplier</li>
           <li class="Spacing"><img class="fig"src="../images/Bill.png">&nbsp; Billing</li>
           <li class="Spacing"><img class="fig"src="../images/help.png">&nbsp; Help</li>

      </ul>

    </div>
<div class="main-content">
    <div id="dashboard1" class="content <?php echo (!isset($_GET['dashboard2']) ? 'active' : ''); ?>">
         <div class="top-container">
            <div class="box1">
               <span>Upcoming Deliveries</span>
         
            <img class="fig1" src="../images/upcoming.png">
       
          </div>   
          
          <div class="box2">
            <span>Messages</span>
           
            <img class="fig1" src="../images/message.png">
        
          </div>   
          
          <div class="box2">
            <span>Tasks</span>
            
            <img class="fig1" src="../images/todo.png">
        
          </div>   
          
          <div class="box2">
            <span>Patient Queries</span> &nbsp;
            <img class="fig1" src="../images/inquiry.png">
          </div>   
    
    </div>

    <div class="chart-box">
      <div class="graph-box">
       <div class="Graph-div">
           <img class="graph" src="../images/NewGraph1.gif">
        </div>
       </div>  
        
       <div class="card1">
        <div class="graph-box2">
            <img class="graph" src="../images/NewGraph2.gif">
          </div>
       </div>
       
       <div class="card2">
        <div class="medicine">
           <img class="symbol" src="../images/medicine.png">
        </div>
     </div>
     <div class="card3">
      <div class="doctor">
         <img class="symbol" src="../images/doctor.png">
      </div>
   </div>
</div>


  <div class="bottom-container">
  <div class="prescrip-div">
     <span class="prescrip-head">Prescription&nbsp;&nbsp;Management</span>
     <table class="prescription-management-table">
        <thead>
            <tr>
                <th>Prescription ID</th>
                <th>Patient Name</th>
                <th>Medicine List</th>
                <th>Status</th>
                <th>Prescription Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>p4567</td>
                <td>John Doe</td>
                <td>Amoxicillin, Ibuprofen</td>
                <td>Approved</td>
                <td>2024-10-05</td>
            </tr>
            <tr>
                <td>p4568</td>
                <td>Jane Smith</td>
                <td>Paracetamol, Aspirin</td>
                <td>Processing</td>
                <td>2024-10-06</td>
            </tr>
            <tr>
                <td>p4569</td>
                <td>Michael Lee</td>
                <td>Metformin, Lisinopril</td>
                <td>Pending Approval</td>
                <td>2024-10-07</td>
            </tr>
        </tbody>
    </table>
    
    </div>
    <div class="prescrip-div2">
      <span class="prescrip-head2">Order Summary</span>

      <table class="order-summary-table">
      <thead>
          <tr>
            <th>Order ID</th>
            <th>Status</th>
            <th>Total Amount</th>
            <th>Delivery Date</th>
          </tr>
      </thead>
        <tbody>
          <tr>
            <td>a12g45</td>
            <td>Confirmed</td>
            <td>Rs.25000.00</td>
            <td>2024-10-10</td>
      </tr>
          <tr>
            <td>a123d6</td>
            <td>Shipped</td>
            <td>Rs.15000.00</td>
            <td>2024-10-12</td>
          </tr>
          <tr>
            <td>a123f7</td>
            <td>Pending Payment</td>
            <td>Rs.88000.00</td>
            <td>2024-10-15</td>
          </tr>
          </tbody>
         </table>
            </div>
     </div>
</div>


  <div id="dashboard2" class="content <?php echo (isset($_GET['dashboard2']) ? 'active' : ''); ?>">
  <div class="top-items">
    <img  class="top-img"  src="../images/verified.png">
  <center>
      <h2 class="topic">Verified Prescriptions</h2>
    </center>
  </div> 

<div class="form-container">
    <div class="forms-div">
        <h2 class="update"><?php echo $update ? 'Update Regimen' : 'Create Regimen'?></h2>
     <form action="newDash.php?dashboard2" method="POST" id="regimenForm" class="regi">

          <input type="hidden" name="id" value="<?php echo $id; ?>">

          <label for="medication">Medication Name:</label><br>
          <input type="text" id="medication" name="m_name" required placeholder="Enter Medication" value="<?php echo $m_name; ?>"><br>
          <label for="dosage">Dosage:</label><br>
          <input type="text" id="dosage" name="dosage" required placeholder="Enter Dosage" value="<?php echo $dosage; ?>"><br>
         
          <label for="frequency">Frequency</label><br>
          <input type="text" id="frequency" name="frequency" required placeholder="Enter Frequency" value="<?php echo $frequency; ?>"><br>

          <label for="duration">Duration</label><br>
          <input type="text" id="duration" name="duration" required placeholder="Enter Duration" value="<?php echo $duration; ?>"><br>
 
         <label for="notes">Additional Notes:</label><br>
        <textarea id="notes" name="note" placeholder="Additional notes..."><?php echo $note; ?></textarea><br>
           <?php if($update): ?>
            <button type="submit" name="update" class="sendbtn">Update</button>
            <?php else: ?>
          <button type="submit" name="save" class="sendbtn">Create</button>
            <?php endif; ?>

     </form>
    </div>
  </div>
  <div class="image-container">
   <img  class="form-image" src="../images/pills.jpg">

  </div>
</div>  
<?php
//fetch
$stmt = $pdo->query("SELECT * FROM regimens");
$regimens = $stmt->fetchAll(PDO::FETCH_ASSOC)

?>

<style>
  .fetch
{
    margin-top: 30px;
    margin-left: 420px;
    border: solid black 2px;
    background-color: lightskyblue;
    border-radius: 10px;
    padding: 10px 10px;
    font-size: 14px;

}
.fetch td {
    font-weight: 500;
}

.fetch th {
    margin-left: 30px;
}
.fetch th, .fetch td {
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
     font-size: 14px;
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
    font-size: 14px;
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

<table class="fetch">
    <thead>
         <tr>
            <th>Regimen ID</th>
            <th>Medication Name</th>
            <th>Dosage</th>
            <th>Frequency</th>
            <th>Duration</th>
            <th>Additional Notes</th>
         </tr>
    </thead>
    <tbody>
      <?php foreach ($regimens as $regimen): ?>
     <tr>
         <td><?php echo $regimen['id']; ?></td>
         <td><?php echo $regimen['m_name']; ?></td>
         <td><?php echo $regimen['dosage']; ?></td>
         <td><?php echo $regimen['frequency']; ?></td>
         <td><?php echo $regimen['duration']; ?></td>
         <td><?php echo $regimen['note']; ?></td>
         <td>
         <a href="newDash.php?edit=<?php echo $regimen['id']; ?>&dashboard2" class="btn-edit">Edit</a><br><br>
         <a href="newDash.php?delete=<?php echo $regimen['id']; ?>&dashboard2" class="btn-delete">Delete</a>

         </td>
     </tr>
     <?php endforeach; ?>
    </tbody>


</table>
</div>


</body>
</html>