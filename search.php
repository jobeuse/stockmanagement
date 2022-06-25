<?php include('conn.php')?>
<!DOCTYPE html>
<html>
<head>
	<title>Search result</title>
	<meta charset="utf-8">
	<link rel="icon" href="images/shopping.png">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.min"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="fontawesome-free-5.8.1-web/js/fontawesome.js"></script> 
	<script type="text/javascript" src="fontawesome-free-5.8.1-web/js/fontawesome.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web/js/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web/js/fontawesome.min.css"> 
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body> 
	<?php include('sidenav.php')?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
			<?php
				if (isset($_GET['go'])) { 
					$a=$_GET['search'];  
					$sqlimported=mysqli_query($conn,"SELECT * FROM notification WHERE p_name like'%$a%' or p_quantity like'%$a%' or p_price like'%$a%' or date_e like'%$a%' or exp_date like'%$a%' or p_category like'%$a%'or measure like'%$a%'or trans like '%$a%' ")or die("research error"); 

					$scategory=mysqli_query($conn,"SELECT * FROM category WHERE cat_name like'%$a%' ")or die("research error"); 

					if (mysqli_num_rows($sqlimported)> 0) { 
						echo "<p class=' mt-5'>results found  for "."<span class='font-weight-bold text-info'>".$a."</span></p>";
						while ($res=mysqli_fetch_array($sqlimported)) {
							$ress=mysqli_fetch_array($scategory);
								if ($res['measure']='kg') {
									$measuree="<span>Kg</span>";
									 
								}elseif ($res['lt']) {
									$measuree="<span>Litters</span>";
									
								}elseif ($res['packages']) {
									$measuree="<span>Packages</span>";
									
								}

					    	$p_name=$res['p_name'];

					     	$p_quantity=$res['p_quantity'];
					      	$p_price=$res['p_price'];
					       	$date_e=$res['date_e'];
					        $exp_date=$res['exp_date']; 
					        $p_category=$res['p_category'];
					        ?>
					        <div class="d-flex p-2  border-bottom mt-2 bg-light flex-row">
					          	<div class="flex-grow-1">
						            <?php
						              echo$p_name;
						            ?>
					          	</div>
					          	<div class="flex-grow-1 borde-bottom">
						            <?php
						              echo$p_quantity. $measuree;
						            ?>
					          	</div>
					          	<div class="flex-grow-1 borde-bottom">
						            <?php
						              echo"Price: ". $p_price."Rwf";
						            ?>
					          	</div>
					          	<div class="flex-grow-1 mt-2 borde-bottom">
						            <?php
						              echo"Category: ". $p_category;
						            ?>
					          	</div>
					      	</div>


					      	<div class="d-flex p-2  border-bottom mt-2 bg-light flex-row">
					          	<div class="flex-grow-1">
						            <?php
						              echo$ress['cat_name'];

						            ?>
						            <span> categories found</span>
					          	</div>
					        </div>
					        <?php 
						}

						echo "<a href='report.php' class='text-decoration-none font-weight-bold text-info'>click here to view more products in stock </a> "; 
					} 
					else{
						echo "no results found  for "."<span class='font-weight-bold text-info mt-5'>".$a."</span>";
					}


				}
			?>

			</div>
		</div>
	</div>
</body>
</html>