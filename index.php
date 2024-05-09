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
	background: white;
}
#form{
margin-top: 30%;
margin-bottom: 30%;
}
#form1{
border-radius: 15px;
width:100%;
border: 3px solid black;
padding-top:20px;
padding-left:20px;
padding-right:20px;
padding-bottom: 20px;
}
a
{
	color: green;
}
a:hover{
	color: blue;
	text-decoration: none;
}

</style>
</head>

<body>
<?php
session_start();
if(isset($_POST['login'])){

  if(!empty($_POST['username']) && !empty($_POST['password'])){
    $usertype=$_POST['usertype'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    require "resources/connect.php";
    if($connect->connect_error)
    {
    die("Connection failed:".$connect->connect_error);
    }

    if($usertype=="admin")
      {
				$query="select id from admin where email='$username' and password='$password' ";
        $result=$connect->query($query);
        $rows=mysqli_num_rows($result);
        if($rows==1)
        {

					while ($id=mysqli_fetch_row($result)) {
						$_SESSION['admin']=$id[0];
					};
        header('Location: admin/admin.php');
			}
        else {
            $temp=1;
        }

      }

      else if($usertype=="student")
      {
        $query="select student_id from student where student_id='$username' and password='$password' ";
        $result=$connect->query($query);
        $rows=mysqli_num_rows($result);
        if($rows==1)
        {

					while ($id=mysqli_fetch_row($result)) {
						$_SESSION['student']=$id[0];
					};
					header("location: student/profile.php");
        }
        else {
            $temp=1;
        }
      }
      else if($usertype=="staff")
      {
          $query="select * from staff where email_id='$username' and password='$password' ";
          $result=$connect->query($query);
          $rows=mysqli_num_rows($result);
          if($rows==1)
          {
						while ($id =mysqli_fetch_row($result)){
							$_SESSION['staff']=$id[0];
						}
            header('location: staff/staff.php');
          }
          else {
            $temp= 1;
          }
      }
  }
}
?>
<div class="tab-content">

  <div class="tab-pane active fade in">
    <div class="col-md-4"></div>
  <div class="col-md-4" >

	<div id="form">
		<?php
	if(@$temp==1)
	{
	echo '<div class= "alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
		Incorrect Username/Password
	</div>';
	}
	?>
  <form id="form1" class="form-horizontal" role="form" action="" method="POST">

    <h3 style="text-align:center"><b><font face="Times New Roman">USER LOGIN</font></b></h3>
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
          <button style="width:30%; border: 1px solid black" class="btn btn-primary center-block" type="submit" name="login">Login</button>
        </div>
      </div>
      <div class="form-group">
        <center><a href="register.php">New Student ?</a></center>
      </div>

      </form>
		</div>
  </div>
<div class="col-md-4"></div>
</div>

</div>





</body>
</html>
