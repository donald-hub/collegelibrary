<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../foundation/css/normalize.css">
<link rel="stylesheet" href="../foundation/css/foundation.css">
<script src="../foundation/js/vendor/modernizr.js"></script>
<link rel="stylesheet" href="style1.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../css/style.css">
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>



  <div class="off-canvas-wrap" data-offcanvas>

    <div class="inner-wrap">

      <!-- Toggle button -->

      <!-- Offcanvas menu -->
      <div class="offcanvas">
      <aside class="left-off-canvas-menu">
        <ul class="no-bullet">
          <li id="items" class="nav-item">
          <a style="color:black;" class="nav-link active" href="#details" data-toggle="tab"><center>My profile</center></a>
          </li>
          <li id="items" class="nav-item">
          <a style="color:black;" class="nav-link" href="#issued" data-toggle="tab"><center>Books issued</center></a>
          </li>
          <li id="items" class="nav-item">
          <a style="color:black;" class="nav-link" href="#update_password" data-toggle="tab"><center>Update Password</center></a>
          </li>
          <li id="items" class="nav-item">
          <a style="color:black;" class="nav-link" href="#fine" data-toggle="tab"><center>Calculate fine</center></a>
          </li>
          <li id="items" class="nav-item">
          <a style="color:black;" class="nav-link" href="#messages" data-target="#modal" data-toggle="modal"><center>Log Out</center></a>
          </li>
        </ul>
      </aside>
    </div>

    <div id="content">
<!-- navbar -->
<nav class="tab-bar" data-topbar role="navigation">
  <section class="tab-small">
    <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
  </section>
  <section class="middle tab-bar-section">
    <h1 class="title">Library Automation System</h1>
  </section>
