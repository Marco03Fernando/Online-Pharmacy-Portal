<?php 

require 'config2.php';

// intitialize the variables
$id = 0;
$name = '';
$quantity = '';
$status = '';
$date = '';

$update = false;
$currentDashboard = 'dashboard1';

if (isset($_POST['save'])) {
  $name = $_POST['name'];
  $quantity = $_POST['quantity'];
  $status = $_POST['status'];
  $date= $_POST['date'];

  $stmt = $pdo->prepare("INSERT INTO orders (name, quantity , status, date) VALUES (?,?, ?, ?)");
  $stmt->execute([$name,$quantity, $status, $date]);

  header("location: dash.php?dashboard2");

}

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $quantity = $_POST['quantity'];
  $status = $_POST['status'];
  $date = $_POST['date'];
 


  $stmt = $pdo->prepare("UPDATE orders SET name = ?, quantity = ?,  status = ?, date = ? WHERE id = ?");
  $stmt->execute([$name,$quantity, $status, $date, $id]);

  header("Location: dash.php?dashboard2");
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $stmt = $pdo->prepare("DELETE FROM orders WHERE id = ?");
  $stmt->execute([$id]);

  header("Location: dash.php?dashboard2");
}

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];

  $stmt = $pdo->prepare("SELECT * FROM orders WHERE id = ?");
  $stmt->execute([$id]);
  $order = $stmt->fetch(PDO::FETCH_ASSOC);

  $name = $order['name'];
  $quantity = $order['quantity'];
  $status = $order['status'];
  $date = $order['date'];
 
 
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
    <link rel="shortcut icon" type="x-icon" href="../images/logo icon.ico">
    <link rel="stylesheet" href="../CSS/dash.css">
    <title>Vendor Dashboard</title>
</head>
<body>
      
  <script src="../JavaScript/dash.js"></script>
    
    <div class="side-menu">

      <button class="btn1" onclick="toggleDarkMode()">
        <img class="icon" id="dark-icon" src="../images/dark.png">
      </button>
      
      <ul>
        
       <button class="pbutton" onclick="showDashboard('dashboard1')">
           <li class="top-icon"><img class="prof"src="../images/dash.png">&nbsp; Dashboard</li>
       </button>
       <button class="pbutton" onclick="showDashboard('dashboard2')">    
           <li class="listSpace"><img class="prof"src="../images/orders.png">&nbsp; Orders</li>
       </button>    
           <li class="listSpace"><img class="prof"src="../images/shipments.png">&nbsp; Shipments</li>
           <li class="listSpace"><img class="prof"src="../images/track.png">&nbsp; Tracking</li>
           <li class="listSpace"><img class="prof"src="../images/Profile1.png">&nbsp; Profile</li>
           <li class="listSpace"><img class="prof"src="../images/inventory.png">&nbsp; Inventory Management</li>
           <li class="listSpace"><img class="prof"src="../images/report.png">&nbsp; Reports</li>
           <li class="listSpace"><img class="prof"src="../images/notifications.png">&nbsp; Notifications</li>
           <li class="listSpace"><img class="prof"src="../images/help.png">&nbsp; Help</li>

      </ul>

    </div>
<div class="main-Container">  
  <div id="dashboard1" class="content <?php echo (!isset($_GET['dashboard2']) ? 'active' : ''); ?>"> 
    <div class="container">
          <div class="card1">
            <span>Recent Orders</span>
         
            <img class="prof1" src="../images/recentOrders.png">
       
          </div>   
          
          <div class="card2">
            <span>Top Products</span>
           
            <img class="prof1" src="../images/perform.png">
        
          </div>   
          
          <div class="card2">
            <span>Pending Payments</span>
            
            <img class="prof1" src="../images/pending.png">
        
          </div>   
          
          <div class="card2">
            <span>Recent Payments</span> &nbsp;
            <img class="prof1" src="../images/recent.png">
          </div>   
    
    </div>

    <div class="chart-container">
      <div class="card">
       <div class="Graph-div">
           <img class="graph" src="../images/graph.gif">
        </div>
       </div>  
        
       <div class="card-1">
        <div class="piechart">
            <img class="graph" src="../images/graph3.gif">
          </div>
       </div>

       <div class="card-2">
          <div class="analysis">
             <img class="dash-image" src="../images/analysis.png">
          </div>
       </div>
       <div class="card-3">
        <div class="analysis1">
           <img class="dash-image" src="../images/analysis1.png">
        </div>
     </div>
  </div>

  <div class="bottom-container">
  <div class="recent-div">
     <span class="recent-head">Recent Orders</span>
     <table class="sum-table">
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
            <td>Rs. 25,000.00</td>
            <td>2024-10-10</td>
         </tr>
        <tr>
            <td>a123d6</td>
            <td>Shipped</td>
            <td>Rs. 15,000.00</td>
            <td>2024-10-12</td>
   </tr>
     <tr>
            <td>a123f7</td>
            <td>Pending Payment</td>
            <td>Rs. 88,000.00</td>
            <td>2024-10-15</td>
        </tr>
    </tbody>
