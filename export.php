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
    <div class="col-lg-9">
      <div class="card">
          <div class="card-header">
            <h5>EXPORT PRODUCT</h5>
          </div>
          <div class="card-body"> 
            <form method="POST" class="row ">
              <div class="col-lg-12">
                <strong>Search by product name</strong>
              </div>
              <div class="col-lg-8">
                <input type="text" name="p_name" class="form-control" placeholder="Enter Product Name">
              </div>
              <div class="col-lg-3">
                <button class="btn btn-sm btn-info" type="submit" name="find">Find</button>
              </div>
              <div class="col-lg-12">
                <hr>
              </div>
            </form>  

            <div class="row">
              <div class="col-lg-8">
                  <?php
                    if (isset($_POST['find'])) {
                      
                      $p_name=$_POST['p_name'];

                      $selectall=mysqli_query($conn, "SELECT * FROM imported where p_name='$p_name'");
                      $myfecthall=mysqli_fetch_array($selectall);
                    if ($p_name=='') { 
                      ?>
                    <?php }
                    else
                    {
                      
                      ?>

                <div class='alert alert-success'>Proceess run Successful</div>


                  <form class="row" method="POST">
                    <div class="col-lg-12 mt-2">
                      <strong>Product Name</strong>
                      <input type="text" value="<?php echo$myfecthall['p_name'];?>" name="p_name" onfocus="showinfo()" placeholder="Product name" class="form-control" readonly> 
                    </div>
                    <div class="col-lg-12 mt-5">  
                      <div class="d-flex flex-row">
                        <div class="flex-grow-1"> 
                          <strong class="">
                            Product Quantity: &nbsp;&nbsp;
                            <span class="text-info"><?php echo$myfecthall['p_quantity'];?></span>
                          </strong>
                        </div>
                        <div class="">
                          <select name="measure" disabled class="form-control">
                            <option><?php echo$myfecthall['measure'];?></option> 
                          </select>
                        </div>
                      </div>
                    </div>  
                     <div class="col-lg-12 mt-3">
                        <strong>Specify Product Quantity To be exported</strong>
                        <input type="number" value="" name="p_quantity" id="quantity" placeholder="Product Quantity" class="form-control" onblur="showtotal()">
                      </div>
                       <div class="col-lg-12 mt-2">
                          <strong>Product price</strong>
                          <input type="number" value="<?php echo$myfecthall['p_price'];?>" name="p_price" id="price" placeholder="Product price" class="form-control"  readonly>
                        </div>
                        <div class="col-lg-12 mt-2">
                          <strong>Product Category</strong>
                          <input type="text" value="<?php echo$myfecthall['p_category'];?>" name="p_category" class="form-control" readonly>
                        </div>
                        <div class="col-lg-12 mt-2">
                          <label class="text-danger">Expired date for product</label>
                          <input type="date" value="<?php echo$myfecthall['exp_date'];?>" name="exp_date" placeholder="Product expiration date" class="form-control" readonly>
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
                              <strong class="text-info">Total Price Removed</strong>
                            </div>
                            <div class="col-lg-6"> 
                              <strong id="total"></strong>
                            </div>
                          </div>
                        </div>
                         <div class="col-lg-12 mt-4">
                            <div class="row">
                              <div class="col-lg-6 mt-2">
                                <button type="submit" class="btn btn-primary btn-sm" name="export">Proceed</button>
                              </div>
                              <div class="col-lg-6 mt-2">
                                <a href="index.php" class="btn btn-danger btn-sm">Cancel Process</a>
                              </div> 
                            </div>
                          </div>
                      </form>
 

                      <?php
                    }

                  }?>
                  
              </div>

              <?php
              if (isset($_POST['export'])) {
                $p_name=$_POST['p_name'];
                $p_quantity=$_POST['p_quantity'];
                $p_category=$_POST['p_category'];
                $p_price=$_POST['p_price'];
                $exp_date=$_POST['exp_date'];
                $date=date('y/m/d');
                $measure="";
                if (empty($p_quantity)) {?>

                  <div class='alert alert-danger'>Proceess run error: <strong>Write Quantity To remove</strong></div>
                  <?php
                  
                }else{ 

                 $selectall=mysqli_query($conn, "SELECT * FROM imported where p_name='$p_name'");
                 $myfecthall=mysqli_fetch_array($selectall);

                 if ($myfecthall['p_quantity'] < $p_quantity) {?>
                   
                    <div class='alert alert-danger'>Proceess run error: <strong>Stock is empty</strong></div>

                    <?php
                 }elseif($myfecthall['p_quantity'] > $p_quantity){

                    if ($p_quantity!='' and $myfecthall['p_name']==$p_name) { 
                        $different=$myfecthall['p_quantity']-$p_quantity;
                        $p_quantityprice=$p_quantity*$p_price;
                        $totalremain=$different*$myfecthall['p_price'];


                        if ($myfecthall['p_quantity'] ==0) {
                          mysqli_query($con, "DELETE FROM imported  where p_name='$p_name")or die('deleteing error');
                          
                        }

                        
                        $updatedata=mysqli_query($conn,"UPDATE imported set p_quantity='$different',total_price='$totalremain'WHERE p_name='$p_name'")or die('error exporting');
                        $year=date('y');


                        mysqli_query($conn, "INSERT INTO notification VALUES('','$p_name','$p_quantity','$measure','$p_price','$p_category','$totalremain','imported','$exp_date','$date','$year')")or die('import notification error');

                          if ($updatedata) {?>
                            <div class='alert alert-success'>Proceess run successful: <strong>Product exported</strong></div>
                          
                          <?php
                        }else{
                            ?>
                            <div class='alert alert-danger'>Proceess run error: <strong>Something Went Wrong</strong></div>
                            <?php


                          }
                 }

               }
               } 
             }
              ?>

              <div class="col-lg-4">
                     <?php
                    if (isset($_POST['find'])) {
                      
                      $p_name=$_POST['p_name'];

                      $selectall=mysqli_query($conn, "SELECT * FROM imported where p_name='$p_name'");
                      $myfecthall=mysqli_fetch_array($selectall);
                    if ($p_name=='') { 
                      ?>
                      <div class='alert alert-danger'>Proceess run error: <strong>Write something</strong></div>
                    <?php
                  }else{

                    if ($p_name==$myfecthall['p_name']) { ?>
                      <strong class="mt-2">
                        Product name: &nbsp;&nbsp;
                        <span class="text-info"><?php echo$myfecthall['p_name'];?></span>
                      </strong><br>

                      <strong class="mt-2">
                        Product Price: &nbsp;&nbsp;
                        <span class="text-info"><?php echo$myfecthall['p_price'];?></span>
                      </strong><br>

                      <strong class="mt-2">
                        Product Quantity: &nbsp;&nbsp;
                        <span class="text-info"><?php echo$myfecthall['p_quantity'];?></span>&nbsp;<span><?php echo$myfecthall['measure'];?></span>
                      </strong><br>

                      <strong class="mt-2">
                        Product Category: &nbsp;&nbsp;
                        <span class="text-info"><?php echo$myfecthall['p_category'];?></span>
                      </strong><br>

                      <strong class="mt-2">
                        Product Expired Date: &nbsp;&nbsp;
                        <span class="text-info"><?php echo$myfecthall['exp_date'];?></span>
                      </strong><br>

                      <strong class="mt-2">
                        Total Price: &nbsp;&nbsp;
                        <span class="text-info"><?php echo$myfecthall['total_price'];?></span>
                      </strong><br>

                      <?php
                      }
                      else
                      {
                        ?>

                        <strong class='alert alert-danger mt-2'>No Product Found</strong>

                        <?php
                      }
                    }}
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
