<?php
  if(isset($_GET['logout']))
  {
    $filename= basename($_SERVER['PHP_SELF']);
     if($filename=='admin.php')
      unset($_SESSION['admin']);
    else if($filename=='profile.php')
      unset($_SESSION['student']);
    else if($filename=='staff.php')
      unset($_SESSION['staff']);
      echo "<script> location.href='../index.php'</script>";
  }
?>
<div class=" modal-dialog modal-dialog-centered modal-sm">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
      </button>
      <h4 style="text-align: center;" class="modal-title" id="myModalLabel">
        Log Out
      </h4>
    </div>
    <div class="modal-body">
      <h3>Are you sure?</h3>
    </div>
    <div class="modal-footer"><form action="" method="get">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel
      </button>
      <button type="submit" name="logout" class="btn btn-primary">
      Log Out
      </button>

    </form>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
