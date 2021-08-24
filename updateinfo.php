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
    <style>
        #searchform{
    background: #ebebe0;
  border: 3px solid #f1f1f1;
  width:380px;
  height:360px;
  margin-top:-50px;
  opacity:0.7;
  border-radius:15px;
  position:relative;
  }
  </style>
<form id="searchform"  method="post">
<div class="container">
<h2>UPDATE CUSTOMER DETAILS</h2>
</div>
  <div class="container">
    <input type="text" placeholder="Name" name="name" required>
    <input type="text" placeholder="Address" name="address" required>
    <input type="number" placeholder="Contact Number" name="cno" required>
    <input type="text" placeholder="Email" name="email" required>
    <button  type="submit" name="submit1" >UPDATE STATUS</button> 
  </div>
</form>

<?php
include_once "connect.php";
if(isset($_POST['submit1']))  {
  $Name=$_POST['name'];
  $Address=$_POST['address'];
  $Number=$_POST['cno'];
  $Email=$_POST['email'];
  $sql="UPDATE customer SET address='{$Address}',mobile={$Number},email='{$Email}' where name='{$Name}'";  
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