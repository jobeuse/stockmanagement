<?php include('header.php')?>
<?php include('conn.php')?>
<?php include('sessionlogin.php')?>
<body> 
	<div class="row justify-content-center"> 
		<div class="col-lg-4 mt-5">
			<form method="POST" class="card">
				<div class="card-header">
					<h5>Logout</h5> 
				</div>
				<div class="card-body">
					<div class="col-lg-12 mt-3">
						Are you sure you want to logout ?
					</div> 
				</div>
				<div class="card-footer">
					<div class="col-lg-12 ">
						<div class="d-flex flex-row">
							<div class="flex-fill"> 
									<form method="POST" class="mt-1">
								    <?php
								    if (isset($_POST['cancel'])) { 
								      session_destroy();
								      header('location:login.php'); 
								    }
								    ?> 
								    <button type="submit" name="cancel" class="btn btn-sm btn-danger">Logout</button>
								  </form>

							</div>
							<div class="flex-fill">
								<a href="index.php" class="btn btn-sm btn-primary">Cancel Process</a>
							</div>
						
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>


</body>
</html>