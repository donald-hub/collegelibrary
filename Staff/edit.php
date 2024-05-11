<div class="container">
  <form class="form-horizontal" role="form" action="" method="GET">
    <div class="form-group">
      <label for="searchbar" class="col-xs-12 form-label"><font style="color: white;">Enter Book ID</font></label>
      <div class="col-xs-11">
        <input class="form-control" type="text" name="search" placeholder="Search...">
      </div>
    <div class="col-xs-1">
      <button class="btn btn-primary" type="submit" name="submit">Search</button>
    </div>
  </div>
  </form>
  <?php
  if(!empty($_GET['search']))
  {

    require "../resources/connect.php" ;
    if($connect->connect_error)
    {
      die("connection failed:".$connect->connect_error);
    }
    if(isset($_GET['search']))
    {
      $search=$_GET["search"];

      $sql2="select * from book where serial = '$search'";
      $res=$connect->query($sql2);
      $rows=mysqli_num_rows($res);
      ?>
        <?php if($rows=='1'){
    }
      while($row=mysqli_fetch_row($res))
      {
        $title=$row[0];
        $author=$row[1];
        $category=$row[2];
        $serial=$row[3];
        $isbn=$row[4];
        $price=$row[5];
        $issueable=$row[6];
        $publyear=$row[7];
        $edition=$row[8];
        $volume=$row[9];
        ?>
        <div style="background:white" class="col-md-offset-3 col-md-6 col-xs-12">


        <h3 align="center">Edit book details</h3>
        
        <form action="../resources/updatebook.php" method="GET">
          <label for="title" class="control-label">Title</label><br><input class="form-control" type="text" id="title" name="title" required value="<?php echo $title; ?>"><br>
          <label for="author" class="control-label">Author</label><br><input class="form-control" type="text" id="author" name="author" required value="<?php echo $author; ?>"><br>
          <label for="category" class="control-label">Category</label><br><input class="form-control" type="text" id="category" name="category" required value="<?php echo $category; ?>"><br>
          <label for="serial" class="control-label">Serial</label><br><input class="form-control" type="text" id="serial" name="serial" required value="<?php echo $serial; ?>"><br>
          <label for="isbn" class="control-label">Isbn</label><br><input class="form-control" type="text" id="isbn" name="isbn" required value="<?php echo $isbn; ?>"><br>
          <label for="price" class="control-label">Price</label><br><input class="form-control" type="text" id="price" name="price" required value="<?php echo $price; ?>"><br>
          <label for="issueable" class="control-label">Issueable</label><br><input class="form-control" type="text" id="issueable" name="issueable" required value="<?php echo $issueable; ?>"><br>
          <label for="publyear" class="control-label">Publyear</label><br><input class="form-control" type="text" id="publyear" name="publyear" required value="<?php echo $publyear; ?>"><br>
          <label for="volume" class="control-label">Volume</label><br><input class="form-control" type="text" id="volume" name="volume" required value="<?php echo $volume; ?>"><br>
          <label for="edition" class="control-label">Edition</label><br><input class="form-control" type="text" id="edition" name="edition" required value="<?php echo $edition; ?>"><br>
          <center><input class="btn btn-secondary" type="reset" value="Reset">
          <button type="submit" class="btn btn-primary" name="submit" value="<?php echo $search; ?>">Update</button></center>
          <br><br></form></div><?php
      }
    }

          $connect->close();
  }

  if(isset($_COOKIE['temp'])){

    $temp=$_COOKIE['temp'];
    if($temp == 0)
    {
      echo '<br><div class= "alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        Error: '.$_COOKIE['query'].'<br>'.$_COOKIE['error'].'
        </div>';
      setcookie('temp','0',time() - 1000);
      setcookie('query',$connect,time() - 1000);
      setcookie('error',$error,time() - 1000);
    }
    else if($temp == 1)
    {
      echo '<br><div class= "alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        Book details updated successfully
        </div>';
      @setcookie('temp','1',time()- 1000 );
    }
  }
  ?>

</div>
