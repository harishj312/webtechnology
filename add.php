<?php
include_once "connect.php";
  if(isset($_POST['submit']))  {
    $Name=$_POST['name'];
    $Address=$_POST['address'];
    $Mobile=$_POST['cno'];
    $Email=$_POST['email'];
    $Date=$_POST['ddate'];
    $Chest=$_POST['chest'];
    $Shoulder=$_POST['shoulder'];
    $ShirtQuantity=$_POST['squantity'];
    $Waist=$_POST['waist'];
    $Height=$_POST['height'];
    $PantQuantity=$_POST['pquantity'];
    $Dress=$_POST['dressname'];
    $Amount=($ShirtQuantity*300)+($PantQuantity*350);
    $sql1= "INSERT INTO customer (name,address,mobile,email)
        VALUES ('{$Name}', '{$Address}',{$Mobile},'{$Email}')";
    $sql2="INSERT INTO measurement(name,chest,shoulder,waist,height) VALUES ('{$Name}',{$Chest},
    {$Shoulder},{$Waist},{$Height})";
    $sql3="INSERT INTO order_info(name,dress,shirts_no,pants_no,amount,deliverydate) VALUES
    ('{$Name}','{$Dress}',{$ShirtQuantity},{$PantQuantity},{$Amount},'{$Date}')";
    $insert1=mysqli_query($conn,$sql1);
    $insert2=mysqli_query($conn,$sql2);
    $insert3=mysqli_query($conn,$sql3);
      if($insert1 and $insert2 and $insert3) {
        echo "<h3>Order Placed Successfully</h3>";
      } 
      }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="addstyles.css">
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

<form id="form" method="post">
<div class="container">
<h2>ADD CUSTOMER</h2>

</div>
  <div class="container">
    <input type="text" placeholder="Name" name="name" required>
    <input type="text" placeholder="Address" name="address" required>
    <input type="number" placeholder="Contact Number" name="cno" required>
    <input type="text" placeholder="Email" name="email" required>
    <br/>
    <p> Select Dress Type</p>
    <label class="container1">Shirt
      <input id="shirt" type="checkbox" name="dress[]"  value="shirt">
      <span class="checkmark"></span>
    </label>
    <label class="container1">Pant
      <input  id="pant" type="checkbox" name="dress[]" value="pant">
      <span class="checkmark"></span>
    </label>
    <button class="b1" name="ok" onclick="check()">OK</button>
    <input id="shirt1"  type="number" min="0" placeholder="chest" name="chest" required>
    <input id="shirt2" type="number" min="0" placeholder="shoulder" name="shoulder"  required>
    <input id="shirt3" type="number" min="0" placeholder="Shirt Quantity" name="squantity" required>
    <input id="pant1" type="number" min="0" placeholder="Waist" name="waist"  required>
    <input id="pant2" type="number" min="0" placeholder="Height" name="height"  required>	
    <input id="pant3" type="number" min="0" placeholder="Pant Quantity" name="pquantity"  required> 
    
    <input id="delivdate" type="date" placeholder="Expeceted Delivery" name="ddate" required>
    <div class="container2">
  <input id="d" type="text" name="dressname"value="" ></input>
  </div>
    <button  type="submit" name="submit" >Add</button>
    
  </div>
</form>
</center>

<script type="text/javascript">
  function check()
  {
  var s= document.getElementById("shirt");
  var p= document.getElementById("pant");
  var f=document.getElementById("form");
  var s1=document.getElementById("shirt1");
  var s2=document.getElementById("shirt2");
  var s3=document.getElementById("shirt3");
  var p1=document.getElementById("pant1");
  var p2=document.getElementById("pant2");
  var p3=document.getElementById("pant3");
  var d=document.getElementById("delivdate");
  var dressname=document.getElementById("d");
  if (s.checked && p.checked)
  {
    s1.style.visibility="visible";
    s2.style.visibility="visible";
    s3.style.visibility="visible";
    p1.style.visibility="visible";
    p2.style.visibility="visible";
    p3.style.visibility="visible";
    d.style.visibility="visible";
    f.style.height="980px";
    dressname.value="Shirt Pant";
  }
  else
  {
    f.style.height="805px";
    if(s.checked){
    s1.style.visibility="visible";
    s2.style.visibility="visible";
    s3.style.visibility="visible";
    d.style.visibility="visible";
    d.style.position="absolute";
    d.style.bottom="80px";
    d.style.width="95%";
    d.style.left="10px";
    p1.value=0;
    p2.value=0;
    p3.value=0;
    dressname.value="Shirt";
    }
    else if(p.checked)
    {
    p1.style.position="absolute";
    p2.style.position="absolute";
    p3.style.position="absolute";
    
    d.style.position="absolute";
    p1.style.bottom="250px";
    p2.style.bottom="190px";
    p3.style.bottom="130px";
    
    d.style.bottom="70px"
    p1.style.width="95%";
    p2.style.width="95%";
    p3.style.width="95%";
   
    d.style.width="95%";
    p1.style.left="10px";
    p2.style.left="10px";
    p3.style.left="10px";
   
    d.style.left="10px";
    p1.style.visibility="visible";
    p2.style.visibility="visible";
    p3.style.visibility="visible";
    
    d.style.visibility="visible";
    s1.value=0;
    s2.value=0;
    s3.value=0;
    dressname.value="Pant";
    }
  }
}
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
