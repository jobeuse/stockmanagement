<?php include('sessionlogin.php')?>
<?php include('header.php')?>
<?php include('conn.php')?>

<body>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-6">
			<div class="card mt-5">
				<div class="card-header">
					<h5>Continue</h5>
				</div>
				<div class="card-body"> 
					<?php 
					echo "<div class='alert alert-warning'><strong>Welcome,  Your Username is &nbsp;&nbsp;" .$_SESSION['login']. "</strong></div>"; ?>
				</div>
				<div class="card-footer bg-white">
					<div class="row">
						<div class="col-lg-6">
							<form method="POST" class="mt-1">
								<?php
								if (isset($_POST['cancel'])) { 
									session_destroy();
									header('location:login.php'); 
								}
								?>
								<button type="submit" name="cancel" class="btn btn-danger">Cancel login</button>
							</form>
						</div>
						<div class="col-lg-6">
							<a href="index.php" class="mt-1 btn btn-info">Continue login</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
