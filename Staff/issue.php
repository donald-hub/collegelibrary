<!-- issue book for students -->
<?php require "../head.html"; ?>
<body>
<?php
require '../resources/connect.php';
session_start();
$issuedate = date('Y-m-d') ;
$renewdate = date('Y-m-d' , strtotime('+2 week' ));
$returndate = date('Y-m-d' , strtotime('+4 week' ));



if(isset($_POST['confirmissue']))
{
  $student_id = $_POST['confirmissue'];
  $serial= $_POST['serial'];
  $query = "select title, author, serial, issueable, edition, volume from book where serial ='$serial'";
  if($connect->query($query))
  {
    $result=$connect->query($query);
    $rows = mysqli_num_rows($result);
    if($rows == 0)
    echo '<div class= "alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        Invalid book ID
        </div>';
      else {
        while($data=mysqli_fetch_row($result))
        {
          $issueable = $data[3];
          if($issueable == 'no');
        }
      }

  }

  require "../resources/connect.php" ;
  if($connect->connect_error)
  die("Connection Problem");
  $q = "insert into books_issued(student,book,issue_date,renew_date,return_date)
      values('$student_id','$serial', '$issuedate', '$renewdate', '$returndate' );";
  if($connect->query($q)==true)
  {
    echo '<div class= "alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        Book issued successfully.
        </div>';
  }
  else {
    echo $connect->error;
  }


}

?>

</body>
</html>
