<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("location:login.php");
}
?>
<?php include('conn.php')?>
<?php include('header.php')?>
<body> 
	<div class="container-fluid"> 
  		<div class="row">
  			<div class="col-lg-12">
				<?php include('sidenav.php')?>
  			</div>
  			<div class="col-lg-12 mt-3"> 
				<a href="reporta.php?report=<?php echo"Daily Report"?>" class="btn btn-outline-info rounded-0">Daily Report</a>
				<!--<a href="reporta.php?report=<?php echo"Monthly Report"?>" class="btn btn-outline-info rounded-0">Monthly Report</a>-->
				<a href="reporta.php?report=<?php echo"Yearly Report"?>" class="btn btn-outline-info rounded-0">Yearly Report</a> 
  			</div> 
  			<div class="col-lg-12 mt-2">

  				<?php  
  				if (isset($_POST['day'])) {
  					 
  				
  				$date_e=date('Y-m-d');
	              $select=mysqli_query($conn,"SELECT * FROM notification where date_e='$date_e'");
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
	                  		<th>Trans</th>
	                  		<th>Action</th>
	                  	</tr>
		                  <?php
		                  while ($fetch=mysqli_fetch_array($select)) {
		                  	if ($fetch['exp_date'] < date('Y-m-d')) {
		                  		$exp="<span class='text-danger font-weight-bold'>Product expired</span>";
		                  		$dateexp="<span class='text-danger'>".$fetch['exp_date']."</span>";
		                  	}else{
		                  		$exp="";
		                  		$dateexp="&nbsp;&nbsp;<span>".$fetch['exp_date']."</span>";
		                  	}
		                  	?>

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
		                    		<?php
		                    			if ($fetch['exp_date'] < date('Y-m-d')) {			      echo $dateexp;
		                    				echo $exp;
		                    			}else{
											echo $dateexp;
		                    			}
		                    		?>

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
		                    		<?php echo$fetch['trans']?>
		                    	</td>
		                    	<td>
		                    		<a href="deleteall.php?id=<?php echo$fetch['p_id']?>" class="btn btn-sm btn-danger mt-2">Delete</a>
		                    		 
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
	              }}
	           ?>
  			</div> 

  			<div class="col-lg-12">
				  <div class="row justify-content-center mt-5">
				    <div class="col-lg-10 mt-2">
				      <div class="card">
				          <div class="card-header">
				            <h5>PRODUCTS LIST/ Transaction</h5>
				            <a href="import.php" class="mb-2 btn btn-sm btn-primary float-right">ADD NEW</a> 
					            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Products" class="mt-2 form-control">
				            
				          </div>
				          <div class="card-body table-responsive">

				          	  <?php 
					              $select=mysqli_query($conn,"SELECT * FROM notification");
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
					                  		<th>Trans</th>
					                  		<th>Action</th>
					                  	</tr>
						                  <?php
						                  while ($fetch=mysqli_fetch_array($select)) {
						                  	if ($fetch['exp_date'] < date('Y-m-d')) {
						                  		$exp="<span class='text-danger font-weight-bold'>Product expired</span>";
						                  		$dateexp="<span class='text-danger'>".$fetch['exp_date']."</span>";
						                  	}else{
						                  		$exp="";
						                  		$dateexp="&nbsp;&nbsp;<span>".$fetch['exp_date']."</span>";
						                  	}
						                  	?>

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
						                    		<?php
						                    			if ($fetch['exp_date'] < date('Y-m-d')) {			      echo $dateexp;
						                    				echo $exp;
						                    			}else{
															echo $dateexp;
						                    			}
						                    		?>

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
		                    					<?php echo$fetch['trans']?>
		                    					</td>
						                    	<td>
						                    		<a href="deleteall.php?id=<?php echo$fetch['p_id']?>" class="btn btn-sm btn-danger mt-2">Delete</a>
						                    		 
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