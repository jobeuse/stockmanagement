<?php include('header.php')?>
<?php include('conn.php')?>

<body>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-6 mt-5">
			<div class="card">
				<div class="card-header">
					<h5>Recover</h5>
				</div>
				<div class="card-body"> 

					<?php  
							if (isset($_POST['recover'])) {
								$tel=$_POST['tel']; 

					   				$mysql=mysqli_query($conn,"SELECT * FROM login WHERE telephone ='$tel'");
											$result=mysqli_fetch_array($mysql);
						       					if ( $result['telephone']===$tel) {
						       						$username = $result['username'];
						       						session_start(); 
					            						 $_SESSION['tel']=$tel;//used to store user name
					            						 header('location:reset.php');
					              						 
																} 
												else{
												        echo "<div class='alert alert-danger alert-dismissable'>incorrect phone number</div> "; 
													} 
						        }



					?>
					<form class="row" method="POST">
						<div class="col-lg-12 mt-3">
							<input type="tel" name="tel" placeholder="ENter Telephone number" class="form-control">
						</div> 
						<div class="col-lg-12 mt-3">
							<button type="submit" name="recover" class="btn btn-primary btn-block">Search Account</button>
						</div> 
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>