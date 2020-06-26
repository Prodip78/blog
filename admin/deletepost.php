<?php
include '../lib/session.php';

   Session::checkSession();

?>

<?php
include '../config/config.php';
include '../lib/database.php';
include '../helpers/formate.php';
?>

<?php 
$db=new Database();
?>

<?php
if (!isset($_GET['deletepostid']) || $_GET['deletepostid']==NULL) {
  header("location:postlist.php");
  }else{
    $postid=$_GET['deletepostid'];
    
    $query="SELECT * FROM tbl_post WHERE id='$postid'";
    $getpost=$db->select($query);
    if ($getpost) {
    	while ($delimg=$getpost->fetch_assoc()) {
    		$dellink=$delimg['image'];
    		unlink($dellink);
    	}
    }
    $delquery="delete from tbl_post where id='$postid'";
    $delpost=$db->delete($delquery);
    if ($delpost) {
    	echo "<script>alert('Data Deleted Successfully')</script>";
    	header("location:postlist.php");
    }else{
    	echo "<script>alert('Data Not Deleted !!')</script>";
    	header("location:postlist.php");
    }
  }



?>