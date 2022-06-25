<?php include('header.php')?>
<?php include('conn.php')?>
<?php include('sessionlogin.php')?>
<body>
	 <?php include('sidenav.php')?>
	<div class="row justify-content-center"> 
		<div class="col-lg-4 mt-5">
			<form method="POST" class="card">
				<div class="card-header">
					<h5>CONFIRM BOX</h5> 
				</div>
				<div class="card-body">
					<?php
					if (isset($_POST['confirm'])) {
						$p_id=$_GET['id'];
 
						$select=mysqli_query($conn, "SELECT * FROM notification WHERE p_id='$p_id'")or die('errror'); 
						$fetchs=mysqli_fetch_array($select);
						if($p_id == $fetchs['p_id']){ 
						if ($p_id!='') { 
							$p_name=$fetchs['p_name'];
							$p_quantity=$fetchs['p_quantity'];
							$p_price=$fetchs['p_price'];
							$p_category=$fetchs['p_category'];
							$totalprice=$fetchs['p_price']*$fetchs['p_quantity'];
			              	$exp_date=$fetchs['exp_date'];
			              	$date=date('y/m/d h:m:s');
							$delete=mysqli_query($conn, "DELETE FROM notification WHERE p_id='$p_id'")or die('error');


								if ($delete) {
									echo "<div class='alert alert-success'>Product deleted now</div>";
									header('location:report.php');
								}else{
									echo "<div class='alert alert-danger'>error occured</div>";
								}
							
						}else{
							echo "<div class='alert alert-danger'>error occured</div>";
						}
					}else{
						echo "<div class='alert alert-danger'>error occured</div>";
					}
				}
					?> 
					<div class="col-lg-12 mt-3">
						Are you sure you want to delete this product ?
					</div> 
				</div>
				<div class="card-footer">
					<div class="col-lg-12 ">
						<div class="d-flex flex-row">
							<div class="flex-fill">
								<button type="submit" class="btn btn-sm btn-primary" name="confirm">Confirm</button>
							</div>
							<div class="flex-fill">
								<a href="report.php" class="btn btn-sm btn-danger">Cancel Process</a>
							</div>
						
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>


</body>
</html>