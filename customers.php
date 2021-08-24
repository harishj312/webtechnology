<?php 
  include_once "connect.php";
$sql = "SELECT c.id,c.name,c.address,c.mobile,c.email,o.order_id,o.dress,
o.shirts_no,o.pants_no,o.amount,o.deliverydate,o.payment,o.deliverystatus from customer c inner join order_info o on c.name=o.name"; 
$result = $conn->query($sql) ;
$x=1;
?> 

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="customers.css">

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
  <h3 > Customer List</h3>
<table>
  <tr>
    <th>S.NO</th>
    <th>Name</th>
    <th>Address</th>
    <th>mobile</th>
    <th>Email</th>
    <th>Dress</th>
    <th>No Of Shirts </th>
    <th>No of Pants</th>
    <th>Amount</th>
    <th>Delivery Date</th>
    <th>Payment</th>
    <th>Delivery Status</th>
  </tr>
<?php 
  while($rows=mysqli_fetch_array($result)) 
{ 
?> 
  <tr style="background-color:grey; text-elign:center">
  <td><?php echo $x ;?></td>
    <td><?php echo $rows['name'];?></td>
    <td><?php echo $rows['address'];?></td>
    <td><?php echo $rows['mobile'];?></td>
    <td><?php echo $rows['email'];?></td>
    <td><?php echo $rows['dress'];?></td>
    <td><?php echo $rows['shirts_no'];?></td>
    <td><?php echo $rows['pants_no'];?></td>
    <td><?php echo $rows['amount'];?></td>
    <td><?php echo $rows['deliverydate'];?></td>
    <td><?php echo $rows['payment'];?></td>
    <td><?php echo $rows['deliverystatus'];?></td>
  </tr>
   <?php
  $x++;
}
$conn->close();
?>
</table>
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
