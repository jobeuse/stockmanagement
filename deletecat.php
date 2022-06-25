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
						$cat_name=$_GET['cat_name'];
 
						$select=mysqli_query($conn, "SELECT * FROM category WHERE cat_name='$cat_name'")or die('errror'); 
						$fetchs=mysqli_fetch_array($select);
						if($cat_name == $fetchs['cat_name']){ 
						if ($cat_name!='') {  
							$delete=mysqli_query($conn, "DELETE FROM category WHERE cat_name='$cat_name'")or die('error');


								if ($delete) {
									echo "<div class='alert alert-success'>Category deleted now</div>";
									header('location:stockmanage.php');
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
						Are you sure you want to delete this category ?
					</div> 
				</div>
				<div class="card-footer">
					<div class="col-lg-12 ">
						<div class="d-flex flex-row">
							<div class="flex-fill">
								<button type="submit" class="btn btn-sm btn-primary" name="confirm">Confirm</button>
							</div>
							<div class="flex-fill">
								<a href="stockmanage.php" class="btn btn-danger">Cancel Process</a>
							</div>
						
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>


</body>
</html>