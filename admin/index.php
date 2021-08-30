<?php
include('../includes/connection.php');
include('permission-admin.php');
?>
<?php include('includesAdmin/header.php'); ?>
<!-- Main Content Section Starts -->
<div class="main-content">
          <?php
          if (isset($_SESSION['success'])) {
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
          }
          ?>
          <div class="wrapper">
                    <h1>Dashboard</h1>
                    <br><br>
                    <br><br>

                    <div class="col-4 text-center">

                              <?php
                              //Sql Query 
                              $sql = "SELECT * FROM product";
                              //Execute Query
                              $res = mysqli_query($conn, $sql);
                              //Count Rows
                              $count = mysqli_num_rows($res);
                              ?>

                              <h1><?php echo $count; ?></h1>
                              <br />
                              Sản phẩm
                    </div>

                    <div class="col-4 text-center">

                              <?php
                              //Sql Query 
                              $sql2 = "SELECT * FROM drink";
                              //Execute Query
                              $res2 = mysqli_query($conn, $sql2);
                              //Count Rows
                              $count2 = mysqli_num_rows($res2);
                              ?>
                              <h1><?php echo $count2; ?></h1>
                              <br />
                              Đồ uống
                    </div>

                    <div class="col-4 text-center">

                              <?php
                              //Sql Query 
                              $sql3 = "SELECT * FROM orders";
                              //Execute Query
                              $res3 = mysqli_query($conn, $sql3);
                              //Count Rows
                              $count3 = mysqli_num_rows($res3);
                              ?>

                              <h1><?php echo $count3; ?></h1>
                              <br />
                              Số đơn hàng
                    </div>

                    <div class="col-4 text-center">

                              <?php
                              //Creat SQL Query to Get Total Revenue Generated
                              //Aggregate Function in SQL
                              $sql4 = "SELECT SUM(total) AS Total FROM orders WHERE status='Delivered'";

                              //Execute the Query
                              $res4 = mysqli_query($conn, $sql4);

                              //Get the VAlue
                              $row4 = mysqli_fetch_assoc($res4);

                              //GEt the Total REvenue
                              $total_revenue = $row4['Total'];

                              ?>

                              <h1>$<?php echo $total_revenue; ?></h1>
                              <br />
                              Doanh thu
                    </div>

                    <div class="clearfix"></div>

          </div>
</div>
<!-- Main Content Setion Ends -->

<?php include('includesAdmin/footer.php') ?>