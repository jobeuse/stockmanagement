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
            <h5>UPDATE PRODUCT</h5>
          </div>
          <div class="card-body">

    <?php
            if (isset($_POST['import'])) {
              $p_name=$_POST['p_name'];
              $p_quantity=$_POST['p_quantity'];
              $p_price=$_POST['p_price'];
              $p_category=$_POST['p_category'];
              $exp_date=$_POST['exp_date'];
              $date=date('y/m/d h:m:s');
              if ($p_quantity=='' and $p_price=='' and $p_name='') {
               echo "<div class='alert alert-danger'>Proceess run error fill all fields</div>";
                     
              }else{
                  $totalprice=$p_price*$p_quantity;
                  $selectall=mysqli_query($conn, "SELECT * FROM imported where p_name='$p_name'");
                  $myfecthall=mysqli_fetch_array($selectall);

                    if ($p_name==$myfecthall['p_name']) { 

                        $totalquantity=$p_quantity+$myfecthall['p_quantity'];
                        $totalpriceprice=$totalprice+$myfecthall['total_price'];
                        $updateproduct=mysqli_query($conn, "UPDATE imported set p_quantity='$totalquantity', p_price='$p_price',total_price='$totalpriceprice' where p_name='$p_name'


                          ");

                          
                          if ($updateproduct) {
                            echo "<div class='alert alert-success'>Proceess run updated successful</div>";
                          }
                          else {
                            echo "<div class='alert alert-danger'>Proceess run error</div>";
                          
                          }
                    }else{  
                          echo "<div class='alert alert-danger'>Proceess run error product not found <a href='import.php'>click here to add this product</a></div>";
                              
                    } 
                      
              }
            }






            ?>


            <form class="row" method="POST">

              <div class="col-lg-12 mt-2">
                <input type="text" name="p_name" onfocus="showinfo()" placeholder="Product name" class="form-control"> 
                <p class="alert alert-warning mt-1" id="infoname">Please don't use upper cases mixed with lower cases</p>
              </div>
              <script type="text/javascript">
                document.getElementById('infoname').style.display='none';
                function showinfo() {
                  document.getElementById('infoname').style.display='block';
                }
              </script>

              <div class="col-lg-12 mt-2">
                <input type="number" name="p_quantity" id="quantity" placeholder="Product Quantity" class="form-control">
              </div>

              <div class="col-lg-12 mt-2">
                <input type="number" name="p_price" id="price" placeholder="Product price" class="form-control" onblur="showtotal()">
              </div>

              <div class="col-lg-12 mt-2">
                <input type="text" name="p_category" placeholder="Product category" class="form-control" readonly>
              </div>

              <div class="col-lg-12 mt-2">
                <label class="text-danger">Specify Expired date for products</label>
                <input type="date" name="exp_date" placeholder="Product expiration date" class="form-control">
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
                    <button type="submit" class="btn btn-primary btn-sm" name="import">Proceed updates</button>
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