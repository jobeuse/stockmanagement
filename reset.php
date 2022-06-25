<?php
session_start();
?>
<?php include('header.php')?>
<?php include('conn.php')?>

<body>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-6 mt-5">
			<div class="card">
				<div class="card-header">
					<h5>Reset Password</h5>
				</div>
				<div class="card-body"> 
					<?php 
					echo "<div class='alert alert-info'>User with this number  &nbsp;&nbsp;<strong>".$_SESSION['tel']."</strong> found </div>";
					$tel=$_SESSION['tel'];

					$mysql=mysqli_query($conn,"SELECT * FROM login WHERE telephone ='$tel'");
						$result=mysqli_fetch_array($mysql); 

						if (isset($_POST['create'])) {
								$user_name=$_POST['username'];
								$date=date('is');
								$full_username=$user_name.$date;
								$password=$_POST['password'];
								$tel=$_POST['tel'];

								if ($password!='') { 
								
								$update=mysqli_query($conn,"UPDATE login SET password='$password', telephone='$tel' WHERE telephone=$tel")or die('error');
								if ($update) {
									header('location:login.php');
								}
								else{
									 echo "<div class='alert alert-danger alert-dismissable'>Password Reset Error</div> ";
								}
							}
							else{
								 echo "<div class='alert alert-danger alert-dismissable'>Password field is empty</div> ";
							}
							}

					?>


					<form class="row" method="POST">
						<div class="col-lg-12 mt-3">
							<input type="text" name="username" value="<?php echo$result['username']?>" class="form-control" readonly>
						</div>
						<div class="col-lg-12 mt-3">
							<input type="tel" name="tel"  value="<?php echo$result['telephone']?>" class="form-control" readonly>
						</div>

						<div class="col-lg-12 mt-3">
							<p class="text-danger"><strong>Reset Password Now</strong></p>
							<input type="password" name="password" placeholder="new  password" class="form-control">
						</div>

						<div class="col-lg-12 mt-3">
							<button type="submit" name="create" class="btn btn-primary btn-block">Change Account</button>
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