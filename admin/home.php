<div class="container">
<?php
  require "../resources/connect.php" ;

  if($connect->connect_error)
  {
    die("Connection failed:".$connect->connect_error);
  }
?>
  <div class='row' style="padding: 50px">
    <div  class="col-sm-4 box" style="background-color:#adadad; margin-left:8%; height: 200px; width: 200px; ">
          <h1 style="color: black">Total Books<br>
              <div class="a">
             <?php
             $query=" select * from book ";
               if($connect->query($query))
               {
                 $result=$connect->query($query);
                 $rows=mysqli_num_rows($result);

                   echo $rows;
              }
           ?>
         </div>
      </div>
      <div class="col-sm-4 box" style="background-color:#adadad; margin-left:2%; height: 200px; width: 200px; ">
          <h1 style="color: black">Books Available<br>
              <div class="a">
           <?php
           $query=" select * from book where issueable ='available' ";
             if($connect->query($query))
             {
               $result=$connect->query($query);
               $rows=mysqli_num_rows($result);

                 echo $rows;
            }
           ?>
              </div>
      </div>
      <div class="col-sm-4 box" style="background-color:#adadad; margin-left:2%; height: 200px; width: 200px; ">
          <h1 style="color: black">Total Students<br>
              <div class="a">
           <?php
           $query=" select * from student ";
             if($connect->query($query))
             {
               $result=$connect->query($query);
               $rows=mysqli_num_rows($result);

                 echo $rows;
            }
           ?>
              </div>
      </div>
      <div class="col-sm-4 box" style="background-color:#adadad; margin-left:2%; height: 200px; width: 200px; ">
              <h1 style="color: black;">Books Issued<br>
                  <div class="a">
           <?php
           $query=" select * from books_issued ";
             if($connect->query($query))
             {
               $result=$connect->query($query);
               $rows=mysqli_num_rows($result);

                 echo $rows;
            }
           ?>
                  </div>
      </div>
  </div>


  <form class="form-horizontal" role="form" action="#home" method="GET">
    <div class="form-group">
      <label for="searchbar" class="col-md-12 form-label"><font color="white">Enter Book name</font></label>
      <div class="col-md-11">
        <input class="form-control" type="text" name="search" placeholder="Search...">
      </div>
    <div class="col-md-1">
      <button class="btn btn-primary" type="submit" name="submit">Search</button>
    </div>
  </div>
    <div id=style style="background: transaparent; margin-top: 50px;" class="col-md-12">
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

          $sql2="select * from book where title like '%{$search}%'";
          $res=$connect->query($sql2);
          $rows=mysqli_num_rows($res);
          echo '<center><h3 style="color:white; background: #282828;"><b>'.$rows.' Results found</b></h3></center><br/>';
          ?>
          <table class="table table-hover" width="100%" style="background:white; text-align:center">
            <?php if($rows!='0'){
          echo '<thead style="background:  #282828; color: white;">
          <th>title</th><th>author</th><th>category</th><th>serial</th><th>isbn</th><th>price</th><th>issueable</th><th>publyear</th><th>edition</th><th>volume</th>
        </thead>';
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

                    $connect->close();
      }

      echo '</table><br/>';
      ?>
</div>


  </form>
</div>
