<?php
session_start();
if(!isset($_SESSION['staff']))die("Please Log in");
$staff_id = $_SESSION['staff'];
require "../resources/connect.php";
$query= "select fname, mname, lname from staff where id= '$staff_id' ";
$result= $connect->query($query);
while($data=mysqli_fetch_row($result))
{
  $fname= $data[0];
  $mname= $data[1];
  $lname= $data[2];
$name= strtoupper($fname).' '.strtoupper($mname).' '.strtoupper($lname);
}
?>
<div class="container">
  <div class= "well well-md" style="background: #6699cc;">
    <div class="col-md-6" ><h4><?php echo $name; ?></h4></div>
    <div class="col-md-6" ><h4 style="text-align:right;">Current Date: <?php echo date('d-m-Y');?></h4></div>
      <h1 style="text-align:center; color:white;"><strong>View Student Profile</strong></h1>
      <form class="form-horizontal" role="form" action="" method="post">
      <div  class="input-group col-md-offset-3 col-md-6">
        <input class="form-control" placeholder="Enter Student ID" name="srch-term" id="srch-term" type="text">
        <div class="input-group-btn">
          <button class="btn btn-default" type="Submit" name='srch'><i class="glyphicon glyphicon-search"></i></button>
      </div>
      </div>
      </form>
    </div>


<?php
if(isset($_POST['srch']))
{
if(!empty($_POST['srch-term']))
{

  require "../resources/connect.php" ;
  if($connect->connect_error)
  {
    die("connection failed:".$connect->connect_error);
  }
  if(isset($_POST['srch-term']))
  {
    $search=$_POST["srch-term"];

    $sql2="select * from student where student_id='$search'";
    $res=$connect->query($sql2);
    $rows=mysqli_num_rows($res);
    if($rows=='0')
    {
      echo '<center><h2 style="background: white;">Invalid Student ID<br/></h2></center>';
    }
   else if($rows=='1'){
    ?>
    <br/>
    <div class="well well-md">
      <table id="table" class="table  table-hover">
        <caption style="background: turquoise;"><h3 class="text-center" >Student Details</h3></caption>
    <tr>
      <td rowspan="7" width="25%"><img src="../images/profile.jpg" height="250px"></td>
      <th width="35%">FULL NAME</th>
      <?php
      while($row=mysqli_fetch_row($res))
      {
        $name=$row[2].' '.$row[3].' '.$row[4];
      echo '<td width="40%">'.$name.'</td>';
      ?>

    </tr>
    <tr>
      <th>STATUS</th>
      <?php
      $status=$row[1];
      echo '<td>'.$status.'</td>';
       ?>
    </tr>
    <tr>
      <th>STUDENT ID</th>
      <?php
        $student_id=$row[5];
      echo '<td>'.$student_id.'</td>';

     ?>
    </tr>
    <tr>
      <th>DEPARTMENT</th>
      <?php
        $department=$row[7];
       echo '<td>'.$department.'</td>';

     ?>
    </tr>
    <tr>
      <th>ROLL NO</th>
      <?php
        $roll=$row[8];
       echo '<td>'.$roll.'</td>';

    ?>
    </tr>
    <tr>
      <th>PHONE</th>
      <?php
        $phone=$row[9];
       echo '<td>'.$phone.'</td>';
      ?>
    </tr>
    <tr>
      <th>FINE</th>
    <?php
      $fine=$row[10];
    echo '<td>'.$fine.'</td>';
  }
      echo '</table></div>';
      ?>
      <div class="well well-md">
        <table id="table" class="table table-hover">
          <caption style="background: pink;"><h3 class="text-center">Books Issued</h3></caption>
          <?php
          require "../resources/connect.php" ;
          if($connect->connect_error)
          {
            die("connection failed:".$connect->connect_error);
          }
          $query=" select book,renew_date,return_date,issue_date from books_issued where student = '$search'";
            if($connect->query($query))
            {
              $result=$connect->query($query);
              $row = mysqli_num_rows($result);
              $number=1;
                while($rows=mysqli_fetch_row($result))
                {
                  $date1=$rows[3];
                  $issue_date=strtotime($date1);
                  $date2=$rows[1];
                  $renew_date=strtotime($date2);
                  $date3=$rows[2];
                  $return_date=strtotime($date3);
                  $student="select title, serial from book where serial='$rows[0]'";
                  $res=$connect->query($student);
                  while($student_details=mysqli_fetch_row($res))
                  {
                  echo '<tr><th rowspan=5>'.$number.'</th><td><b>Serial No</b> - '.$student_details[1].'</td><td rowspan=2></td><td rowspan=2></td></tr><tr><td><b>Book Title</b> - '.$student_details[0].'</td></tr><tr><td><b>Issued date</b> - '.date('j F Y', $issue_date).
                  '</td><td align=center><button type="submit" class="btn btn-success">Renew book</button></td><td align=center><button type="submit" class="btn btn-info">Return book</button></td></tr><tr><td><b>Renew date</b>- '.date('j F Y', $renew_date).
                  '</td><td rowspan=2></td><td rowspan=2></td></tr><tr><td><b>Return date</b>- '.date('j F Y', $return_date).'</td>
                  </tr>';

                  }
                  $number++;
                }


            }



          else{
            echo "Error: " . $sql. "<br>" . $connect->error;
          }


 ?>
        </table>

          <button type="submit" name="issuerequest" class="btn btn-primary center-block" data-toggle="modal" data-dismiss="modal" data-target="#popUpWindow">Issue New book</button>
          <div class="modal fade" id="popUpWindow">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!--header-->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">Issue Book</h2>
                            </div>
                            <!--body (form)-->
                            <div class="modal-body">
                            <form role="form" action="issue.php" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="serial" class="form-control" placeholder="Enter Book ID">
                                    </div>
                            </div>
                            <!--button-->
                            <div class="modal-footer">
                                <button data-toggle="modal" type="submit" value="<?php echo $search; ?>" class="btn btn-primary btn-block" name="confirmissue">Issue</button>
                            </div>
				                    </form>
                        </div>
                    </div>
          </div>
      </div><br/>
      <?php
}

}
$connect->close();
}
}
?>
</div>
