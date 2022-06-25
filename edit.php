<?php include('conn.php')?>
<?php include('sessionlogin.php')?>
<?php include('header.php')?>
<body>
	<div class="row justify-content-center"> 
		<div class="col-lg-12"> 
	 		<?php include('sidenav.php')?>
		</div>	
		<div class="col-lg-7 mt-5">
			<form method="POST" class="card">
				<div class="card-header">
					<h5>UPDATE PRODUCT</h5> 
				</div>
				<div class="card-body">
				<?php
					if (isset($_POST['confirm'])) {
						$p_name=$_GET['id'];
 
						$select=mysqli_query($conn, "SELECT * FROM imported WHERE p_id='$p_name'")or die('errror'); 
						$fetchs=mysqli_fetch_array($select);
						if($p_name == $fetchs['p_id']){ 
						if ($p_name!='') { 
							$p_name=$_POST['p_name'];
							$p_quantity=$_POST['p_quantity'];
							$p_price=$_POST['p_price'];
							$p_category=$_POST['p_category'];
							$totalprice=$_POST['p_price']*$_POST['p_quantity'];
			              	$exp_date=$_POST['exp_date'];
			              	$date=date('y/m/d h:m:s');
			              	$measure=$_POST['measure'];
			              	$year=date('y');

							$update=mysqli_query($conn, "UPDATE imported SET p_name='$p_name',p_quantity='$p_quantity',p_price='$p_price',p_category='$p_category',total_price='$totalprice', exp_date='$exp_date' WHERE p_id='$p_name'")or die('error');

							 mysqli_query($conn, "INSERT INTO notification VALUES('','$p_name','$p_quantity','$measure','$p_price','$p_category','$totalprice','updated','$exp_date','$date','$year')")or die('import notification error');


								if ($update) {
									echo "<div class='alert alert-success'>Product updated now</div>"; 
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


					<?php 
						$p_name=$_GET['id'];
 
						$select=mysqli_query($conn, "SELECT * FROM imported WHERE p_id='$p_name'")or die('errror'); 
						$myfecthall=mysqli_fetch_array($select);
						if($p_name == $myfecthall['p_id']){ 
						if ($p_name!='') { ?> 

				<div class="row">
					<div class="col-lg-6 mt-2">
                      <strong>Product Name</strong>
                      <input type="text" value="<?php echo$myfecthall['p_name'];?>" name="p_name" placeholder="Product name" class="form-control" > 
                    </div>
                    <div class="col-lg-6 mt-2">
                      	 <div class="col-lg-12 mt-2">
			                <div class="d-flex flex-row">
			                  <div class="flex-grow-1">
			                    <strong>Product Quantity</strong>
			                    <input type="number" name="p_quantity" id="quantity" placeholder="Product Quantity" class="form-control" onblur="showtotal()" value="<?php echo$myfecthall['p_quantity'];?>">
			                  </div>
			                  <div class="mt-4 pl-2">
			                    <select name="measure" class="form-control" required>
			                      <option>Kg</option>
			                      <option value="lt">Lt</option>
			                      <option value="packages">Packages</option>
			                      <option>other</option>
			                    </select>
			                  </div>
			                </div>
			              </div>
                      
                    </div>
                       <div class="col-lg-6 mt-2">
                          <strong>Product price</strong>
                          <input type="number" value="<?php echo$myfecthall['p_price'];?>" name="p_price" id="price" placeholder="Product price" class="form-control"  onblur="showtotal()">
                        </div>
                        <div class="col-lg-6 mt-2">
                          <strong>Product Category</strong>
                          <input type="text" value="<?php echo$myfecthall['p_category'];?>" name="p_category" class="form-control" >
                        </div>
                        <div class="col-lg-6 mt-2">
                          <label class="text-danger">Expired date for product</label>
                          <input type="date" value="<?php echo$myfecthall['exp_date'];?>" name="exp_date" placeholder="Product expiration date" class="form-control" >
                        </div>
                        <script type="text/javascript"> 
                              function showtotal() {
                                var price=document.getElementById('price').value;
                                var quantity=document.getElementById('quantity').value;
                                var totalprice=parseInt(price)*parseInt(quantity); 
                                document.getElementById('total').innerHTML=totalprice;
                              }
                        </script>
                        <div class="col-lg-12 mt-3">
                          <div class="row">
                            <div class="col-lg-6">
                              <strong class="text-info">Total Price </strong>
                            </div>
                            <div class="col-lg-6"> 
                              <strong id="total"></strong>
                            </div>
                          </div>
                        </div>
                    </div>

						<?php
							
						}else{
							echo "<div class='alert alert-danger'>error occured</div>";
						}
					}else{
						echo "<div class='alert alert-danger'>error occured</div>";
					} 
					?>  
				</div>
				<div class="card-footer">
					<div class="col-lg-12 ">
						<div class="row">
							<div class="col-lg-8">
								<button type="submit" class="btn btn-sm btn-primary" name="confirm">Confirm</button>
							</div>
							<div class="col-lg-4">
								<a href="stockmanage.php" class="btn btn-danger">Cancel Process</a>
							</div>
							<div class="col-lg-12 text-center">
								<a href="index.php" class="text-primary text-decoration-none">Back Home</a>
							</div>					
						</div>
					</div>
				</div>
			</form> 
		</div>
	</div>
</body>
</html>