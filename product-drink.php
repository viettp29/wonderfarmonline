<?php
ob_start();
include('includes/connection.php');
if (isset($_SESSION['user_id']) == false) {
          include('includes/header.php');
} else {
          include('includes/headerUser.php');
}
?>
<?php
//CHeck whether id is passed or not
if (isset($_GET['product_id'])) {
          //Category id is set and get the id
          $product_id = $_GET['product_id'];
          // Get the CAtegory Title Based on Category ID
          $sql = "SELECT title FROM product WHERE productId=$product_id";

          //Execute the Query
          $res = mysqli_query($conn, $sql);

          //Get the value from Database
          $row = mysqli_fetch_assoc($res);
          //Get the TItle
          $product_title = $row['title'];
} else {
          //CAtegory not passed
          //Redirect to Home page
          header('location:' . SITEURL);
}
?>
<section class="food-search text-center">
          <div class="container">

                    <form action="drink-search.php" method="POST">
                              <input type="search" name="search" placeholder="Tìm kiếm đồ uống..." required>
                              <input type="submit" name="submit" value="Search" class="btn btn-danger">
                    </form>

          </div>
</section>

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
          <div class="container">
                    <h2 class="text-start" style="color:#f32fa1">Menu <?php echo $product_title ?></h2>

                    <?php
                    //Display Foods that are Active
                    $sql = "SELECT * FROM drink WHERE active='Yes' and productId='$product_id'";

                    //Execute the Query
                    $res = mysqli_query($conn, $sql);

                    //Count Rows
                    $count = mysqli_num_rows($res);

                    //CHeck whether the foods are availalable or not
                    if ($count > 0) {
                              //Foods Available
                              while ($row = mysqli_fetch_assoc($res)) {
                                        //Get the Values
                                        $id = $row['drinkId'];
                                        $title = $row['title'];
                                        $description = $row['description'];
                                        $price = $row['price'];
                                        $imageName = $row['imageName'];
                    ?>

                                        <div class="food-menu-box">
                                                  <div class="food-menu-img">
                                                            <?php
                                                            //CHeck whether image available or not
                                                            if ($imageName == "") {
                                                                      //Image not Available
                                                                      echo "<div class='error text text-center'>Hình ảnh không tồn tại.</div>";
                                                            } else {
                                                                      //Image Available
                                                            ?>
                                                                      <img src="admin/images/drink/<?php echo $imageName; ?>" class="img-responsive img-curve">
                                                            <?php
                                                            }
                                                            ?>

                                                  </div>

                                                  <div class="food-menu-desc">
                                                            <h4><?php echo $title; ?></h4>
                                                            <p class="food-price">$<?php echo $price; ?></p>
                                                            <p class="food-detail">
                                                                      <?php echo $description; ?>
                                                            </p>
                                                            <br>

                                                            <a href="order.php?drink_id=<?php echo $id; ?>" class="btn btn-danger">Đặt hàng</a>
                                                  </div>
                                        </div>

                    <?php
                              }
                    } else {
                              //Food not Available
                              echo "<div class='error text text-center'>Sản phẩm chưa có đồ uống.</div>";
                    }
                    ?>
                    <div class="clearfix"></div>

          </div>

</section>
<!-- fOOD Menu Section Ends Here -->
<?php include 'includes/footer.php';
ob_end_flush();
?>