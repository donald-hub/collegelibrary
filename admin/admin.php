<?php
require  "../head.html" ;
 ?>
<style type="text/css">
body{
  background: url("../images/admin.jpeg");
  background-size: cover;
}
</style>
<style>
.box {
  transition: box-shadow .3s;
  border-radius:100px;
  text-align:center;
  border: 1px solid #ccc;
 background-image: linear-gradient(to top, lightblue , white);
}
.box:hover {
  box-shadow: 0px 5px 5px white;

}
div.a {
    font-size: 2em;
}

    </style>
</head>
<body class="body container-fluid">
  <nav class="navbar navbar-default navbar-fixed-top">
    <!--Logo-->
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" >Library Automation system</a>
      </div>
      <!-- Menu items -->
      <div class="collapse navbar-collapse navbar-right" position="fixed " id="mainNavbar">
        <ul class="nav navbar-nav" id="myTab">
          <li><a href="#home" data-toggle="tab">Home</a></li>
          <li><a href="#register" data-toggle="tab">Registered Students</a></li>
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
            <!-- dropdown -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Settings
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#addstaff" data-toggle="tab">Add new staff member</a></li>
                <li><a href="#deletemember" data-toggle="tab">Delete staff member</a></li>
                <li><a href="#password" data-toggle="tab">Update Password</a></li>
                <li><a href="#logout" data-toggle="modal">Log Out</a></li>
              </ul>
            </li>

          </ul>
      </div>
    </div>
  </nav>
  <div class="tab-content">



    <!--home and search -->
    <div id="home" class="tab-pane fade in active" >
        <?php require "home.php"; ?>
    </div>


    <!-- register website -->
    <div id="register" class="tab-pane fade" >
      <?php
       require "register.php";
      ?>
    </div>


    <!--add new -->
    <div id="addnew" class="tab-pane fade " >
        <?php
          require "../staff/addnew.php";
        ?>
    </div>


    <!-- issued books website -->
    <div id="issued" class="tab-pane fade" >
      <?php require "issued.php"; ?>
    </div>


    <!-- add staff member -->
    <div id="addstaff" class="tab-pane fade" >
      <?php require "addstaff.php"; ?>
    </div>


    <!-- edit staff member -->
    <div id="edit" class="tab-pane fade" >
      <?php require "../staff/edit.php"; ?>
    </div>


    <!-- delete staff member -->
    <div id="deletemember" class="tab-pane fade" >
      <?php
        require "deletemember.php";
      ?>
    </div>


  <div id="password" class="tab-pane fade">
    <?php require "password.php"; ?>
  </div>

  <!-- Logout -->
  <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <?php require "../resources/logout.php"; ?>
  </div><!-- /.modal -->


    </div> <!-- closing div of tab-content -->


    </body>
    </html>
