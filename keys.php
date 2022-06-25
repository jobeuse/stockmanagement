 
<?php include('conn.php')?>
<?php include('header.php')?>
<body> 
	<div class="container"> 
		<div class="row mt-4 justify-content-center">
			<div class="col-lg-6 mt-4"> 
				<div class="card">
					<div class="card-header">
						<em>verify the scret keyword</em>
					</div>
					<?php
					if (isset($_POST['verify'])) {
						$keyword=$_POST['keyword'];

						$select=mysqli_query($conn, "SELECT * FROM skeys WHERE keyname='$keyword'"); 
						$fetchs=mysqli_fetch_array($select);
						if($keyword == $fetchs['keyname'] and $keyword==''){
							echo "<div class='font-weight-bold alert alert-danger'>keyword not found or empty space found</div>";

						} 
							else{ 
								header('location:createaccount.php');
								session_start();
								$_SESSION['keys']=$keyword; 
							}
					 
				}
					?>
					<div class="card-body">
						<form method="POST">
							<input type="text" name="keyword" class="form-control mt-2" placeholder="enter keyword">
							<button type="submit" name="verify" class="btn  btn-outline-primary mt-3">verify</button>
						</form>
					</div>
				</div>

			</div> 
		</div>
	</div>
</body>
</html>