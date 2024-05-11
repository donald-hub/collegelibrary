<?php require "../head.html"; ?>
<style type="text/css">
body{
  background: url("../images/image3.jpeg");
  background-size: cover;
}
.footer a{
  text-decoration: none;
}
.footer a:hover{
  color: black;
}


</style>
</head>
<body class="body container-fluid" style="min-height: 100%;">
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
      <div class="collapse navbar-collapse navbar-right" position="fixed" id="mainNavbar">
        <ul class="nav navbar-nav">
            <li><a href="#home" data-toggle="tab" >Home</a></li>
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
          <li><a href="#issued" data-toggle="tab">Issued books</a></li>
          <li><a href="#search" data-toggle="tab">Search book</a></li>
          <li><a href="#logout" data-toggle="modal">Log Out</a></li>

          </ul>
      </div>
    </div>
  </nav>
  <div class="tab-content">
    <!-- home -->
    <div  id="home" class="row tab-pane fade in active">
      <div class="col-md-12">
        <?php require "home.php"; ?>
      </div>
    </div>



<!-- add new book -->
<div id="addnew" class="row tab-pane fade in">
  <div class="col-md 12">
  <?php require "addnew.php"; ?>
</div>
</div>

<!-- edit book -->
<div id="edit" class="row tab-pane fade in">
  <div class="col-md 12">
  <?php require "edit.php"; ?>
</div>
</div>



<!-- list of books issued today -->
<div id="issued" class="row tab-pane fade in">
<div class="col-md-12">
  <?php require "../admin/issued.php"; ?>
</div>
</div>

<!-- search book details -->
<div id="search" class="row tab-pane fade in">
  <div class="col-md-12">
  <?php require "search.php"; ?>
</div>
</div>


<!-- Logout -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <?php require "../resources/logout.php"; ?>
</div><!-- /.modal -->

</div>  <!--close div of tab-content -->
<div class="row navbar-sticky-bottom">
<footer class="footer" style="background: #ecf0f1;">
<div class="container" style="padding-left: 0;">
<div class="row">
  <div class="col-md-4">
  <div class="wrapper" style="padding: 1em 2em; text-align: center;">
  <h1><font face="Niagara Engraved Regular" ><strong>Library Automation System</strong></font></h1>
  </div>
  </div>
<div class="col-md-4">
<div class="wrapper" style="text-align: center; padding: 1em 2em;">
<h3><strong>Quick Links</strong></h3>
<ul class="list-unstyled">
<li><a href="#">Home</a></li>
<li><a href="#">Portfolio</a></li>
<li><a href="#">About</a></li>
<li><a href="#">Partners</a></li>
</ul>
</div>
</div>
<div class="col-md-4">
<div class="wrapper" style="text-align: center; padding: 1em 2em;">
<h3><strong>Follow Us:</strong></h3>
<ul class="list-unstyled">
<li><a href="#">Facebook</a></li>
<li><a href="#">Twitter</a></li>
<li><a href="#">Instagram</a></li>
<li><a href="#">Youtube</a></li>
</ul>
</div>
</div>
</div>
<div class="row" style="text-align: center; padding: 1em; margin: 1em 0;">
All Rights Reserved Â©. Web Code Geeks 2015.
</div>
</div>
</footer>
</div>

</body>
</html>
