<!-- issued books website -->
<div>
  <?php

    require "../resources/connect.php" ;
    if($connect->connect_error)
    {
      die("connection failed:".$connect->connect_error);
    }
    $query=" select * from books_issued ";
      if($connect->query($query))
      {
        $result=$connect->query($query);
        $rows=mysqli_num_rows($result);
        if($rows == '0')
        {
          echo "<center><font color=\"white\"><h3>0 results found</h3></font></center>";
        }
        else{
          echo '
        <div class="container table-responsive">
          <table id="table" class="table table-hover"><tr>
            <thead style="background:#282828; color:white;">
              <th>Serial</th>
              <th>Student ID</th>
              <th>Student Name</th>
              <th>Department</th>
              <th>Book ID</th>
              <th>Book Name</th>
</tr>
            </thead>
        ';
        $count = 1;
          while($rows=mysqli_fetch_row($result))
          {
            $student="select name,course from student where student_id='$rows[1]'";
            $res=$connect->query($student);
            while($student_details=mysqli_fetch_row($res))
            {
            echo '<tr><td style="background: lightblue">'.$count.'</td><td style="background: lightblue">'.$rows[1].'</td><td style="background: lightblue">'.$student_details[0].'</td><td style="background: lightblue">'.$student_details[1] ;
            }
            $book="select serial,title from book where serial='$rows[2]'";
            $res2=$connect->query($book);
            while($book_details=mysqli_fetch_row($res2))
            {
              echo '</td><td style="background:gold">'.$book_details[0].'</td><td style="background:gold">'.$book_details[1].'</td></tr>';
            }
            $count++;
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
