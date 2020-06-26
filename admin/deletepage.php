<?php
include '../lib/session.php';

   Session::checkSession();

?>

<?php
include '../config/config.php';
include '../lib/database.php';

?>

<?php 
$db=new Database();
?>

<?php
if (!isset($_GET['deletepage']) || $_GET['deletepage']==NULL) {
  header("location:index.php");
  }else{
    $pageid=$_GET['deletepage'];
    
    $delquery="delete from tbl_pages where id='$pageid'";
    $delpage=$db->delete($delquery);
    if ($delpage) {
    	echo "<script>alert('Page Deleted Successfully')</script>";
    	header("location:index.php");
    }else{
    	echo "<script>alert('Page Not Deleted !!')</script>";
    	header("location:index.php");
    }
  }



?>