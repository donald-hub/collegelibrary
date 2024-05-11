<div id="booksearch">
  <form class="form-horizontal" role="form" action="" method="get">
    <h3 style="text-align:center;">Book search</h3>
    <div class="form-group">
      <div class="col-md-1">
        &nbsp;
      </div>
      <div class="col-md-3">
        <input class="form-control" id="bookname" type="text" name="title" placeholder="Book title">
      </div>
      <div class="col-md-3">
        <input class="form-control" id="isbn" type="text" name="isbn" placeholder="ISBN no.">
      </div>
      <div class="col-md-3">
        <input class="form-control" id="serialno" type="text" name="serialno" placeholder="Serial no.">
      </div>
      <div class="col-md-2">
        <button class="btn btn-success" type="submit" name="button">SEARCH</button>
      </div>
    </div>
    <small><i>Please fill atleast one of the credentials</i></small>
  </form>
</div>
<?php
if(!empty($_GET['title']) || !empty($_GET['isbn']) || !empty($_GET['serialno']))
{
  require "../resources/connect.php" ;
  if($connect->connect_error)
  {
    die("connection failed:".$connect->connect_error);
  }
  if(isset($_GET['title']) || isset($_GET['isbn']) || isset($_GET['serialno']))
  {
    $title=$_GET["title"];
    $isbn=$_GET["isbn"];
    $serialno=$_GET["serialno"];
      if($title=="" && $isbn=="")
      {
        $sql2="select * from book where serial='$serialno' ";
      }
      else if($title=="" && $serialno=="")
      {
        $sql2="select * from book where isbn='$isbn' ";
      }
      else if($title=="")
      {
        $sql2="select * from book where serial='$serialno' and isbn='$isbn' ";
      }
      else if($isbn=="" && $serialno=="")
      {
        $sql2="select * from book where title like '%{$title}%' ";
      }
      else if($isbn== "" )
      {
        $sql2="select * from book where title like '%{$title}%' and serial='$serialno' ";
      }
      else if($serialno=="" )
      {
        $sql2="select * from book where title like '%{$title}%' and isbn='$isbn' ";
      }
    $res=$connect->query($sql2);
    $rows=mysqli_num_rows($res);
    echo '<center><h2 style="background: white;">'.$rows.' results found<br/></h2></center>';

    if($rows!='0')
    {
      echo '
      <center><h3 style="color: white;"><b>RESULTS</b></h3></center>
      <table id="table" class="table  table-hover table-bordered">
        <thead style="background:#282828; color: white;"><th>SERIAL NO.</th><th>TITLE</th><th>AUTHOR</th><th>CATEGORY</th><th>SERIAL</th><th>ISBN</th><th>PRICE</th><th>ISSUEABLE</th><th>PUBLYEAR</th><th>EDITION</th><th>VOLUME</th></thead>';
  }

      $sl=0;
    while($row=mysqli_fetch_row($res))
    {
      $sl=$sl + 1;
      $title=$row[0];
      $author=$row[1];
      $category=$row[2];
      $serial=$row[3];
      $isbn=$row[4];
      $price=$row[5];
      $issueabe=$row[6];
      $publyear=$row[7];
      $edition=$row[8];
      $volume=$row[9];
      echo '<tr><td>'.$sl.'</td><td>'.$title.'</td><td>'.$author.'</td><td>'.$category.'</td><td>'.$serial.'</td><td>'.$isbn.'</td><td>'.$price.'</td><td>'.$issueabe.'</td><td>'.$publyear.'</td><td>'.$edition.'</td><td>'.$volume.'</tr>';
    }
  }
  else
  die("Please Insert a value.");
  echo '</table><br/>';

              $connect->close();
}

?>
