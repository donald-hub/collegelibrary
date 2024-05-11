<div class="col-md-12">
  <?php
    require "../resources/connect.php" ;
    if($connect->connect_error)
    {
      die("connection failed:".$connect->connect_error);
    }
    $query=" select id, fname, mname, lname, address, contact, email_id from staff ";
      if($connect->query($query))
      {
        $result=$connect->query($query);
        $rows=mysqli_num_rows($result);
        if($rows!=0){
          echo '
          <div class="container table-responsive">
            <table id="table" class="table table-hover ">
              <thead style="background:#282828; color:white;">
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Delete</th>
              </thead>
          ';
            while($rows=mysqli_fetch_row($result))
            {
              echo '<tr><td>'.$rows[0].'</td><td>'.$rows[1].' '.$rows[2].' '.$rows[3].'</td><td>'.$rows[4].'</td><td>'.$rows[5].'</td><td>'.$rows[6].'</td><td>'.
                '<form action="../resources/deletemember.php" method="POST"><button class="btn btn-default" type="submit" name="delete" value="'.$rows[0].'"><font color="red"><span class="glyphicon glyphicon-remove"></span></font></button></form>
              </td></tr>';
            }
          echo '</table></div><br/>';
        }
        else
        {
        echo "<h3 align='center' style='color:white'>No Staff Member</h3>";
        }
      }
      else{
        echo "Error: " .$query. "<br>" . $connect->error;
      }
    $connect->close();
  ?>
</div>
