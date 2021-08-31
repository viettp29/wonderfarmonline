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
                    <form action="drink-search.php" method="POST">
                              <input type="search" name="search" placeholder="Tìm kiếm đồ uống..." required>
                              <input type="submit" name="submit" value="Search" class="btn btn-danger">
                    </form>
                    <?php

                    //Get the Search Keyword
                    // $search = $_POST['search'];
                    $search = mysqli_real_escape_string($conn, $_POST['search']);

                    ?>
          </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
          <div class="container">
                    <h2 class="text-start" style="color:#f32fa1">Menu đồ uống</h2>

                    <?php

                    //SQL Query to Get foods based on search keyword
                    //$search = burger '; DROP database name;
                    // "SELECT * FROM tbl_food WHERE title LIKE '%burger'%' OR description LIKE '%burger%'";
                    $sql = "SELECT * FROM drink WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                    //Execute the Query
                    $res = mysqli_query($conn, $sql);

                    //Count Rows
                    $count = mysqli_num_rows($res);

                    //Check whether food available of not
                    if ($count > 0) {
                              //Food Available
                              while ($row = mysqli_fetch_assoc($res)) {
                                        //Get the details
                                        $id = $row['drinkId'];
                                        $title = $row['title'];
                                        $price = $row['price'];
                                        $description = $row['description'];
                                        $imageName = $row['imageName'];
                    ?>

                                        <div class="food-menu-box">
                                                  <div class="food-menu-img">
                                                            <?php
                                                            // Check whether image name is available or not
                                                            if ($imageName == "") {
                                                                      //Image not Available
                                                                      echo "<div class='error text-center'>Ảnh không có sẵn.</div>";
                                                            } else {
                                                                      //Image Available
                                                            ?>
                                                                      <img src="<?php echo SITEURL; ?>admin/images/drink/<?php echo $imageName; ?>" class="img-responsive img-curve">
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

                                                            <a href="order.php?drink_id=<?php echo $id; ?>" class="btn btn-danger">đặt hàng</a>
                                                  </div>
                                        </div>

                    <?php
                              }
                    } else {
                              //Food Not Available
                              echo "<div class='error'>Đồ uống không tồn tại.</div>";
                    }

                    ?>



                    <div class="clearfix"></div>



          </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include 'includes/footer.php';
ob_end_flush();
?>