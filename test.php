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
				<?php
				if (isset($_POST['login'])) {
					$user=$_POST['username'];
					echo $user;
				}


				?>
				<div class="card-body">
					<form class="row" method="POST">
						<div class="col-lg-12 mt-3">
							<input type="text" name="username" placeholder="User name" class="form-control">
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