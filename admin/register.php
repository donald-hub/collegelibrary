<div>
  <?php

    require "../resources/connect.php" ;
    if($connect->connect_error)
    {
      die("connection failed:".$connect->connect_error);
    }
    $query=" select * from student where status='waiting' ";
      if($connect->query($query))
      {
        $result=$connect->query($query);
        $rows=mysqli_num_rows($result);
        if($rows==0)
        {
          echo "<h3>Sorry! No new students registered</h3>";
        }
        else{
          echo '<div class="container table-responsive">
          <table id="table" class="table table-hover">
            <thead style="background:#282828; color:white;">
              <th>Id</th>
              <th>Status</th>
              <th>Name</th>
              <th>Student ID</th>
              <th>Department</th>
              <th>Roll No</th>
              <th>Phone</th>
              <th>Approve</th>
            </thead>
        ';
          while($rows=mysqli_fetch_row($result))
          {

            echo '<tr><td>'.$rows[0].'</td><td>'.$rows[1].'</td><td>'.$rows[2].' '.$rows[3].' '.$rows[4].'</td><td>'.$rows[5].'</td><td>'.$rows[7].'</td><td>'.$rows[8].'</td><td>'.$rows[9].'</td><td>
            <a style="text-decoration:none;" href="#"><font color="green"><span class="glyphicon glyphicon-ok"></span></font></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#"  style="text-decoration:none;"><font color="red"><span class="glyphicon glyphicon-remove"></span></font></a>
            </td></tr>';
          }
        }
        echo '</table></div><br/>';
      }



    else{
      echo "Error: " . $sql. "<br>" . $connect->error;
    }
    $connect->close();
  ?>
</div>
