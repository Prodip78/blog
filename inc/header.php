

<?php
include 'config/config.php';
include 'lib/database.php';
include 'helpers/formate.php';

?>
<?php 
$db=new Database();
$ft=new Formate();
?>


<!DOCTYPE html>
<html>
<head>
	<title><?php echo TITLE;?></title>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>


<body>
	<div class="headersection templete clear">
		<a href="index.php">
			<div class="logo">

<?php
$query="select * from title_slogan where id='1'";
$db_title=$db->select($query);
if ($db_title) {
    while ($result=$db_title->fetch_assoc()) {
?>

				<img src="admin/<?php echo $result['logo']?>"/>
				<h2><?php echo $result['title']?></h2>
				<p><?php echo $result['slogan']?></p>
			</div>
		<?php } } ?>
		</a>

<div class="social clear">
<div class="icon clear">
<?php
$query="select * from tbl_social where id='1'";
$social_media=$db->select($query);
if ($social_media) {
    while ($result=$social_media->fetch_assoc()) {
?>
				

				<a href="<?php echo $result['fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $result['tw'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $result['ln'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $result['gp'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
		<?php } }?>



			 <div class="floatleft icon clear">
                        <ul class="inline-ul floatleft">
                            


                    <?php
                    
                        if (isset($_GET['action']) && $_GET['action'] =="logout" ) {
                          session::destroy();
                        }


                        ?>


                            </li>
                            <li><a href="logout.php?action=logout">Logout</a></li>
                        </ul>
                    </div>

			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
	
<div class="navsection templete">
	<ul>
		<li><a id="active"  href="index.php">Home</a></li>
 <?php
$query="select * from tbl_pages";
$pages=$db->select($query);
if ($pages) {
    while ($result=$pages->fetch_assoc()) {
?>
                                                           
        <li><a href="page.php?pageid=<?php echo $result['id'];?>"><?php echo $result['name'];?></a> </li>
 <?php } }?> 	
		<li><a href="contact.php">Contact</a></li>
		<li><a href="register.php">Registration</a></li>
	</ul>
</div>
