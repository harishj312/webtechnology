
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="searchstyles.css">

</head>
<body>

<div class="header">
  <h1>J FIX TAILORS</h1>
</div>
<div class="topnav">
  <a  onclick="drop()">Order</a>
  <a href="manage.php">Manage</a>

  <a href="customers.php">Customers list</a>
  <a href="addexpense.php">Add Expenses</a>
  <a href="viewexpenses.php">View Expenses</a>
  <a  href="login.html" style="float:right">Logout</a>
  
</div>
<div class="topnav" id="container" >
  <a href="add.php">New Customer</a>
  <a href="order.php">Existing Customer</a>
</div>
<center>
<form id="form" method="post">
<div class="container">
<h2>SEARCH CUSTOMERs</h2>
</div>
  <div class="container">
    <input type="text" placeholder="Name" name="name" required>
    <button  type="submit" name='search'>Search</button>
  </div>
</form>
</center>
<?php
session_start();
    include_once "connect.php";
    if(isset($_POST['search'])){
    $Name=$_POST['name'];
    $_SESSION['name']=$Name;
    $sql = "SELECT o.order_id,o.name,o.amount,o.deliverydate,o.payment,o.deliverystatus,c.address,c.mobile,c.email,m.chest,m.shoulder,m.waist,m.height from order_info o inner join customer c on o.name=c.name inner join measurement m 
on c.name=m.name where o.name='{$Name}'";
$sql1="UPDATE order_info set deliverystatus='DELIVERED',payment='PAID' WHERE o.name='{$Name}'";
$result = $conn->query($sql) ;
$rows=mysqli_fetch_array($result); 
    ?>
<br/>
<table>
  <tr>
    <th>Order ID</th>
    <th>Name</th>
    <th>Address</th>
    <th>mobile</th>
    <th>Email</th>
    <th>Chest</th>
    <th>Shoulder</th>
    <th>Waist</th>
    <th>Height</th>
    <th>Amount</th>
    <th>Delivery Date</th>
    <th>Payment</th>
    <th>Delivery Status</th>
  </tr>
  <tr style="background-color:grey; text-elign:center">
  <td><?php echo $rows['order_id'];?></td>
    <td><?php echo $rows['name'];?></td>
    <td><?php echo $rows['address'];?></td>
    <td><?php echo $rows['mobile'];?></td>
    <td><?php echo $rows['email'];?></td>
    <td><?php echo $rows['chest'];?></td>
    <td><?php echo $rows['shoulder'];?></td>
    <td><?php echo $rows['waist'];?></td>
    <td><?php echo $rows['height'];?></td>
    <td><?php echo $rows['amount'];?></td>
    <td><?php echo $rows['deliverydate'];?></td>
    <form>
    <td><?php echo $rows['payment'];?> </td>
    <td><?php echo $rows['deliverystatus'];?>
  </td>
  </tr>
  </table>
  <button styles id="b" type="submit">UPDATE</button>
</form>
</div>
 <?php 
    
  }
if (isset($_POST['submit'])){
  $up="UPDATE order_info SET deliverystatus='DELIVERED',payment='{$Payment}' where name='{$_SESSION['name']}'";
   $ans=mysqli_query($conn,$up);
   if ($ans){
     echo "<h3> UPDATED </h3>";
   }
  
}

?>
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
function f(){
  alert("hi");
}
</script>
</body>
</html>
