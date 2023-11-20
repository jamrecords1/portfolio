<?php 

require_once('configreg.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Zea's All around Ordering System</title>
    <link rel="stylesheet" href="style.css">
  </head>
<body>
</body>
<?php 

if(isset($_SESSION['message']))
    {?>
        <div class = "alert alert-<?=$_SESSION['msg_type']?>">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?> 
        </div><?php
  }?>
<div>
  <?php 
  if(isset($_POST['create'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO admin (username, password) VALUES(?,?)";
    $stminsert = $db->prepare($sql);
    $result = $stminsert->execute([$username, $password]);

    $_SESSION['message'] = "Registered Successfully";
    $_SESSION['msg_type'] = "success";
    header('location:login.php');
  }
  ?>
</div>

<div class="center">
      <h1>Register</h1>
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
        <input type="submit" name="create" value="Register">
      </form>
      <center><a href="login.php"><p>Already have an account? Click here.</p></a></center>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>