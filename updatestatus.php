<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="updatestatus.css">
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
<br/>
<br/>
<center>
<form id="searchform" method="post">
<div class="container">
<h2>UPDATE STATUS</h2>
</div>
  <div class="container">
    <input type="text" placeholder="Name" name="name" required>
    <label class="container1"  for="payment">Payment Status</label>
  <select name="payment" >
    <option value="PENDING">PENDING</option>
    <option value="PAID">PAID</option>
  </select>
  <br/>
  <br/>
  <label class="container1" for="deliverystatus">Delivery Status</label>
  <select name="deliverystatus" >
    <option value="NOT DELIVERED">NOT DELIVERED</option>
    <option value="DELIVERED">DELIVERED</option>
  </select>
    <button  type="submit" name="submit1" >UPDATE STATUS</button> 
  </div>
</form>

<?php
include_once "connect.php";
if(isset($_POST['submit1']))  {
  $Name=$_POST['name'];
  $Payment=$_POST['payment'];
$Deliver=$_POST['deliverystatus'];
  $sql="UPDATE order_info set deliverystatus='{$Deliver}',payment='{$Payment}' where name='$_POST[name]'";  
  $insert=mysqli_query($conn,$sql);
    if($insert) {
?>
<br/>
<?php
      echo "<h3>Updated Successfully</h3>";
    } 
    }

?>
<br/>
<br/>
<br/>
</center>

<script type="text/javascript">
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