<?php
include 'inc/header.php';

?>
<?php 
$db=new Database();
$fm=new Formate();
?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>User Registration</h2>

				<?php
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			

			$name=$fm->validation($_POST['name']);
			$username=$fm->validation($_POST['username']);
			$email=$fm->validation($_POST['email']);
			$password=$fm->validation(md5($_POST['password']));

			$name=mysqli_real_escape_string($db->link,$name);
			$username=mysqli_real_escape_string($db->link,$username);
			$email=mysqli_real_escape_string($db->link,$email);
			$password=mysqli_real_escape_string($db->link,$password);
			$sql="INSERT INTO register VALUES('','$name','$username','$email','$password')";
			$query=$db->insert($sql);

			// if ($result !=false) {
			// 	$value=mysqli_fetch_array($result);
			// 	$row  =mysqli_num_rows($result);
			// 	if ($row>0) {
			// 		Session::set("login",true);
			// 		Session::set("email",$value['email']);
			// 		Session::set("userId",$value['userId']);
			// 		header("location:index.php");
			// 	}else{
			// 		echo "<span style='color:red;font-size:18px;'>No Result Found !!</span>";

			// 	}

			// }else{
			// 	echo "<span style='color:red;font-size:18px;'>Username Or Password Not Matched !!</span>";

			// }

		}

		?>
				
			<form action="" method="post">
				<div class="form-group">
				
				<label for="name">Your Name</label>
				<input type="text" id="name" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="username">User Name</label>
				<input type="text" id="username" name="username" class="form-control">
			</div>
			<div class="form-group">
				<label for="email">Email Address</label>
				<input type="text" id="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" class="form-control">
			</div>
			
			<button type="submit" name="register" class="btn btn-primary">Submit</button>				
 </div>

</div>

<?php include 'inc/footer.php';?>

	