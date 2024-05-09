<!DOCTYPE html>
<html lang="en">
<head>
  <title>Library Management system</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="bootstrap/js/bootstrap.js"></script>
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
<style type="text/css">
body{
  background: url("images/image3.jpeg");
  background-size: cover;
}
#go{
  background: white;
  margin-top:200px;
  margin-bottom: 200px;
}

</style>
</head>
<body class="body container-fluid">
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <!--Logo-->
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="" class="navbar-brand">Library Automation system</a>
      </div>
      <!-- Menu items -->
      <div class="collapse navbar-collapse" position="fixed" id="mainNavbar">
        <ul class="nav navbar-nav">
          <!-- dropdown -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Add/Edit books
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#addnew" data-toggle="tab">Add new Book</a></li>
              <li><a href="#edit" data-toggle="tab">Edit Book</a></li>
            </ul>
          </li>
          <li><a href="#" data-toggle="tab">Issued books</a></li>
          <li><a href="#search" data-toggle="tab">Search book</a></li>

            <!-- dropdown -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Orders
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#">Issue Book</a></li>
                <li><a href="#">Re-new Book</a></li>
                <li><a href="#">Return Book</a></li>
              </ul>
            </li>

          </ul>
      </div>
    </div>
  </nav>
  <div class="tab-content">
    <!-- home -->
    <div id="home" class="tab-pane active fade in">

</div>



<!-- add new book -->
<div id="addnew" class="tab-pane fade">
<div class="col-md-3">
</div>
<div id="go"  class="col-md-6">
  <form class="form-horizontal" role="form" action="" method="GET">
  <div style="text-align:center;">
  <h3>Add new book</h3>
  </div>
  <div class="form-group">
    <label class="col-md-3 control-label" for="title">Book_Title</label>
    <div class="col-md-9">
    <input class="form-control" id="title" type="text" name="title" required></input>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-3 control-label" for="author">Author_Name</label>
    <div class="col-md-9">
      <input class="form-control" id="author" type="text" name="author" required></input>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-3 control-label" for="depart">Book_Category</label>
    <div class="col-md-9">
      <input class="form-control" id="depart" type="text" name="depart" required></input>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-4 control-label" for="serial">Serial_No</label>
    <div class="col-md-3">
      <input class="form-control" id="serial" type="text" name="serial" required></input>
    </div>
    <label class="col-md-2 control-label" for="isbn">ISBN_No</label>
    <div class="col-md-3">
      <input class="form-control" id="isbn" type="text" name="isbn" required></input>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-4 control-label" for="price">Price</label>
    <div class="col-md-3">
      <input class="form-control" id="price" type="text" name="price" required></input>
    </div>
    <label for="issueable" class="col-md-2 control-label">Issueable</label>
	<div class="col-md-3">
	<select id="issueable" class="form-control" name="issueable"  required>
	  <option type="checkbox" value="available">Yes</option>
      <option type="checkbox" value="issued">No</option>
	</select>

    </div>
  </div>
  <div class="form-group">
  <label class="col-md-3 control-label" for="publication">Publication Year</label>
    <div class="col-md-2">
      <input class="form-control" id="publication" type="text" name="publication" required></input>
    </div>
	<label class="col-md-1 control-label" for="edition">Edition</label>
    <div class="col-md-3">
      <input class="form-control" id="edition" type="text" name="edition" required></input>
    </div>
  <label class="col-md-1 control-label" for="volume">Volume</label>
    <div class="col-md-2">
      <input class="form-control" id="volume" type="text" name="volume" required></input>
    </div>
  </div>
  <div class="col-md-12">
  <div class="form-group">
    <button style="width:100%;" class="btn btn-success" type="submit" name="addbook">Add Book</button>
  </div>
</div>

<div>
  <?php

    $connect = new mysqli("localhost","","","collegelibrary");
    if($connect->connect_error)
    {
      die("connection failed:".$connect->connect_error);
    }
    if(isset($_GET['addbook']))
    {
        $title=$_GET['title'];
        $author=$_GET['author'];
        $category=$_GET['category'];
        $serial=$_GET['serial'];
        $isbn=$_GET['isbn'];
        $price=$_GET['price'];
        $issueabe=$_GET['issueable'];
        $publyear=$_GET['publyear'];
        $edition=$_GET['edition'];
        $volume=$_GET['volume'];

      $sql="insert into book(title,author,category,serial,isbn,price,issueable,publyear,edition,edition,volume) values('$title','$author','$category','$serial','$isbn','$price','$issueable','$publyear','$edition','$volume')";
      if($connect->query($sql)==true)
    {
      echo "New record created successfully";
    }
    else{
      echo "Error: " . $sql. "<br>" . $connect->error;
    }
    $connect->close();
  }
  ?>
</div>




  </form>
</div>
<div class="col-md-3">

</div>

</div>


<!-- search book details -->
<div id="search" class="tab-pane fade in">
  <div id="booksearch">
    <form class="form-horizontal" role="form" action="verification.php" method="get">
      <h3 style="text-align:center;">Book search</h3>
      <div class="form-group">
        <div class="col-md-1">
          &nbsp;
        </div>
        <div class="col-md-3">
          <input class="form-control" id="bookname" type="text" name="name" placeholder="Book title">
        </div>
        <div class="col-md-3">
          <input class="form-control" id="isbn" type="text" name="isbn" placeholder="ISBN no.">
        </div>
        <div class="col-md-3">
          <input class="form-control" id="serialno" type="text" name="serialno" placeholder="Serial no.">
        </div>
        <div class="col-md-2">
          <button class="btn btn-success" type="button" name="button">SEARCH</button>
        </div>
      </div>
      <small><i>Please fill atleast one of the credentials</i></small>
    </form>
  </div>


</div>


</div>

</body>
</html>
