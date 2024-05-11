<?php
if(isset($_POST['addmember']))
{
  $fname=$_POST['fname'];
  $mname=$_POST['mname'];
  $lname=$_POST['lname'];
  $address=$_POST['address'];
  $contact=$_POST['contact'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $c_password=$_POST['c_password'];
  if($password==$c_password)
  {
    require "../resources/connect.php" ;
    if($connect->connect_error)
    {
      die("connection failed:".$connect->connect_error);
    }
    $check=" select email_id from staff where email_id='$email' ";
    if($connect->query($check))
    {
      $existence=$connect->query($check);
      $no = mysqli_num_rows($existence);
      if($no >= 1)
      {

        echo '<div class= "container alert alert-warning">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        This email already has an account
        </div>';

      }
      else {
        echo "working";
        $query=" insert into staff(fname,mname,lname,address,contact,email_id,password)values('$fname','$mname','$lname','$address','$contact','$email','$password') ";
          if($connect->query($query)==TRUE)
          {
            echo '<div class= "container alert alert-info">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
              New Member added successfully
            </div>';
          }
          else{
            echo "Error: " . $query. "<br>" . $connect->error;
          }
      }
    }

}
else{
  echo '<div class= "alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    Passwords don\'t match
  </div>';

}
}
?>
<div class="col-xs-1"></div>
<div class="col-xs-10" id="addmember">
<form id="form2" style="padding-bottom: 20px; " class="form-horizontal" role="form" action="" method="post">
    <div><center><h3 id="label"> &nbsp; Add new member</h3></center></div>
  <div class="form-group">
    <label for="fname" class="col-md-3 control-label">First Name</label>
    <div class="col-md-9">
      <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
    </div>
  </div>
  <div class="form-group">
    <label for="mname" class="col-md-3 control-label">Middle Name</label>
    <div class="col-md-9">
      <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name">
    </div>

  </div>
  <div class="form-group">
    <label for="lname" class="col-md-3 control-label">Last Name</label>
    <div class="col-md-9">
      <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
    </div>
  </div>
  <div class="form-group">
    <label for="address" class="col-md-3 control-label">Address</label>
    <div class="col-md-9">
      <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Contact" class="col-md-3 control-label">Mobile No</label>
    <div class="col-md-9">
      <input type="text" class="form-control" id="Contact" name="contact" placeholder="Enter Contact No" required>
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-md-3 control-label">Email ID</label>
    <div class="col-md-9">
      <input type="email" class="form-control" id="email" name="email" placeholder="Email ID" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Password" class="col-md-3 control-label">Password</label>
    <div class="col-md-9">
      <input type="password" class="form-control" name="password" id="Password" placeholder="Enter Password" required>
    </div>
  </div>
  <div class="form-group">
    <label for="c_password" class="col-md-3 control-label">Confirm Password</label>
    <div class="col-md-9">
      <input type="password" class="form-control" id="c_password" name="c_password" placeholder="Confirm Password" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-12">
      <button type="submit" class="btn btn-success center-block" name="addmember">Add member</button>
    </div>
  </div>
</form>
</div>
<div class="col-xs-1"></div>
