<div class="container">
<?php
require "connect.php";
  if(isset($_GET['submit']))
  {
    $booktrack= $_GET['submit'];
    $title=$_GET['title'];
    $author=$_GET['author'];
    $category=$_GET['category'];
    $serial=$_GET['serial'];
    $isbn=$_GET['isbn'];
    $price=$_GET['price'];
    $issueable=$_GET['issueable'];
    $publyear=$_GET['publyear'];
    $edition=$_GET['edition'];
    $volume=$_GET['volume'];

    $query= "Update book set title='$title', author='$author', category='$category',serial='$serial', isbn='$isbn', price='$price',
    issueable='$issueable', publyear='$publyear', edition='$edition', volume='$volume' where serial = '$booktrack'";

    $connect->query($query);
    if($connect->connect_error)
    {
      setcookie('temp','0', time()+ 1000 );
      setcookie('query',$query, time()+ 1000 );
      setcookie('error',$connect->error, time()+ 1000 );
    }
    else
    {
      setcookie('temp','1', time()+ 1000 );
    }
    header("location: ../staff/staff.php?#edit");
    $connect->close();

  }
?>
</div>
