<?php
session_start();
if(!isset($_SESSION['student']))
{
  die("You are not logged in !");
}
  require "../head.html";
?>

  </head>
  <body style="padding-top: 70px; background: #282828;" class=" container-fluid">

    <nav class="navbar navbar-default navbar-fixed-top">
      <!--Logo-->
      <div class="navbar-header col-xs-12">
        <center><font color="black" size="5em"><a href="" class="navbar-brand">Library Automation System</a></font></center>
      </div>

    </nav>

    <!--main tab-content-->
        <div id="profile_menu" class="col-md-offset-1 col-xs-2">
            <div style="height:100%; padding-top: 10px;">
              <center><img style="border-radius: 100%; border: 5px solid white; " width="90%"  height="90%" src="../images/profile.jpg"></center>
            </div>
              <ul  class="nav">
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
        </div>

    <!-- profile -->
    <div class="tab-content">
    <div id="details" class="tab-pane active fade in">
      <div id="middle" class="col-md-offset-3 col-md-8">
        <h3><center>MY PROFILE</center></h3>
          <!-- academic -->
            <table class="table table-hover">
              <?php
              require "../resources/connect.php" ;
              $id=$_SESSION['student'];
              $query= "select * from student where student_id = '$id' ";
              $result = $connect->query($query);
              if($connect->connect_error)
              die("Server down please try again later");
              $rows= mysqli_num_rows($result);
              if($rows == 1)
              while($data=mysqli_fetch_row($result))
              {
                ?>
                <tr>
                  <td>Student ID</td>
                  <td><?php echo $data[4] ?></td>
                </tr>
                <tr>
                  <td>Name</td>
                  <td><?php echo $data[2] ?></td>
                </tr>
                <tr>
                  <td>Address</td>
                  <td><?php echo $data[3] ?></td>
                </tr>
                <tr>
                  <td>Roll No</td>
                  <td><?php echo $data[5] ?></td>
                </tr>
                <tr>
                  <td>Course</td>
                  <td><?php echo $data[7] ?></td>
                </tr>
                <tr>
                  <td>Semester</td>
                  <td><?php echo $data[8] ?></td>
                </tr>
                <tr>
                  <td>Gender</td>
                  <td><?php if($data[9] == 1)
                  echo "Male";
                  else if($data[9] == 2)
                  echo "Female";
                  else if($data[9] == 3)
                  echo "Third Gender"; ?></td>
                </tr>
                <tr>
                  <td>Email ID</td>
                  <td><?php echo $data[10] ?></td>
                </tr>
                <tr>
                  <td>Phone</td>
                  <td><?php echo $data[11] ?></td>
                </tr>
              <?php
            };
              ?>

            </table>
      </div>
    </div>

    <div id="issued" class="tab-pane fade in">
      <div id="middle" class="col-md-offset-3 col-md-8">
          <div class="table-responsive">
            <table style="background:#e1f5fe" class="table table-hover">
          <thead style="background:#303f9f; color:white;">
          <th>Book id</th><th>Book title</th><th>Issued date</th><th>Renew date</th><th>Return Date</th>
        </thead>
        <?php
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

      <div id="middle" class="col-md-offset-3 col-md-8">
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
      <div id="middle" class="col-md-offset-3 col-md-8">
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


  </body>
</html>
