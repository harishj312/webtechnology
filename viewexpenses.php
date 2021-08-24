<?php 
  include_once "connect.php";
$sql = "SELECT * FROM expenses"; 
$result = mysqli_query($conn,$sql); 
$total=0;
?> 

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="viewexpenses.css">

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
  <h3 > Expenses</h3>
<table>
  <tr>
    <th> Date </th>
    <th>Expense</th>
    <th>Amount</th>
  </tr>
   <?php 
  while($rows=$result->fetch_assoc()) 
{ 
?> 
    <tr style="background-color:grey; text-align:center">
       <td><?php echo $rows['date'];?></td> 
       <td><?php echo $rows['expense'];?></td> 
       <td><?php echo $rows['amount'];?></td> 
     </tr> 
   <?php
 $total=$total+$rows['amount'];
}
?>
  <tfoot>
    <tr>
      <td>Total</td>
      <td></td>
      <td><?php echo $total; ?></td>
    </tr>
  </tfoot> 
</table>
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
</center>
</body>
</html>
