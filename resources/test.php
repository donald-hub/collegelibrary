<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<style type="text/css">
body
{
	background:url("images/home.jpg");
  background-size: cover;
}
.form-horizontal
{
	background: lightcyan;
}
#form1{
width:100%;
box-shadow: 10px 10px 10px #000000;
margin-top: 30%;
margin-bottom: 30%;
padding-top:20px;
padding-left:20px;
padding-right:20px;
padding-bottom: 20px;
}

</style>
</head>

<body>
<?php
if(isset($_POST['login'])){

  if(!empty($_POST['username']) && !empty($_POST['password'])){
    $usertype=$_POST['usertype'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    require "connect.php" ;
    if($connect->connect_error)
    {
    die("Connection failed:".$connect->connect_error);
    }

    if($usertype=="admin")
      {
        if($username=="admin" && $password=="1234")
        header('Location:../admin.php');
        else {
          header("Location:../index.html");
            ?> <div class="alert alert-info" role="alert">Incorrect password</div> <?php
        }

      }

      else if($usertype=="student")
      {
        $query="select * from student where username='$username' and password='$password' ";
        $result=$connect->query($query);
        $rows=mysqli_num_rows($result);
        if($row==1)
        {
          header('Location:../profile.html');
        }
        else {
          echo '<div class="alert alert-warning" role="alert">Incorrect password</div>';
        }
      }
      else if($usertype=="staff")
      {
          $query="select * from staff where username='$username' and password='$password' ";
          $result=$connect->query($query);
          $row=mysqli_num_rows($result);
          if($row==1)
          {
            header('location:../staff.php');
          }
          else {
            echo '<div class="alert alert-warning" role="alert">Incorrect password</div>';
          }
      }

    else{
      die("Oops! Either your username or password is incorrect");
    }
  }
  else{
    die("All fields are required");
  }
}
?>
<div class="tab-content">

  <div class="tab-pane active fade in">
    <div class="col-md-4"></div>
  <div class="col-md-4">
  <form id="form1" class="form-horizontal" role="form" action="resources/test.php" method="POST">
    <h3 style="text-align:center">Login Page</h3>
    <div class="form-group">
      <label for="checkbox" class="col-md-12 form-label">User type</label>
      <div class="col-md-12">
        <select name="usertype" id="checkbox" class="form-control">
      <option type="checkbox" value="admin">Admin</option>
      <option type="checkbox" value="staff">Staff Member</option>
      <option type="checkbox" value="student">Student</option>
    </select>
      </div>
    </div>
    <div class="form-group">
      <label for="username" class="col-md-12 form-label">Enter your username</label>
      <div class="col-md-12">
        <input id="username" class="form-control" type="text" name="username" required>
      </div>
    </div>
      <div class="form-group">
        <label for="password" class="col-md-12 form-label">Enter your password</label>
        <div class="col-md-12">
          <input id="password" class="form-control" type="password" name="password" required>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-12">
          <button style="width:30%" class="btn btn-success center-block" type="submit" name="login">Login</button>
        </div>
      </div>
      <div class="form-group">
        <center><a href="register.php">New Student ?</a></center>
      </div>

      </form>
  </div>
<div class="col-md-4"></div>
</div>

</div>





</body>
</html>
