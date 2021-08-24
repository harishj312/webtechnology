<?php
    session_start();
    include_once "connect.php";
    if (isset($_POST['submit'])) { 
    $username=$_POST['uname'];
    $password=$_POST['psw'];
    $stmt=$conn->prepare("select * from login where username= ?");
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result->num_rows>0)
    {
        $data=$stmt_result->fetch_assoc();
        if($data['password']===$password)
        {
            header("location:home.html");
        }
        else
        {
            echo "<h3>Invalid username or password</h3>";
        }
        }
    else
    {
        echo "<h3>Ivalid username or password</h3>";      
    }
        $stmt->close();
        $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="loginstyles.css">

</head>
<body>
<center>
<div class="header">
  <h1>J FIX TAILORS</h1>
</div>
<form  method="post">
<div class="container">
<h2>Login </h2>
</div>
  <div class="imgcontainer">
    <img src="admin.png" alt="Avatar" >
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>   
    <button type="submit" name="submit">Login</button>
  </div>
</form>
</center>

</body>
</html>
