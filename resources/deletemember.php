<?php
require "connect.php";
if(isset($_POST['delete']))
{
  $delete_id=$_POST['delete'];
  $delete_query = " DELETE from staff where id='$delete_id'";
  if ($connect->query($delete_query)==false)
  echo '<div class= "alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    Some Problem occured. Please try later.
  </div>';
  echo "<script>location.href='../admin/admin.php?#deletemember'</script>";
}
?>
