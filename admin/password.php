<?php  @session_start(); ?>
<div id="form3" class="col-md-offset-3 col-md-6">
  <?php
  $admin_id = $_SESSION['admin'];
  if(isset($_POST['old']) && isset($_POST['new']) && isset($_POST['confirm']))
  {
      $old=$_POST['old'];
      $new1=$_POST['new'];
      $new2=$_POST['confirm'];
      if($new1==$new2)
      {
      require "../resources/connect.php" ;
      $query1="UPDATE admin SET password='$new1' WHERE id='$admin_id'";
      $connect->query($query1);
      if($connect->connect_error)
      die("Operation failed, Please try after some time.");
      else
      echo '<div class= "alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
        Password updated sucessfully
      </div>';
      }
      else {
        echo '<div class= "alert alert-info">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          Passwords don\'t match . Please try again.
        </div>';
      }
  }

  ?>
    <div id="go" style="border: 10px solid white;">
    <form class="form-horizontal" role="form" action="" method="post">
      <div><center><h3 id="label"> &nbsp; Update Admin Password</h3></center></div>
    <div class="form-group">
      <label for="old" class="col-md-4 control-label">Enter Current Password</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="old" name="old" placeholder="Current Password" required>
      </div>
    </div>
    <div class="form-group">
      <label for="new" class="col-md-4 control-label">Enter New Password</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="new" name="new" placeholder="New Password">
      </div>
    </div>
    <div class="form-group">
      <label for="confirm" class="col-md-4 control-label">Confirm New Password</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="confirm" name="confirm" placeholder="Confirm New Password">
      </div>
    </div>
    <div class="col-md-12">
        <button style="width:20%;" type="submit" class="btn btn-primary center-block">Update</button>
    </div><br/><br/>
  </form>
  </div>
</div>
