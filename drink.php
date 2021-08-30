<?php
ob_start();
include('includes/connection.php');
if (isset($_SESSION['user_id']) == false) {
          include('includes/header.php');
} else {
          include('includes/headerUser.php');
}
?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
          <div class="container">

                    <form action="food-search.php" method="POST">
                              <input type="search" name="search" placeholder="Tìm kiếm đồ uống..." required>
                              <input type="submit" name="submit" value="Search" class="btn btn-danger">
                    </form>

          </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
          <div class="container">
                    <h2 class="text-start" style="color:#f32fa1">Menu Đồ Uống</h2>

                    <?php
                    //Display Foods that are Active
                    $sql = "SELECT * FROM drink WHERE active='Yes'";

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
                                                                      echo "<div class='error'>Hình ảnh không tồn tại.</div>";
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
                              echo "<div class='error'>Không tìm thấy thức ăn.</div>";
                    }
                    ?>
                    <div class="clearfix"></div>
          </div>
</section>
<!-- fOOD Menu Section Ends Here -->

<?php include 'includes/footer.php';
ob_end_flush();
?> ?>