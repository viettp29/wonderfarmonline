<!DOCTYPE html>
<html lang="en">

<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick.css" />
          <link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick-theme.css" />
          <link rel="stylesheet" href="css/fonts/Roboto-Bold.ttf">
          <link rel="stylesheet" href="css/fonts/Roboto-Medium.ttf">
          <link rel="stylesheet" href="css/fonts/Roboto-Light.ttf">
          <link rel="stylesheet" href="css/fonts/Roboto-Thin.ttf">
          <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" /> -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
          <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
          <link rel="stylesheet" href="./css/style.css">
          <link rel="stylesheet" href="./css/index.css">
          <link rel="stylesheet" href="assets/vendor/slick-carousel/slick/slick.css">
          <link rel="stylesheet" href="./css/animate.css">
          <link rel="stylesheet" href="./css/slick.css">
          <link rel="stylesheet" href="./css/toastr.min.css">
          <meta name="viewport" content="width=device-width">
          <title>Document</title>

          <script type="text/javascript" src="chrome-extension://aggiiclaiamajehmlfpkjmlbadmkledi/popup.js" async=""></script>
          <script type="text/javascript" src="chrome-extension://aggiiclaiamajehmlfpkjmlbadmkledi/tat_popup.js" async=""></script>
</head>

<body>
          <header>
                    <!-- lv2 -->
                    <div class="top hidden-sm hidden-xs">
                              <!-- lv3 -->
                              <div class="container text-right">
                                        <!--CHUYỂN NGÔN NGỮ LV4-->
                                        <!--SEARCH TRANG-->
                                        <div class="search">
                                                  <button type="button" data-show="#search"><i class="fa fa-search"></i></button>
                                                  <div class="ct" id="search">
                                                            <form class="search-fr" method="GET" action="#">
                                                                      <input type="text" name="q" placeholder="Tìm kiếm ..." required="">
                                                                      <button type="submit"><i class="fa fa-search"></i></button>
                                                                      <div class="text-left" style="margin-top: 10px;">
                                                                                <select class="non-select2 form-control" style="width: 100%" name="type">
                                                                                          <option value="blogs">Bài viết</option>
                                                                                          <option value="products">Sản phẩm</option>
                                                                                </select>
                                                                      </div>
                                                            </form>
                                                  </div>
                                        </div>
                              </div>
                    </div>
                    <div class="header">
                              <div class="container">
                                        <div class="row row-ibl mid col-mar-0">
                                                  <div class="col-md-3 col-xs-12 sm-center">
                                                            <a class="logo" href="index.php" title="">
                                                                      <img src="images/logo2.png" alt="" title="">
                                                            </a>
                                                  </div>
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
                                                                                                              <a href="" class="nav-link">TRANG CHỦ</a>
                                                                                                    </li>
                                                                                                    <li class="nav-item">
                                                                                                              <a href="" class="nav-link">CÔNG TY</a>
                                                                                                              <ul class="sub-menu">
                                                                                                                        <li><a href="">THÔNG TIN CHUNG</a></li>
                                                                                                                        <li><a href="">LỊCH SỬ THÀNH LẬP</a></li>
                                                                                                                        <li><a href="">KIRIN TOÀN CẦU</a></li>
                                                                                                                        <li><a href="">TRIẾT LÝ KINH DOANH</a></li>
                                                                                                                        <li><a href="">THÔNG ĐIỆP TỪ TÔNG GIÁM ĐỐC</a></li>
                                                                                                              </ul>
                                                                                                    </li>
                                                                                                    <li class="nav-item">
                                                                                                              <a href="" class="nav-link">SẢN PHẨM</a>
                                                                                                              <ul class="sub-menu">
                                                                                                                        <li><a href="">WONDERFARM</a></li>
                                                                                                                        <li><a href="">KIRIN</a></li>
                                                                                                                        <li><a href="">THÔNG TIN SẢN PHẨM</a></li>
                                                                                                              </ul>
                                                                                                    </li>
                                                                                                    <li class="nav-item">
                                                                                                              <a href="" class="nav-link">NHÀ MÁY/OEM</a>
                                                                                                              <ul class="sub-menu">
                                                                                                                        <li><a href="">OEM </a></li>
                                                                                                                        <li><a href="">NHÀ MÁY NGK KIRIN VIỆT NAM</a></li>
                                                                                                                        <li><a href="">NHÀ MÁY INTERFOOD</a></li>
                                                                                                              </ul>
                                                                                                    </li>

                                                                                                    <li class="nav-item">
                                                                                                              <a href="" class="nav-link">CSR</a>
                                                                                                    </li>
                                                                                                    <li class="nav-item">
                                                                                                              <a href="" class="nav-link">TIN TỨC</a>
                                                                                                    </li>
                                                                                                    <li class="nav-item">

                                                                                                              <a href="" class="nav-link">TUYỂN DỤNG</a>
                                                                                                    </li>
                                                                                                    <li class="nav-item">

                                                                                                              <a href="" class="nav-link">CỔ ĐÔNG</a>
                                                                                                    </li>
                                                                                                    <li class="nav-item">

                                                                                                              <a href="" class="nav-link">LIÊN HỆ</a>
                                                                                                    </li>
                                                                                          </ul>

                                                                                </div>
                                                                      </div>
                                                            </nav>
                                                  </div>
                                        </div>
                              </div>
                    </div>
          </header>