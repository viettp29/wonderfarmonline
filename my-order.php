<?php
ob_start();
include('includes/connection.php');
if (isset($_SESSION["user_id"]) == false) {
          $_SESSION['login'] = "<div class='error'>Bạn cần tạo tài khoản để xem được đơn hàng đã tạo</div>";
          header("Location: login.php");
} else {
          include('includes/headerUser.php');
}
?>


<div class="main-content" style="background-color:#ffffff">
          <div class="wrapper">
                    <h2>Danh sách đơn hàng</h2>

                    <br /><br /><br />

                    <?php
                    ?>

                    <table class="tbl-full">
                              <tr>
                                        <th>STT</th>
                                        <th>Drink</th>
                                        <th>Price</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền</th>
                                        <th>Ngày đặt</th>
                                        <th>Trạng thái</th>
                                        <th>Tên khách</th>
                                        <th>Số ĐT</th>
                                        <th>Địa chỉ</th>
                              </tr>

                              <?php
                              $userId = $_SESSION['user_id'];
                              //Get all the orders from database
                              $sql = "SELECT * FROM orders where userId='$userId' ORDER BY orderId DESC"; // DIsplay the Latest Order at First
                              //Execute Query
                              $res = mysqli_query($conn, $sql);
                              //Count the Rows
                              $count = mysqli_num_rows($res);

                              $stt = 1; //Create a Serial Number and set its initail value as 1

                              if ($count > 0) {
                                        //Order Available
                                        while ($row = mysqli_fetch_assoc($res)) {
                                                  //Get all the order details
                                                  $id = $row['orderId'];
                                                  $drink = $row['drink'];
                                                  $price = $row['price'];
                                                  $qty = $row['quantity'];
                                                  $total = $row['total'];
                                                  $order_date = $row['orderDate'];
                                                  $status = $row['status'];
                                                  $customer_name = $row['customerName'];
                                                  $customer_phone = $row['customerPhone'];
                                                  $customer_address = $row['customerAddress'];

                              ?>

                                                  <tr>
                                                            <td><?php echo $stt++; ?>. </td>
                                                            <td><?php echo $drink; ?></td>
                                                            <td><?php echo $price; ?></td>
                                                            <td><?php echo $qty; ?></td>
                                                            <td><?php echo $total; ?></td>
                                                            <td><?php echo $order_date; ?></td>

                                                            <td>
                                                                      <?php
                                                                      // Ordered, On Delivery, Delivered, Cancelled

                                                                      if ($status == "Ordered") {
                                                                                echo "<label>$status</label>";
                                                                      } elseif ($status == "On Delivery") {
                                                                                echo "<label style='color: orange;'>$status</label>";
                                                                      } elseif ($status == "Delivered") {
                                                                                echo "<label style='color: green;'>$status</label>";
                                                                      } elseif ($status == "Cancelled") {
                                                                                echo "<label style='color: red;'>$status</label>";
                                                                      }
                                                                      ?>
                                                            </td>

                                                            <td><?php echo $customer_name; ?></td>
                                                            <td><?php echo $customer_phone; ?></td>
                                                            <td><?php echo $customer_address; ?></td>
                                                  </tr>

                              <?php

                                        }
                              } else {
                                        //Order not Available
                                        echo "<tr><td colspan='12' class='error'>Chưa có đơn đặt hàng</td></tr>";
                              }
                              ?>


                    </table>
          </div>

</div>
<?php include 'includes/footer.php';
ob_end_flush();
?>