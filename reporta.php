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
  		<div class="row mt-3"> 
  			<div class="col-lg-12 mt-3"> 
  				<div class="d-flex flex-row">
  					<div class="flex-grow-1">
  						<a href="report.php" class="btn btn-outline-info rounded-0">Back</a> 
  					</div> 
  					<div class="">
  						<a href="#print"class="btn btn-sm btn-info" onclick="printout()" >Print</a>
  						<script type="text/javascript"> 
  							function printout() {
  								window.print();
  							}
  						</script>
  					</div>
  				</div>
  			</div> 
  			<div class="col-lg-12">
  				<?php 
  				$gete=$_GET['report']; ?>

  					<h3 class="text-center text-info">
  						<?php echo $gete ?>
  					</h3>
 
  					
  					<?php
  				  

  				?>
  			</div>


 			<div class="col-lg-12 mt-2">
  				<?php 
  				//daily
  				if($gete == "Daily Report") { 
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
		                    </tr>
		                    <?php
		                    
		                  }
		                  ?>
	                  	</table>
	                  <?php
	                }else{
	                ?>

	                <p class="alert alert-warning">No Report Avialable</p>
	                <?php
	              }}
	           ?>
  			</div>


 
  			<div class="col-lg-12 mt-2">
  				<?php 
  				//monthly
  				$a=date('y/m/d');  
  				if($gete == "Monthly Report") { 
  				$date_e=date('m');  
  				
  				
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
	                  	</tr>
		                  <?php
		                  while ($fetch=mysqli_fetch_array($select)) {
		                  	$e=$fetch['date_e'];
		                  	$d=mktime(); 
		                  	if (date('m',$d) == date('m')) { 
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
		                    </tr>
		                    <?php
		                    
		                  }else{
		                  	echo "not reports";
		                  }
		              }
		                  ?>
	                  	</table>
	                  <?php
	                }else{
	                ?>

	                <p class="alert alert-warning">No Report Avialable</p>
	                <?php
	              }}
	           ?>
  			</div> 



  			<div class="col-lg-12 mt-2">
  				<?php 
  				//Yearly%20Report
  				$a=date('y/m/d');  
  				if($gete == "Yearly Report") { 
  				$date_er=date('y');  
  				
  				
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
	                  	</tr>
		                  <?php
		                  while ($fetch=mysqli_fetch_array($select)) {
		                  	if ($fetch['year']== $date_er) {
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
		                    </tr>
		                    <?php
		                    
		                  }else{
		                  	echo "";
		                  }}
		                  ?>
	                  	</table>
	                  <?php
	                }else{
	                ?>

	                <p class="alert alert-warning">No Report Avialable</p>
	                <?php
	              }}
	           ?>
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