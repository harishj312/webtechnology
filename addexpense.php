<?php
    if (isset($_POST['submit'])) { 
    $Date=$_POST['date'];
    $Expense=$_POST['expense'];
    $Amount=$_POST['amount'];
    include_once "connect.php";
    $insert_query = mysqli_query($conn, "INSERT INTO expenses (date,expense,amount)
    VALUES ('{$Date}', '{$Expense}','{$Amount}')");
    if ($insert_query){
      echo "<h3>Expense Added</h3>";  
    }   
}    
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="addexpense.css">

</head>
<body>
<div class="header">
  <h1>J FIX TAILORS</h1>
</div>
<div class="topnav">
  <a  onclick="drop()">Order</a>
  <a onclick="managedrop()">Update</a>
  <a href="customers.php">Customers list</a>
  <a href="addexpense.php">Add Expenses</a>
  <a href="viewexpenses.php">View Expenses</a>
  <a  href="index.php" style="float:right">Logout</a>
  
</div>
<div class="topnav" id="container"  >
  <a href="add.php"> New Customer</a>
  <a href="order.php">Existing Customer</a>
</div>
<div class="topnav" id="managecontainer"  >
  <a href="updatestatus.php">Update Status</a>
  <a href="updateinfo.php">Customer Info</a>
</div>
<center>
<form  method="post">
<div class="container">
<h2>Expenses</h2>
</div>
  <div class="container">
  <input  type="date"  name="date" required>
    <input type="text" placeholder="Expense" name="expense" required>
    <input type="text" placeholder="Amount" name="amount" required>
    <button type="submit" name="submit">Add Expense</button>
  </div>
</form>
</center>
<script>
  function drop() {
  var v=document.getElementById("container");
  if(v.style.visibility=="visible"){
    v.style.visibility="hidden";
  }
  else{
    v.style.visibility="visible";
  }
}
function managedrop(){
    var m=document.getElementById("managecontainer");
    if(m.style.visibility=="visible"){
    m.style.visibility="hidden";
  }
  else{
    m.style.visibility="visible";
  }
  }
</script>
</body>
</html>