</table>
    </div>
    <div class="recent-div2">
      <span class="recent-head1">Recent Payments</span>
      <table class="sum-table">
    <thead>
        <tr>
            <th>Payment ID</th>
            <th>Order ID</th>
            <th>Amount Paid</th>
            <th>Payment Date</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>p12345</td>
            <td>a12g45</td>
            <td>Rs. 25,000.00</td>
            <td>2024-09-28</td>
        </tr>
        <tr>
            <td>p67890</td>
            <td>a123d6</td>
            <td>Rs. 15,000.00</td>
            <td>2024-09-30</td>
        </tr>
        <tr>
            <td>p54321</td>
            <td>a123f7</td>
            <td>Rs. 88,000.00</td>
            <td>2024-10-02</td>
        </tr>
    </tbody>
</table>
     </div>

  </div>
</div>

<div id="dashboard2" class="content <?php echo (isset($_GET['dashboard2']) ? 'active' : ''); ?>">
  <div class="top-items">
  <center>
      <h2 class="topic">Supplier Order Management</h2>
    </center>
  </div> 

<div class="form-container">
  <div class="forms-div">
<h2 class="update"><?php echo $update ? 'Update Order ' : 'Create Order'?></h2>
     <form action="dash.php?dashboard2" method="POST" id="orderForm" class="order-form">

          <input type="hidden" name="id" value="<?php echo $id; ?>">

          <label for="medication">Medication Name:</label><br>
          <input type="text" id="name" name="name" required placeholder="Enter Medication" value="<?php echo $name; ?>"><br>
          <label for="dosage">Quantity:</label><br>
          <input type="text" id="quantity" name="quantity" required placeholder="Enter Quantity" value="<?php echo $quantity; ?>"><br>
         
          <label for="frequency">Status</label><br>
          <input type="text" id="status" name="status" required placeholder="Enter Status" value="<?php echo $status; ?>"><br>

          <label for="duration">Delivery Date</label><br>
          <input type="text" id="date" name="date" required placeholder="Enter Date" value="<?php echo $date; ?>"><br>
 
           <?php if($update): ?>
            <button type="submit" name="update" class="sendbutton">Update</button>
            <?php else: ?>
          <button type="submit" name="save" class="sendbutton">Create</button>
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
$stmt = $pdo->query("SELECT * FROM orders");
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC)

?>

<style>
  .fetch
{
    margin-top: 30px;
    margin-left: 470px;
    border: solid black 2px;
    background-color: lightgrey;
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
            <th>Supplier ID</th>
            <th>Medication Name</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Delivery Date</th> 
         </tr>
    </thead>
    <tbody>
      <?php foreach ($orders as $order): ?>
     <tr>
         <td><?php echo $order['id']; ?></td>
         <td><?php echo $order['name']; ?></td>
         <td><?php echo $order['quantity']; ?></td>
         <td><?php echo $order['status']; ?></td>
         <td><?php echo $order['date']; ?></td>
         
         <td>
         <a href="dash.php?edit=<?php echo $order['id']; ?>&dashboard2" class="btn-edit">Edit</a>
         <a href="dash.php?delete=<?php echo $order['id']; ?>&dashboard2" class="btn-delete">Delete</a>

         </td>
     </tr>
     <?php endforeach; ?>
    </tbody>


</table>

</div>













</body>
</html>


