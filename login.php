<?php include('header.php')?>
<?php include('conn.php')?>

<body>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-6 mt-5">
			<div class="card">
				<div class="card-header">
					<h5>Login</h5>
				</div>
				<div class="card-body">

					<?php 
						$conn=mysqli_connect("localhost","root","","smsystem");
							if (isset($_POST['login'])) {
								$user_name=$_POST['username'];
								$password=$_POST['password'];
								if (empty($user_name and $password)) {
									echo "<div class='alert alert-danger alert-dismissable'>Error: Fill all Fields</div> "; 
								}else{

					   				$mysql=mysqli_query($conn,"SELECT * FROM login");
											$result=mysqli_fetch_array($mysql);
						       					if ( $result['username']===$user_name  and $result['password']===$password) {
						       						session_start(); 
					            						 $_SESSION['login']=$user_name;//used to store user name
					            						 header('location:index.php');
					              						 
																} 
												elseif($result['password']!=$password){
												        echo "<div class='alert alert-danger alert-dismissable'>incorrect password </div> "; 
													} 
													elseif( $result['username']!=$user_name) {
														echo "<div class='alert alert-danger alert-dismissable'>incorrect Username </div> ";
													}
												}
						        }



					?>

					<form class="row" method="POST">
						<div class="col-lg-12 mt-3">
							<input type="text" name="username" placeholder="User name" class="form-control" autocomplete autofocus>
						</div>
						<div class="col-lg-12 mt-3">
							<input type="password" name="password" placeholder="ENter password" class="form-control">
						</div>
						<div class="col-lg-12 mt-3">
							<button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
						</div>
						<div class="col-lg-6 mt-2">
							<a href="recover.php" class="link text-danger text-decoration-none">Forgot Password</a>
						</div>
						<div class="col-lg-4 mt-2">
							<a href="createaccount.php" class="text-primary text-decoration-none">Create Account</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>