<!DOCTYPE html>
<html lang="en">

<head>
          <!-- <meta charset="UTF-8"> -->
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick.css" />
          <link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick-theme.css" />
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
          <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
          <link rel="stylesheet" href="assets/vendor/slick-carousel/slick/slick.css">
          <link rel="stylesheet" href="css/admin.css">
          <meta name="viewport" content="width=device-width">
          <title>Admin</title>
</head>


<body>


          <header>
                    <!-- lv2 -->
                    <div class="top hidden-sm hidden-xs">
                              <!-- lv3 -->
                              <div class="container text-right" style="margin: 0 83%;">
                                        <!--CHUYỂN NGÔN NGỮ LV4-->
                                        <button type="button" class="btn btn-outline-danger rounded-pill "><a href="logout.php">Đăng xuất</a> </button> <!-- <button type=" btn-outline-danger"><a href="./admin/logout.php" class="text-dark " style="text-decoration: none;">Logout</a></button> -->

                                        <!--SEARCH TRANG-->
                                        <div class="search">
                                                  <div class="ct" id="search">


                                                  </div>
                                        </div>
                              </div>
                    </div>
                    <div class="header">
                              <div class="container">
                                        <div class="row row-ibl mid col-mar-0">
                                                  <!-- start logo-->
                                                  <div class="col-md-3 col-xs-12 sm-center">
                                                            <a class="logo" href="../homeUser.php" title="">
                                                                      <img src="../images/logo2.png" alt="" title="">
                                                            </a>
                                                  </div>
                                                  <!--End logo-->
                                                  <!-- start menu -->
                                                  <div class="col-md-9 col-xs-12 text-right static">
                                                            <nav class="navbar navbar-expand-md navbar-light navbar-fixed-top text-uppercase">
                                                                      <div class="container-xxl">

                                                                                <!--toggle button for mobile nav-->
                                                                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-toggle="collapse" data-target="#navbar" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                                                                                          <span class="navbar-toggler-icon"></span>
                                                                                </button>

                                                                                <!--navbar links-->
                                                                                <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
                                                                                          <ul class="navbar-nav" style="padding:2%">
                                                                                                    <li class="nav-item">
                                                                                                              <a href="index.php" class="nav-link">TRANG CHỦ</a>
                                                                                                    </li>
                                                                                                    <li class="nav-item">
                                                                                                              <a href="manage-user.php" class="nav-link">NGƯỜI DÙNG</a>
                                                                                                    </li>

                                                                                                    <li class="nav-item">
                                                                                                              <a href="manage-product.php" class="nav-link">SẢN PHẨM</a>

                                                                                                    </li>


                                                                                                    <li class="nav-item">
                                                                                                              <a href="manage-drink.php" class="nav-link">ĐỒ UỐNG</a>
                                                                                                    </li>
                                                                                                    <li class="nav-item">

                                                                                                              <a href="manage-order.php" class="nav-link">ĐẶT HÀNG</a>
                                                                                                    </li>
                                                                                          </ul>

                                                                                </div>
                                                                      </div>
                                                            </nav>
                                                  </div>
                                                  <!--End menu-->
                                        </div>

                              </div>
                    </div>
          </header>