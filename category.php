<?php include('header.php')?>
<?php include('conn.php')?>
<?php include('sessionlogin.php')?>
<body>
	 <?php include('sidenav.php')?>
	<div class="row justify-content-center">	
		<div class="col-lg-6 mt-5">
			<div class="card">
				<div class="card-header">
					<h5>CREATE CATEGORY</h5>
				</div>
				<div class="card-body">
					<?php
					if (isset($_POST['categoryinsert'])) {
						$category=$_POST['category'];

						$select=mysqli_query($conn, "SELECT * FROM category WHERE cat_name='$category'"); 
						$fetchs=mysqli_fetch_array($select);
						if($category != $fetchs['cat_name']){ 
						if ($category!='') {

							$insert=mysqli_query($conn, "INSERT INTO category values('','$category')");
								if ($insert) {
									echo "<div class='alert alert-success'>category added now</div>";
								}else{
									echo "<div class='alert alert-danger'>error occured</div>";
								}
							
						}else{

							echo "<div class='alert alert-danger'>Error:  empy space found</div>";
						}
					}else{
						echo "<div class='alert alert-danger'>Category already exist</div>";
					}
					}
					?>
					<form class="row" method="POST">
						<div class="col-lg-12 mt-3">
							<input type="text" name="category" placeholder="category name" class="form-control">
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