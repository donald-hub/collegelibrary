
<div class="col-md-1">
</div>
<div id="go" class="col-md-10">
  <?php
  require "../resources/connect.php" ;
  if($connect->connect_error)
  {
    die("Connection failed:".$connect->connect_error);
  }

  if(isset($_GET['addbook']))
  {
      $title=$_GET['title'];
      $author=$_GET['author'];
      $category=$_GET['depart'];
      $serial=$_GET['serial'];
      $isbn=$_GET['isbn'];
      $price=$_GET['price'];
      $issueable=$_GET['issueable'];
      $publyear=$_GET['publication'];
      $edition=$_GET['edition'];
      $volume=$_GET['volume'];


    $sql="insert into book(title, author, category, serial, isbn, price, issueable, publyear, edition, volume) values('$title','$author','$category','$serial','$isbn','$price','$issueable','$publyear','$edition','$volume')";
    if($connect->query($sql))
  {
    echo '<br><div class= "alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      Book inserted successfully
      </div>';
  }
  else{
    $query = "select * from book where serial = '$serial'";
    $result=$connect->query($query);
    $rows=mysqli_num_rows($result);
    if($rows>=1)
    {
      echo '<br><div class= "alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        A book with this serial number already exists. Please check the serial no again
        </div>';

    }
    else{
      echo '<br><div class= "alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        Error: '.$sql.'<br>'.$connect->error.'
        </div>';
    }
  }
  $connect->close();
}
?>
  <form id="form2" class="form-horizontal" role="form" action="#addnew" method="get">
  <div><center><h3 id="label"> &nbsp; ADD NEW BOOK</h3></center></div>
  <div class="form-group">
    <label class="col-md-3 control-label" for="title">Book Title</label>
    <div class="col-md-9">
    <input class="form-control" id="title" type="text" name="title" required></input>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-3 control-label" for="author">Author Name</label>
    <div class="col-md-9">
      <input class="form-control" id="author" type="text" name="author" required></input>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-3 control-label" for="depart">Book Category</label>
    <div class="col-md-9">
      <select class="form-control" id="depart" name="depart" required>
    	    <option type="checkbox" value="Computer science">Computer science</option>
          <option type="checkbox" value="Physics">Physics</option>
          <option type="checkbox" value="Chemistry">Chemistry</option>
          <option type="checkbox" value="Literature">Literature</option>
          <option type="checkbox" value="Mathematics">Mathematics</option>
          <option type="checkbox" value="Science">Science</option>
          <option type="checkbox" value="Commerce">Commerce</option>
          <option type="checkbox" value="Philosophy">Philosophy</option>
          <option type="checkbox" value="Others">Other</option>
    	</select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-3 control-label" for="serial">Serial No</label>
    <div class="col-md-9">
      <input class="form-control" id="serial" type="text" name="serial" required></input>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-3 control-label" for="isbn">ISBN No</label>
    <div class="col-md-9">
      <input class="form-control" id="isbn" type="text" name="isbn" required></input>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-3 control-label" for="price">Price</label>
    <div class="col-md-9">
      <input class="form-control" id="price" type="text" name="price" required></input>
    </div>
  </div>
  <div class="form-group">
    <label for="issueable" class="col-md-3 control-label">Issueable</label>
  <div class="col-md-9">
  <select id="issueable" name="issueable" class="form-control" required>
      <option type="checkbox" value="yes">Yes</option>
      <option type="checkbox" value="no">No</option>
  </select>
    </div>
  </div>
  <div class="form-group">
  <label class="col-md-3 control-label" for="publication">Publication Year</label>
    <div class="col-md-9">
      <input class="form-control" id="publication" type="text" name="publication" required></input>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-3 control-label" for="edition">Edition</label>
      <div class="col-md-9">
      <select class="form-control" id="edition" name="edition" required>
        <option type="checkbox" value="first">First</option>
        <option type="checkbox" value="second">Second</option>
        <option type="checkbox" value="third">Third</option>
        <option type="checkbox" value="fourth">Fourth</option>
        <option type="checkbox" value="fifth">Fifth</option>
        <option type="checkbox" value="sixth">Sixth</option>
        <option type="checkbox" value="seventh">Seventh</option>
        <option type="checkbox" value="eighth">Eighth</option>
        <option type="checkbox" value="ninth">Ninth</option>
        <option type="checkbox" value="tenth">Tenth</option>
      </select>
      </div>
  </div>
  <div class="form-group">
  <label class="col-md-3 control-label" for="volume">Volume</label>
    <div class="col-md-9">
      <select id="volume" class="form-control" name="volume" required>
  	    <option type="checkbox" value="i">i</option>
        <option type="checkbox" value="ii">ii</option>
        <option type="checkbox" value="iii">iii</option>
        <option type="checkbox" value="iv">iv</option>
        <option type="checkbox" value="v">v</option>
        <option type="checkbox" value="vi">vi</option>
        <option type="checkbox" value="vii">vii</option>
        <option type="checkbox" value="viii">viii</option>
        <option type="checkbox" value="ix">ix</option>
        <option type="checkbox" value="x">x</option>
  	  </select>
    </div>
  </div>
  <div class="form-group">
  <div class=" col-md-12">
    <button class="btn btn-success center-block" type="submit" name="addbook">Add Book</button>
  </div>
</div>
  </form>
</div>
<div class="col-md-1">

</div>
