<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="order.css">
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
<h2>SEARCH BY NAME</h2>
</div>
  <div class="container">
    <input type="text" placeholder="Name" name="searchname" required>
    <button type="submit" name="search" >Search</button>

  </div>
  
</form>
<?php
    include_once "connect.php";
    if(isset($_POST['search'])){
    $Name=$_POST['searchname'];
    $query="select * from measurement where name='$Name'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    $query1="select * from order_info where name='$Name'";
    $result1=mysqli_query($conn,$query);
    $row1=mysqli_fetch_array($result);
    ?>
<br/>
<br/>
<form id="form" method="post">
<div class="container">
<h2>PLACE ORDER</h2>
</div>
  <div class="container">
    <input type="text" placeholder="Name" name="name" required>
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
    <br/>
    <label style="top:323px;" id="lbl1">CHEST </label>
    <input style="float:right;width:60%" id="shirt1"  type="number" min="0" placeholder="chest" name="chest" value="<?php echo $row['chest']?>" required>
    <label style="top:383px;" id="lbl2">SHOULDER </label>
    <input style="float:right;width:60%" id="shirt2" type="number" min="0" placeholder="shoulder" name="shoulder"  value="<?php echo $row['shoulder']?>" required>
    <input id="shirt3" type="number" placeholder="Shirt Quantity" min="0" name="squantity" required>
    <label style="top:500px;" id="lbl3">WAIST </label>
    <input style="float:right;width:60%" id="pant1" type="number" min="0" placeholder="Waist" name="waist"  value="<?php echo $row['waist']?>" required>
    <label style="top:560px;" id="lbl4">HEIGHT</label>
    <input style="float:right;width:60%" id="pant2" type="number" min="0"  placeholder="Height" name="height"  value="<?php echo $row['height']?>" required>	
    <input id="pant3" type="number" placeholder="Pant Quantity" min="0"  name="pquantity"  required> 
    
    <input id="delivdate" type="date" placeholder="Expeceted Delivery" name="ddate" required>
    <div class="container2">
  <input id="d" type="text" name="dressname"value="" ></input>
  </div>
    <button  type="submit" name="submit1" >Add</button>
    
  </div>
</form>
<?php
 }
?>
<?php
include_once "connect.php";
if(isset($_POST['submit1']))  {
  $Name=$_POST['name'];
 
  $Date=$_POST['ddate'];
  $Chest=$_POST['chest'];
  $Shoulder=$_POST['shoulder'];
  $ShirtQuantity=$_POST['squantity'];
  $Waist=$_POST['waist'];
  $Height=$_POST['height'];
  $PantQuantity=$_POST['pquantity'];
  $Dress=$_POST['dressname'];
  $Amount=($ShirtQuantity*300)+($PantQuantity*350);
  if ($Chest==0 and $Shoulder==0){
    $sql2="update measurement set waist='$_POST[waist]',height='$_POST[height]' where name='$_POST[name]' ";
  }
  else if($Waist==0 and $Height==0 ){
    $sql2="update measurement set chest='$_POST[chest]',shoulder='$_POST[shoulder]' where name='$_POST[name]' ";
  }
  else{
    $sql2="update measurement set chest='$_POST[chest]',shoulder='$_POST[shoulder]' waist='$_POST[waist]',height='$_POST[height]' where name='$_POST[name]' ";
  }
  $sql3="UPDATE order_info set dress='{$Dress}',shirts_no={$ShirtQuantity},pants_no={$PantQuantity},amount={$Amount},deliverydate='{$Date}',deliverystatus='NOT DELIVERED',payment='PENDING' where name='$_POST[name]'";  
  $insert2=mysqli_query($conn,$sql2);
  $insert3=mysqli_query($conn,$sql3);
    if($insert2 or $insert3) {
      echo "<h3>Order Placed Successfully</h3>";
    } 
    }

?>



<br/>
<br/>
<br/>

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
  var l1=document.getElementById("lbl1");
  var l2=document.getElementById("lbl2");
  var l3=document.getElementById("lbl3");
  var l4=document.getElementById("lbl4");
  if (s.checked && p.checked)
  {
    s1.style.visibility="visible";
    s2.style.visibility="visible";
    s3.style.visibility="visible";
    p1.style.visibility="visible";
    p2.style.visibility="visible";
    p3.style.visibility="visible";
    
    d.style.visibility="visible";
    l1.style.visibility="visible";
    l2.style.visibility="visible";
    l3.style.visibility="visible";
    l4.style.visibility="visible";
    f.style.height="800px";
    dressname.value="Shirt Pant";
  }
  else
  {
    f.style.height="624px";
    if(s.checked){
    s1.style.visibility="visible";
    s2.style.visibility="visible";
    s3.style.visibility="visible";
    l1.style.visibility="visible";
    l2.style.visibility="visible";
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
    l3.style.top="323px";
    l4.style.top="383px";
    d.style.bottom="70px"
    p1.style.width="60%";
    p2.style.width="60%";
    p3.style.width="95%";
    d.style.width="95%";
    p1.style.right="10px";
    p2.style.right="10px";
    p3.style.left="10px";
    d.style.left="10px";
    p1.style.visibility="visible";
    p2.style.visibility="visible";
    p3.style.visibility="visible";
    d.style.visibility="visible";
    l3.style.visibility="visible";
    l4.style.visibility="visible";
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
