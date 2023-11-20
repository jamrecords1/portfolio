<?php 

error_reporting(0);

include('log.php');

session_start();


$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
  die("connection error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $username=$_POST["username"];
  $password=$_POST["password"];


  $sql="SELECT * FROM admin WHERE username='".$username."' AND password='".$password."' ";

  $result=mysqli_query($data,$sql);

  $row=mysqli_fetch_array($result);

  if($row["usertype"]=="admin")
  {


    // echo "admin";

    $_SESSION["username"]=$username;
    
    header("location:indexadmin.php");
  }
  elseif($row["usertype"]=="user")
  {

    // echo "customer";

    $_SESSION["username"]=$username;
    
    header("location:indexuser.php");
  }

  else
  {
    echo "<script>alert('username or password incorrect')</script>";
  }


}
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Zea's All around Ordering System</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form method="POST">
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <input type="submit" value="Login">
      </form>
      <center><a href="register.php"><p>No account yet? Click here.</p></a></center>
    </div>
  </body>
</html>