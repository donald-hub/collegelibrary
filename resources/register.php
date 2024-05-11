<?php
  require "connect.php" ;
  if($connect->connect_error)
  {
    die("connection failed:".$connect->connect_error);
  }
  if(isset($_POST['register']))
  {
    $first=$_POST['fname'];
    $middle=$_POST['mname'];
    $last=$_POST['lname'];
    $id=$_POST['studentid'];
    $department=$_POST['dept'];
    $rollno=$_POST['roll'];
    $phone=$_POST["phone"];
    $sql="insert into student(first, middle, last, id, department, roll, phone)values('$first', '$middle' '$last','$id','$department','$phone')";
    if($connect->query($sql)==true)
    {
      echo "Registeration successful";
    }
    else{
      echo "Error: " . $sql. "<br>" . $connect->error;
    }
  }
?>
