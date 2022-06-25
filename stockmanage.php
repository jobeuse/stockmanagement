<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("location:login.php");
}
?>
<?php include('conn.php')?>
<?php include('header.php')?>
<body>
	<?php include('sidenav.php')?>
	<div class="container-fluid"> 
  		<div class="row">
  			<div class="col-lg-12"> 
  			</div>
  			<div class="col-lg-12">
				  <div class="row justify-content-center mt-5">

				    <div class="col-lg-9 mt-2">
				      <div class="card">
				          <div class="card-header">
				            <h5>PRODUCTS LIST</h5>
				            <a href="import.php" class="mb-2 btn btn-sm btn-primary float-right">ADD NEW</a> 
					            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Products" class="mt-2 form-control">
				            
				          </div>
				          <div class="card-body table-responsive">
				          	  <?php 
					              $select=mysqli_query($conn,"SELECT * FROM imported");
					                if(mysqli_num_rows($select) > 0) {
					                  ?> 
					                  <table class="table" id="myTable">
					                  	<tr>
					                  		<th>P.Name</th>
					                  		<th>P.Price</th>
					                  		<th>P.Quantity</th>
					                  		<th>P.Exp Date</th>
					                  		<th>Date</th>
					                  		<th>P.Category</th>
					                  		<th>Total Price</th>
					                  		<th>Action</th>
					                  	</tr>
						                  <?php
						                  while ($fetch=mysqli_fetch_array($select)) {?>

						                    <tr>
						                    	<td>
						                    		<?php echo$fetch['p_name']?>
						                    	</td>
						                    	<td>
						                    		<?php echo$fetch['p_price']?>
						                    	</td>
						                    	<td>
						                    		<?php echo$fetch['p_quantity']?>
						                    	</td>
						                    	<td>
						                    		<?php echo$fetch['exp_date']?>
						                    	</td>
						                    	<td>
						                    		<?php echo$fetch['date_e']?>
						                    	</td>
						                    	<td>
						                    		<?php echo$fetch['p_category']?>
						                    	</td>
						                    	<td>
						                    		<?php echo$fetch['total_price']?>
						                    	</td>
						                    	<td>
						                    		<a href="delete.php?name=<?php echo$fetch['p_name']?>" class="btn btn-sm btn-danger mt-2">Delete</a>

						                    		
						                    		<a href="edit.php?id=<?php echo$fetch['p_id']?>" class="btn btn-sm btn-info mt-2">Edit</a>
						                    	</td>
						                    </tr>
						                    <?php
						                    
						                  }
						                  ?>
					                  	</table>
					                  <?php
					                }else{
					                ?>

					                <p class="alert alert-warning">No Product: <a href="import.php" class="text-info" >Add New</a></p>
					                <?php
					              }
					           ?>
				          	
				          </div>
				      </div>
				  </div>

				  <div class="col-lg-3 mt-2">
				  	 <div class="card">
				          <div class="card-header">
				            <h5>CATEGORY LIST</h5>
				            <a href="category.php" class="btn btn-primary btn-sm float-right">ADD NEW</a>
				          </div>
				          <div class="card-body">
			          		  <?php 
					              $select=mysqli_query($conn,"SELECT * FROM category");
					                if(mysqli_num_rows($select) > 0) {
					                  ?> 
					                  <table class="table">
					                  	<tr>
					                  		<th>Name</th>
					                  		<th>Action</th>
					                  	</tr>
						                  <?php
						                  while ($fetch=mysqli_fetch_array($select)) {?>

						                    <tr>
						                    	<td>
						                    		<?php echo$fetch['cat_name']?>
						                    	</td>
						                    	<td>
						                    		<a href="deletecat.php?cat_name=<?php echo$fetch['cat_name']?>" class="btn btn-sm btn-danger mt-2">Delete</a>
						                    		<a href="editcat.php?cat_name=<?php echo$fetch['cat_name']?>" class="btn btn-sm btn-info mt-2">Edit</a>	
						                    	</td>
						                    </tr>
						                    <?php
						                    
						                  }
						                  ?>
					                  	</table>
					                  <?php
					                }else{
					                ?>

					                <p class="alert alert-warning">No category: <a href="category.php" class="text-info" >Add New</a></p>
					                <?php
					              }
					           ?>
				          	
				          </div>
				      </div>
				  </div>

				</div> 
  			</div>
  		</div>
  	</div>

</body>
</html>

<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>