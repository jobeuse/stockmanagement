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
  <div class="row justify-content-center mt-5">
    <div class="col-lg-6">
      <div class="card">
          <div class="card-header">
            <h5>IMPORT NEW PRODUCT</h5>
          </div>
          <div class="card-body">

    <?php 
            if (isset($_POST['import'])) {
              $p_name=$_POST['p_name'];
              $p_quantity=$_POST['p_quantity'];
              $p_price=$_POST['p_price'];
              $p_category=$_POST['p_category'];  
              $measure=$_POST['measure'];
              $date=date('y/m/d'); 
              $exp_dateer=$_POST['expired_date'];

              $year=date('y');
              if (!preg_match("/^[a-z]*$/",$p_name)) { 

                echo "<div class='alert alert-danger'>Proceess run error only small letters allowed</div>";

              }else{ 
                if ($exp_dateer > $date) {
                  echo "<div class='alert alert-danger'>Product expired</div>";
                }else{              

              if ($p_quantity=='' or $p_price=='' or $p_name=='' or $exp_dateer='') {
               echo "<div class='alert alert-danger'>Proceess run error fill all fields</div>";
                     
              }elseif ($p_quantity!='' and $p_price!='' and $p_name!='') {

                if ($exp_dateer < $date) { 
                  $totalprice=$p_price*$p_quantity;
                  $selectall=mysqli_query($conn, "SELECT * FROM imported where p_name='$p_name'");
                  $myfecthall=mysqli_fetch_array($selectall);

                    if ($p_name==$myfecthall['p_name']) { 

                        $totalquantity=$p_quantity+$myfecthall['p_quantity'];
                        $totalpriceprice=$totalprice+$myfecthall['total_price'];
                        
                        $updateproduct=mysqli_query($conn, "UPDATE imported set p_quantity='$totalquantity', exp_date='$exp_dateer', measure='$measure', p_price='$p_price',total_price='$totalpriceprice' where p_name='$p_name'");

                         $sg=mysqli_query($conn, "INSERT INTO notification VALUES('','$p_name','$p_quantity','$measure','$p_price','$p_category','$totalprice','imported','$exp_dateer','$date','$year')")or die('import notification error');

                          
                          if ($updateproduct) {
                            echo "<div class='alert alert-success'>Proceess run updated successful</div>";
                          }
                          else {
                            echo "<div class='alert alert-danger'>Proceess run error</div>";
                          
                          }
                    }else{ 

                       $import=mysqli_query($conn, "INSERT INTO imported VALUES('','$p_name','$p_quantity','$measure','$p_price','$p_category','$totalprice','$exp_dateer','$date')")or die('import error');

                         mysqli_query($conn, "INSERT INTO notification VALUES('','$p_name','$p_quantity','$measure','$p_price','$p_category','$totalprice','imported','$exp_dateer','$date','$year')")or die('import notification error');

                              if ($import) {
                                echo "<div class='alert alert-success'>Proceess run successful</div>";
                              }else{
                                echo "<div class='alert alert-danger'>Proceess run error1</div>";
                              }
                    } 




                  }else{
                    echo"products Expired";
                  }
                      
              }else{
                echo "<div class='alert alert-danger'>Proceess run error 2</div>";
              }}
            }
            }






            ?>


            <form class="row" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

              <div class="col-lg-12 mt-2">
                <strong>Product Name</strong>
                <input type="text" name="p_name" onfocus="showinfo()" placeholder="Product name" class="form-control"> 
                <p class="alert alert-warning mt-1" id="infoname">Please don't use CAPITAL LETTERS mixed with LOWER LETTERS</p>
              </div>
              <script type="text/javascript">
                document.getElementById('infoname').style.display='none';
                function showinfo() {
                  document.getElementById('infoname').style.display='block';
                }
              </script>

              <div class="col-lg-12 mt-2">
                <div class="d-flex flex-row">
                  <div class="flex-grow-1">
                    <strong>Product Quantity</strong>
                    <input type="number" name="p_quantity" id="quantity" placeholder="Product Quantity" class="form-control" onblur="showtotal()">
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

              <div class="col-lg-12 mt-2">
                <strong>Product price</strong>
                <input type="number" name="p_price" id="price" placeholder="Product price" class="form-control" onblur="showtotal()">
              </div>

              <div class="col-lg-12 mt-2">
                <strong>Product Category</strong>
                <?php 
              $select=mysqli_query($conn,"SELECT * FROM category");
                if(mysqli_num_rows($select) > 0) {
                  ?>
                  <select class="form-control" name="p_category">
                  <?php
                  while ($fetch=mysqli_fetch_array($select)) {?>
                    <option><?php echo$fetch['cat_name']?></option>
                    <?php
                    
                  }
                  ?>

                  <?php
                }else{
                ?>
                <p class="alert alert-warning">No category: <a href="category.php" class="text-info" >Add New</a></p>
                <?php
              }
                ?>
                </select> 
              </div> 

              <div class="col-lg-12 mt-2">
                <label class="text-danger">Specify Expired date for products</label>
                <input type="date" name="expired_date" class="form-control">
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
                    <strong class="text-info">Total Price</strong>
                  </div>
                  <div class="col-lg-6"> 
                    <strong id="total"></strong>
                  </div>
              </div>

              <div class="col-lg-12 mt-4">
                <div class="row">
                  <div class="col-lg-6 mt-2">
                    <button type="submit" class="btn btn-primary btn-sm" name="import">Proceed</button>
                  </div>
                  <div class="col-lg-6 mt-2">
                    <a href="index.php" class="btn btn-danger btn-sm">Cancel Process</a>
                  </div> 
                </div>
              </div> 
            </form>
          </div>
      </div>
    </div>
    
  </div>
</div>
</body>
</html>