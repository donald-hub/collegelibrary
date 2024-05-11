<?php
require "connect.php" ;
if($connect->connect_error)
{
  die("connection failed:".$connect->connect_error);
}
if(isset($_GET['search']))
{
  $search=$_GET["search"];

  $sql2="select * from book where title like '%{$search}%'";
  $res=$connect->query($sql2);
  $rows=mysqli_num_rows($res);
  echo $rows.' results found<br/>';
  ?>
  <table border=1px width="100%" style="text-align:center">
    <?php if($rows!='0'){
  echo '<tr bgcolor="">
  <th>title</th><th>author</th><th>category</th><th>serial</th><th>isbn</th><th>price</th><th>issueable</th><th>publyear</th><th>edition</th><th>volume</th>
</tr>';
}
  while($row=mysqli_fetch_row($res))
  {
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
    echo '<tr><td>'.$title.'</td><td>'.$author.'</td><td>'.$category.'</td><td>'.$serial.'</td><td>'.$isbn.'</td><td>'.$price.'</td><td>'.$issueabe.'</td><td>'.$publyear.'</td><td>'.$edition.'</td><td>'.$volume.'</tr>';
  }
}
?>
