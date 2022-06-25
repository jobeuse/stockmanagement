<?php session_start()?>
<?php include('conn.php')?>

<?php 
if (!isset($_SESSION['login'])) {
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home Stock management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="icon" href="images/shopping.png">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body class="bg-light">
  <?php include('sidenav.php')?>

  <div class="row justify-content-center mt-3">
    <?php
      //in kg packages
    ?>
    <div class="col-lg-3 text-muted bg-white rounded  p-2 shadow-sm">
      <?php
        $total_price=mysqli_query($conn, "SELECT sum(total_price) AS total FROM imported where measure='kg'");
        $total_quantity=mysqli_query($conn, "SELECT sum(p_quantity) AS total FROM imported where measure='kg'");
        $total_price_result=mysqli_fetch_array($total_price);
        $total_quantity_result=mysqli_fetch_array($total_quantity);
        ?>
        <div class="d-flex flex-row">
          <div class="flex-grow-1">
            <?php
              echo $total_price_result['total'];
            ?>
          </div>
          <div class="">
            <?php
              echo "Rwf";
            ?>
          </div>
        </div>

         <div class="d-flex mt-3 flex-row">
          <div class="flex-grow-1">
            <?php
              echo $total_quantity_result['total'];
            ?>
          </div>
          <div class="">
            <?php
              echo "Kilograms";
            ?>
          </div>
        </div>

        <div class="">
          <?php
          $pname=mysqli_query($conn, "SELECT * FROM imported where measure='kg' limit 20");
          while ($pfetech=mysqli_fetch_array($pname)) {?>
            <span class="badge badge-info"><?php echo $pfetech['p_name'];?></span>
          <?php
        }
          ?>
        </div> 
    </div>

    <?php
      //in lt
    ?>

    <div class="col-lg-3 text-muted bg-white rounded ml-3   p-2 shadow-sm">
      <?php
        $total_price=mysqli_query($conn, "SELECT sum(total_price) AS total FROM imported where measure='lt'");
        $total_quantity=mysqli_query($conn, "SELECT sum(p_quantity) AS total FROM imported where measure='lt'");
        $total_price_result=mysqli_fetch_array($total_price);
        $total_quantity_result=mysqli_fetch_array($total_quantity);
        ?>
        <div class="d-flex flex-row">
          <div class="flex-grow-1">
            <?php
              echo $total_price_result['total'];
            ?>
          </div>
          <div class="">
            <?php
              echo "Rwf";
            ?>
          </div>
        </div>

         <div class="d-flex mt-3 flex-row">
          <div class="flex-grow-1">
            <?php
              echo $total_quantity_result['total'];
            ?>
          </div>
          <div class="">
            <?php
              echo "Littles";
            ?>
          </div>
        </div>

        <div class="">
          <?php
          $pname=mysqli_query($conn, "SELECT * FROM imported where measure='lt' limit 20");
          while ($pfetech=mysqli_fetch_array($pname)) {?>
            <span class="badge badge-info"><?php echo $pfetech['p_name'];?></span>
          <?php
        }
          ?>
        </div> 
    </div>


    <?php

      //in packages
    ?>

    <div class="col-lg-3 text-muted bg-white rounded ml-3  p-2 shadow-sm">
      <?php
        $total_price=mysqli_query($conn, "SELECT sum(total_price) AS total FROM imported where measure='packages'");
        $total_quantity=mysqli_query($conn, "SELECT sum(p_quantity) AS total FROM imported where measure='packages'");
        $total_price_result=mysqli_fetch_array($total_price);
        $total_quantity_result=mysqli_fetch_array($total_quantity);
        ?>
        <div class="d-flex flex-row">
          <div class="flex-grow-1">
            <?php
              echo $total_price_result['total'];
            ?>
          </div>
          <div class="">
            <?php
              echo "Rwf";
            ?>
          </div>
        </div>

         <div class="d-flex mt-3 flex-row">
          <div class="flex-grow-1">
            <?php
              echo $total_quantity_result['total'];
            ?>
          </div>
          <div class="">
            <?php
              echo "Packages";
            ?>
          </div>
        </div>

        <div class="">
          <?php
          $pname=mysqli_query($conn, "SELECT * FROM imported where measure='packages' limit 20");
          while ($pfetech=mysqli_fetch_array($pname)) {?>
            <span class="badge badge-info"><?php echo $pfetech['p_name'];?></span>
          <?php
        }
          ?>
        </div> 
    </div>
 </div>
 <div class="row justify-content-center"> 
      <div class="col-lg-5 mt-3 shadow-sm bg-white">
        <div class="row p-2">
          <div class="col-lg-12">
            Recently Added
            <hr>
          </div>
          <div class="col-lg-12">
            <?php
              $today = date('Y-m-d'); 
             $select=mysqli_query($conn,"SELECT * FROM notification where date_e='$today' GROUP BY p_name");
                if(mysqli_num_rows($select) > 0) {?> 
                  <?php
              while ($fetch=mysqli_fetch_array($select)) {?>

                <div class="d-flex bg-light flex-row text-muted border-bottom text-normal mt-2">
                  <div class="flex-fill p-2">
                    <span class="badge badge-info">New</span>
                      <strong>
                        <?php echo$fetch['p_name']?>
                      </strong>
                  </div> 
                  <div class="flex-fill"> 
                      <?php echo$fetch['date_e'];?> 
                  </div>
                  <div class="flex-fill">
                    <a href="report.php">Check stock</a>
                  </div>
                </div>  
                <?php
              }
            }else{
              echo "<strong class='text-muted text-center'>No Products added Recently</strong>";
            }?>


              

          </div>

        </div>
      </div> 

      <div class="col-lg-5 ml-3 mt-3 shadow-sm bg-white">
        <div class="row p-2">
          <div class="col-lg-12 text-danger">
            Expired Products
            <hr>
          </div>
          <div class="col-lg-12">
            <?php
              $today = date('Y-m-d'); 
             $select=mysqli_query($conn,"SELECT * FROM notification where exp_date<'$today'");
                if(mysqli_num_rows($select) > 0) {?>
                  <div class="d-flex bg-light">
                    <div class="flex-fill">
                      Name
                    </div>
                    <div class="flex-fill">
                      Quantity
                    </div>
                    <div class="">
                      Clear
                    </div>
                    <hr>
                  </div>
                  <?php
              while ($fetch=mysqli_fetch_array($select)) {?>

                <div class="d-flex flex-row text-muted border-bottom text-normal">
                  <div class="flex-fill p-2">
                      <strong>
                        <?php echo$fetch['p_name']?>
                      </strong>
                  </div>
                  <div class="flex-fill"> 
                      <?php echo$fetch['p_quantity']?>                  
                  </div> 
                  <div class=""> 
                    <a href="deleteexp.php?id=<?php echo$fetch['p_id']; ?>" class="btn btn-danger btn-sm">remove</a>
                  </div>
                </div>  
                <?php
              }
            }else{
              echo "<strong class='text-muted text-center'>No Expired Products</strong>";
            }?>



          </div>

        </div>
      </div>
  </div>



  <script type="text/javascript" src="js/bootstrap.min"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> 
</body>
</html>