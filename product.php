<?php
ob_start();
include('includes/connection.php');
if (isset($_SESSION['user_id']) == false) {
          include('includes/header.php');
} else {
          include('includes/headerUser.php');
}
?>
<section class="food-search text-center">
          <div class="container">

                    <form action="food-search.php" method="POST">
                              <input type="search" name="search" placeholder="Tìm kiếm đồ uống..." required>
                              <input type="submit" name="submit" value="Search" class="btn btn-danger">
                    </form>

          </div>
</section>
<!-- CAtegories Section Starts Here -->
<section class="food-menu">
          <div class="container">
                    <h2 class="text-start" style="color:#f32fa1; ">Tất cả sản phẩm</h2>

                    <?php

                    //Display all the cateories that are active
                    //Sql Query
                    $sql = "SELECT * FROM product WHERE active='Yes'";

                    //Execute the Query
                    $res = mysqli_query($conn, $sql);

                    //Count Rows
                    $count = mysqli_num_rows($res);

                    //CHeck whether categories available or not
                    if ($count > 0) {
                              //CAtegories Available
                              while ($row = mysqli_fetch_assoc($res)) {
                                        //Get the Values
                                        $id = $row['productId'];
                                        $title = $row['title'];
                                        $imageName = $row['imageName'];
                    ?>
                                        <a href="product-drink.php?product_id=<?php echo $id; ?>">

                                                  <div class="food-menu-box">
                                                            <div class="product-menu-img" style="width: 165px; ">
                                                                      <?php
                                                                      if ($imageName == "") {
                                                                                //Image not Available
                                                                                echo "<div class='error'>Ảnh không tồn tại.</div>";
                                                                      } else {
                                                                                //Image Available
                                                                      ?>
                                                                                <img src="admin/images/product/<?php echo $imageName; ?>" class="img-responsive img-curve">
                                                                      <?php
                                                                      }
                                                                      ?>
                                                            </div>
                                                            <div class="food-menu-desc">
                                                                      <h4 class="text text-left text-black"><?php echo $title; ?></h4>
                                                            </div>
                                                  </div>
                                        </a>
                    <?php
                              }
                    } else {
                              //CAtegories Not Available
                              echo "<div class='error text text-center'>Sản phẩm không tồn tại.</div>";
                    }
                    ?>
                    <div class="clearfix"></div>
                    <!-- Categories Section Ends Here -->
          </div>
</section>

<?php include 'includes/footer.php';
ob_end_flush();
?> ?>