</nav>
      <!-- Main content -->
      <div class="tab-content">
      <div id="details" class="tab-pane active fade in">
        <div id="middle" class="col-md-8" >
          <h3><center>MY PROFILE</center></h3>
          <ul class="nav nav-tabs nav-fill">
            <li role="presentation" class="active"><a href="#academic" data-toggle="tab">Academic details</a></li>
            <li role="presentation"><a href="#personal" data-toggle="tab">Personal details</a></li>
            <li role="presentation"><a href="#guardian" data-toggle="tab">Guardian Information</a></li>
          </ul>

          <div class="tab-content" >
            <!-- academic -->
            <div id="academic" class ="tab-pane active fade in">
              <table class="table table-hover">
                <tr>
                  <td>Student ID</td>
                  <td>BCA015</td>
                </tr>
                <tr>
                  <td>Student name</td>
                  <td>Donald Mahanta</td>
                </tr>
                <tr>
                  <td>Postal Address</td>
                  <td>District-Nagaon, Assam.</td>
                </tr>
                <tr>
                  <td>Department</td>
                  <td>Computer</td>
                </tr>
                <tr>
                  <td>Course</td>
                  <td>BCA</td>
                </tr>
                <tr>
                  <td>Semester</td>
                  <td>4th</td>
                </tr>
                <tr>
                  <td>Session</td>
                  <td>2017-2020</td>
                </tr>
                <tr>
                  <td>Gender</td>
                  <td>Male</td>
                </tr>
              </table>
            </div>
            <!-- personal -->
            <div id="personal" class="tab-pane fade">
              <table class="table table-hover">
                <tr>
                  <td>Postal Address</td>
                  <td>District-Nagaon, Assam.</td>
                </tr>
                <tr>
                  <td>Email ID</td>
                  <td>donaldmahanta@gmail.com</td>
                </tr>
                <tr>
                  <td>Contact</td>
                  <td>123456789</td>
                </tr>
              </table>
            </div>
            <div id="guardian" class="tab-pane fade">
              <table class="table table-hover">
                <tr>
                  <td>Guardian Name</td>
                  <td>Unknown</td>
                </tr>
                <tr>
                  <td>Email ID</td>
                  <td>donaldmahanta@gmail.com</td>
                </tr>
                <tr>
                  <td>Contact</td>
                  <td>123456789</td>
                </tr>
              </table>
            </div>

          </div>
        </div>

      </div>
      <div id="issued" class="tab-pane fade in">
        <div id="middle" class="col-md-8">
            <div class="table-responsive">
              <table style="background:#e1f5fe" class="table table-hover">
            <thead style="background:#303f9f; color:white;">
            <th>Book id</th><th>Book title</th><th>Issued date</th><th>Renew date</th><th>Return Date</th>
          </thead>
          <?php
            $id=$_SESSION['student'];
            require "../resources/connect.php" ;
            $query="select book,issue_date,renew_date,return_date from books_issued where student='$id' ";
            $result=$connect->query($query);
            if($connect->connect_error)
            die("Server down please come later some time.");
            while ($data=mysqli_fetch_row($result)) {
              $book_id=$data[0];
              $date1=$data[1];
              $issued_date=strtotime($date1);
              $date2=$data[2];
              $renew_date=strtotime($date2);
              $date3=$data[3];
              $return_date=strtotime($date3);
              $query2 = "select title from book where serial = '$book_id'";
              $result=$connect->query($query2);
              while($data2 = mysqli_fetch_row($result))
              $title= $data2[0];
              echo '<tr><td>'.$book_id.'</td><td>'.$title.'</td><td>'.date('j F Y', $issued_date).'</td><td>'.date('j F Y', $renew_date).'</td><td>'.date('j F Y',$return_date).'</td></tr>';
            }
          ?>
    </table>
        </div>
        </div>
      </div>

      <!--Update student password -->
      <div id="update_password" class="tab-pane fade in">

        <div id="middle" class="col-md-8">
          <?php
          if(isset($_POST['old']) && isset($_POST['new']) && isset($_POST['confirm']))
          {
            if(!empty($_POST['old']) && !empty($_POST['new'])&& !empty($_POST['confirm']))
            {
              $old=$_POST['old'];
              $new1=$_POST['new'];
              $new2=$_POST['confirm'];
              if($new1==$new2)
              {
              require "../resources/connect.php" ;
              $query1="UPDATE student SET password='$new1' WHERE id='$id'";
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
          }
          ?>
          <div id="student_password">
            <center><h3>Update Password</h3></center>
            <form class="form-horizontal" role="form" method="post" action="">
                <div class="form-group">

                    <div class="col-md-offset-3 col-md-6">
                      <input type="password" class="form-control" name="old" id="old" placeholder="Current Password" required></input>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-offset-3 col-md-6">
                      <input type="password" class="form-control" name="new" id="new1" placeholder="New Password" required></input>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-offset-3 col-md-6">
                      <input type="password" class="form-control" name="confirm" id="new2" placeholder="Re-enter new password" required></input>
                    </div>
                  </div>

                  <div class="form-group" >
                    <center><button type="submit" name="update" class="btn btn-primary" >Update</button>
                    <button type="reset" name="reset" class="btn btn-info" >Reset</button></center>
                  </div>
            </form>
  </div>
        </div>
      </div>


      <!--calculate fine of each student-->
      <div id="fine" class="tab-pane fade in">
        <div id="middle" class="col-md-8">
          <?php
          $query="select book,return_date from books_issued where student='$id' ";
          $result=$connect->query($query);
          if($connect->connect_error)
          die("Server down please come later some time.");
          while ($data=mysqli_fetch_row($result)) {
            $book_id=$data[0];
            $date1=$data[1];
            $return_date=strtotime($date1);
            $query2 = "select title from book where serial = '$book_id'";
            $result=$connect->query($query2);
            while($data2 = mysqli_fetch_row($result))
            $title= $data2[0];
            $today = strtotime(date('Y-m-d'));
            $diff = ($today-$return_date)/60/60/24;
            if($diff < 0)
            {
              echo "The return date is: $date1";
            }
            else echo "The calculated fine for this book is: $diff";
          }

          ?>
        </div>
      </div>
    </div>




    <!-- Logout -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <?php require "../resources/logout.php"; ?>
    </div><!-- /.modal -->


      <!-- Exit overlay -->
      <a class="exit-off-canvas"></a>
    </div>
    </div>

  </div>
     <script src="../foundation/js/vendor/jquery.js"></script>
     <script src="../foundation/js/foundation/foundation.min.js"></script>
     <script>
     $(document).foundation({
  offcanvas : {
      open_method: 'overlap'
  }
});
     </script>

</body>
</html>
