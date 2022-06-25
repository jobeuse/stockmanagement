<?php include('header.php')?>
<?php include('conn.php')?>

<?php
session_start(); 

// if(!isset($_SESSION['keys'])){
// 	header('location:keys.php');
// }
?>

<body>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-6 mt-5">
			<div class="card">
				<div class="card-header">
					<h5>Create account</h5>
				</div>
				<div class="card-body"> 
					<?php  
							if (isset($_POST['create'])) {
								$user_name=$_POST['username'];
								$date=date('is');
								$full_username=$user_name.$date;
								$password=$_POST['password'];
								$tel=$_POST['tel'];
								$paleng=strlen($password);
					   				$select=mysqli_query($conn, "SELECT * FROM login");
					   				if($select){
					   						$fetched=mysqli_fetch_array($select);
					   					}

						       				if ($user_name!='' and $password!='' and $tel!='') {
						       						if ($paleng < 4) {
						       							echo "<div class='alert alert-danger'>Atleast five Characters for password</div>";
						       						}else{

						       						if ($user_name !=$fetched['username'] ) { 
					   										$mysql=mysqli_query($conn,"INSERT into login values('','$full_username','$password','$tel','0')")or die('error');

						            								session_start(); 
							            						 $_SESSION['login']=$full_username;//used to store user name
							            						 header('location:continue.php');
							              						 
							              						 
															} 
															else{
																echo "<div class='alert alert-danger'>user_name exist </div>";

															}
																} 
													}
												else{
												        echo "<div class='alert alert-danger'>empty space found</div> "; 
													} 
						        }



					?>



					<form class="row" method="POST">
						<div class="col-lg-12 mt-3">
							<input type="text" name="username" placeholder="User name" class="form-control">
						</div>
						<div class="col-lg-12 mt-3">
							<input type="password" name="password" placeholder="ENter password" class="form-control">
						</div>
						<div class="col-lg-12 mt-3">
							<input type="tel" name="tel" placeholder="ENter telphone" class="form-control">
						</div>
						<div class="col-lg-12 mt-3">
							<button type="submit" name="create" class="btn btn-primary btn-block">Create Account</button>
						</div>
						<div class="col-lg-6">
							<a href="login.php" class="link text-primary text-decoration-none">Have an account</a>
						</div> 
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>