<?php include('header.php')?>
<?php include('conn.php')?>
<?php include('sessionlogin.php')?>
<body>
	 <?php include('sidenav.php')?>
	<div class="row justify-content-center">	
		<div class="col-lg-6 mt-5">
			<div class="card">
				<div class="card-header">
					<h5>UPDATE CATEGORY</h5>
				</div>
				<div class="card-body">
					<?php
					$category=$_GET['cat_name'];
					if (isset($_POST['categoryinsert'])) {
						$category=$_GET['cat_name'];

						$select=mysqli_query($conn, "SELECT * FROM category WHERE cat_name='$category'"); 
						$fetchs=mysqli_fetch_array($select);
						if($category == $fetchs['cat_name']){ 
						if ($category!='') { 

							$update=mysqli_query($conn, "UPDATE category set cat_name='$category' WHERE cat_name='$category'");
								if ($update) {
									echo "<div class='alert alert-success'>category updated now</div>";
								}else{
									echo "<div class='alert alert-danger'>error occured</div>";
								}
							
						}else{

							echo "<div class='alert alert-danger'>Error:  empy space found</div>";
						}
					}else{
						echo "<div class='alert alert-danger'>Category not exist</div>";
					}
					}
					?>
					<form class="row" method="POST">
						<div class="col-lg-12 mt-3">
							<input type="text" name="category" placeholder="category name" class="form-control" value="<?php echo($category)?>">
						</div>
						<div class="col-lg-12 mt-3">
							<button type="submit" class="btn btn-sm btn-primary" name="categoryinsert">Proceed</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>


</body>
</html>