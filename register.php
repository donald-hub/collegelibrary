<?php
if(isset($_POST['register']))
{
  $name=$_POST['name'];
  $address=$_POST['address'];
  $student_id=$_POST['studentid'];
  $roll_no=$_POST['Rollno'];
  $c_type=$_POST['c_type'];
  $course=$_POST['course'];
  $semester=$_POST['semester'];
  $gender=$_POST['gender'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];
  $pass=$_POST['password'];
  $c_pass=$_POST['confirm_password'];
  $temp=0;
if($pass==$c_pass){
  $connect=new mysqli("localhost","root","","collegelibrary");
  if($connect->connect_error){
    die("Connection failed ".$connect->connect_error);
  }
  $query1="select * from student where student_id='$student_id'";
  if($connect->query($query1))
  {
    $result=$connect->query($query1);
    $rows=mysqli_num_rows($result);
    if($rows>=1)
    {
      $temp=2;
    }
  else{
    $query2="insert into
    student( status, name, address, student_id, roll_no, c_type, course, semester, gender, email_id, phone, password)
    values( 'waiting', '$name', '$address', '$student_id', '$roll_no', '$c_type', '$course', '$semester', '$gender' , '$email', '$contact', '$pass')";
    if($connect->query($query2))
    {
      $temp=1;
    }
    else{
      $temp=0;
    }
  }

}
}
}
 ?>






<!doctype html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="bootstrap/js/bootstrap.js"></script>
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body class="container" style=" min-height: 100vh;">

<br/><?php
if(isset($_POST['register'])){
  if(@$temp == 1)
  {?>
    <div class="container alert alert-info">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
      Your form has been submitted successfully
    </div>
<?php  }
else if(@$temp==2)
{?>
  <div class="container alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  User already exists
  </div>
<?php  }
else if(@$temp == 0)
{?>
  <div class="container alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    Something went wrong. Please try again.
  </div>
<?php  }
}
  ?>
<div class="col-md-offset-1 col-md-10" id="section" >
  <!-- register website -->
    <form class="form-horizontal" action="" method="post">
      <center><h3 id="label"> &nbsp; Student Registration</h3></center>
      <div class="form-group">
      <label class="col-sm-2 control-label" for="name">Full Name</label>
      <div class="col-sm-10">
      <input class="form-control" id="name" type="text" name="name" required>
      </div>
      </div>
      <div class="form-group">
      <label class="col-sm-2 control-label" for="address">Address</label>
      <div class="col-sm-10">
      <input class="form-control" id="address" type="text" name="address" required>
      </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="studentid">Student ID</label>
          <div class="col-sm-4">
        <input class="form-control" id="studentid" type="text" name="studentid" required>
          </div>
          <label class="col-sm-2 control-label" for="Rollno">Roll no</label>
          <div class="col-sm-4">
            <input class="form-control" id="Rollno" type="number" min="1" name="Rollno" required>
          </div>

      </div>
  <div class="form-group">

    <label class="col-sm-2 control-label" for="c_type">Course Type</label>
      <div class="col-sm-4">
        <select class="form-control" id="c_type" type="radio" name="c_type" required>
          <option selected="selected" value="0">-- Select Degree Type --</option>
          <option value="1">Under Graduate (UG)</option>
          <option value="2">Post Graduate (PG)</option>
          <option value="3">UG Diploma</option>
          <option value="4">PG Diploma</option>
          <option value="5">Integrated Course</option>
        </select>
      </div>

    <label class="col-sm-2 control-label" for="course">Course</label>
      <div class="col-sm-4">
        <select class="form-control" id="course" type="radio" name="course" required>
          <option selected="selected" value="0">-- Select Degree --</option>
            <option value="BCA">BCA</option>
          	<option value="BBA">BBA</option>
          	<option value="BSc">BSc</option>
          	<option value="B-Tech">B-Tech</option>
          	<option value="BCom">BCom</option>
          	<option value="BVoc">BVoc</option>
          	<option value="BA">BA</option>
          	<option value="MA">MA</option>

        </select>
      </div>


  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="semester">Semester</label>
      <div class="col-sm-4">
        <select class="form-control" id="semester" type="radio" name="semester" required>
          <option selected="selected" value="0">-- Select Semester --</option>
          <option value="1">First Semester</option>
          <option value="2">Second Semester</option>
          <option value="3">Third Semester</option>
          <option value="4">Fourth Semester</option>
          <option value="5">Fifth Semester</option>
          <option value="6">Sixth Semester</option>

        </select>
      </div>
      <label class="col-sm-2 control-label" for="gender">Gender</label>
      <div class="col-sm-4">
        <select class="form-control" id="gender" type="radio" name="gender" required>
          <option selected="selected" value="0">-- Select Gender --</option>
          <option value="1">Male(M)</option>
          <option value="2">Female(F)</option>
          <option value="3">Third Gender(TG)</option>
        </select>
      </div>


  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="email">Email ID</label>
      <div class="col-sm-4">
        <input class="form-control" id="email" type="email" name="email" required>
      </div>
    <label class="col-sm-2 control-label" for="contact">Mobile no</label>
      <div class="col-sm-4">
        <input class="form-control" id="contact" type="tel" name="contact" required>
      </div>
  </div>
    <div class="form-group">
  <label class="col-sm-2 control-label" for="password">Create Password</label>
    <div class="col-sm-4">
      <input class="form-control" id="password" type="password" name="password" required>
    </div>
  <label class="col-sm-2 control-label" for="confirm_password">Confirm Password</label>
    <div class="col-sm-4">
      <input class="form-control" id="confirm_password" type="password" name="confirm_password" required>
    </div>
  </div>
  <div class="form-group">
      <div class=" col-sm-offset-3 col-sm-9 ">
        <button class="btn btn-primary " style="float:right; " type="submit" name="register">Register</button>
      </div></div>
      </form>
</div>
</body>
</html>
