<?php
include('includes/connection.php');
if (isset($_SESSION['role_User']) && $_SESSION['role_User'] == 0) {
          include('includes/headerUser.php');
} else {
          include('includes/headerAdmin.php');
}
?>
<!-- start carousel slider-->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
          </div>
          <div class="carousel-inner">
                    <div class="carousel-item active">
                              <img src="images/beauti-web-banner-01.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                              <img src="images/kr-web-banner-01.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                              <img src="images/kr-web-banner2020-01.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                              <img src="images/kr-web-banner2020-02.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                              <img src="images/icewebsite.jpg" class="d-block w-100" alt="...">
                    </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
          </button>
</div>
<!--End carousel slider-->
<br>
<?php
if (isset($_SESSION['success'])) {
          echo $_SESSION['success'];
          unset($_SESSION['success']);
}
if (isset($_SESSION['order'])) {
          echo $_SESSION['order'];
          unset($_SESSION['order']);
}
?>
<!--Start s???n ph???m th????ng hi???u-->
<div class="h-products">
          <div class="container">
                    <h2 class="h-title text-center ">s???n ph???m th????ng hi???u</h2>
                    <!--slick slider-->
                    <div class="container">
                              <div class="responsive">
                                        <!--class="slick-track" cho n?? thanh 1 h??ng-->
                                        <div class="slick-track" role="listbox" style="opacity: 1; width: 75%;">
                                                  <div data-slick-index="0" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide1" style="width: 165px;">
                                                            <div class="h-product active" data-index="12">
                                                                      <center><img data-lazy="images/cafe3.png" width="80" height="250" caption="false">
                                                                      </center>
                                                                      <h3 class="title"><span>Kirin V???i Mu???i</span></h3>
                                                                      <p>Kirin V???i Mu???i</p>
                                                            </div>
                                                  </div>
                                                  <!--class="slick-slide"-->
                                                  <div data-slick-index="1" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide2" style="width: 165px;">
                                                            <div class="h-product active" data-index="11">
                                                                      <center><img <img data-lazy="images/sori3.jpg" width="80" height="250" caption="false">
                                                                      </center>
                                                                      <h3 class="title"><span>Kirin V???i Mu???i</span></h3>
                                                                      <p>Kirin V???i Mu???i</p>
                                                            </div>
                                                  </div>
                                                  <div data-slick-index="2" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide3" style="width: 165px;">
                                                            <div class="h-product active" data-index="10">
                                                                      <center><img data-lazy="images/bidao4.jpg" width="80" height="250" caption="false">
                                                                      </center>
                                                                      <h3 class="title"><span>Kirin V???i Mu???i</span></h3>
                                                                      <p>Kirin V???i Mu???i</p>
                                                            </div>
                                                  </div>
                                                  <div data-slick-index="3" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide4" style="width: 165px;">
                                                            <div class="h-product active" data-index="9">
                                                                      <center><img data-lazy="images/coffee-vanilla.png" width="80" height="250" caption="false">
                                                                      </center>
                                                                      <h3 class="title"><span>Kirin V???i Mu???i</span></h3>
                                                                      <p>Kirin V???i Mu???i</p>
                                                            </div>
                                                  </div>
                                                  <div data-slick-index="3" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide5" style="width: 165px;">
                                                            <div class="h-product active" data-index="9">
                                                                      <center><img data-lazy="images/imuse-vn.jpg" width="80" height="250" caption="false">
                                                                      </center>
                                                                      <h3 class="title"><span>Kirin V???i Mu???i</span></h3>
                                                                      <p>Kirin V???i Mu???i</p>
                                                            </div>
                                                  </div>
                                                  <div data-slick-index="3" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide6" style="width: 165px;">
                                                            <div class="h-product active" data-index="9">
                                                                      <center><img data-lazy="images/ice-kirin-1301-vn-01.png" width="80" height="250" caption="false">
                                                                      </center>
                                                                      <h3 class="title"><span>Kirin V???i Mu???i</span></h3>
                                                                      <p>Kirin V???i Mu???i</p>
                                                            </div>
                                                  </div>
                                                  <div data-slick-index="3" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide7" style="width: 165px;">
                                                            <div class="h-product active" data-index="9">
                                                                      <center><img data-lazy="images/ice4.png" width="80" height="250" caption="false">
                                                                      </center>
                                                                      <h3 class="title"><span>Kirin V???i Mu???i</span></h3>
                                                                      <p>Kirin V???i Mu???i</p>
                                                            </div>
                                                  </div>
                                                  <div data-slick-index="3" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide8" style="width: 165px;">
                                                            <div class="h-product active" data-index="9">
                                                                      <center><img data-lazy="images/traxanh.jpg" width="80" height="250" caption="false">
                                                                      </center>
                                                                      <h3 class="title"><span>Kirin V???i Mu???i</span></h3>
                                                                      <p>Kirin V???i Mu???i</p>
                                                            </div>
                                                  </div>
                                        </div>
                                        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
                                        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
                                        <script type="text/javascript" src="slick-1.8.1/slick/slick.min.js"></script>
                                        <script type="text/javascript">
                                                  $('.slick-track').slick({
                                                            lazyLoad: 'ondemand',
                                                            slidesToShow: 5,
                                                            slidesToScroll: 2,
                                                            autoplay: true,
                                                            autoplaySpeed: 1500,
                                                  });
                                        </script>
                              </div>
                              <hr>
                    </div>
                    <!--end slick slider-->
                    <div class="inline" style="border: white; margin:2%  14%; width: 72%;"></div>
                    <!--gi???i thi???u b?? ??ao-->
                    <div style="width: 84%; margin: 0 7%;">
                              <div class="item" style="display: block;" data-index="1">
                                        <div class="row">
                                                  <div class="col-md-6 text-center" style'>
                                                            <div class="img"><img src="images/img.png" width="" height="" caption="false"></div>
                                                  </div>
                                                  <div class="col-md-6">
                                                            <div class="text text-end">
                                                                      <h3 class="title"><a style="font-weight: 700" href="#" title="">???Tr?? b?? ??ao Wonderfarm - cho m???t Vi???t Nam thanh m??t???</a></h3>
                                                                      <p>S???n ph???m WONDERFARM l?? Th???c u???ng gi???i kh??t thanh m??t ch??? xu???t t??? nh???ng n??ng ph???m thi??n nhi??n t???t cho s???c kh???e. S???n ph???m WONDERFARM s??? d???ng ngu???n nguy??n li???u thi??n nhi??n s?? ch??? v?? s???n xu???t tr??n d??y chuy???n t??? ?????ng t???i nh?? m??y. Do ???? ?????m b???o gi?? tr??? dinh d?????ng v?? v??? t????i ngon t??? nhi??n cho c??c th???c u???ng quen thu???c. S???n ph???m n???i b???t trong d??ng th????ng hi???u WONDERFARM l?? h????ng v??? quen thu???c t??? Tr?? B?? ??ao thanh m??t.</p>
                                                                      <a style="font-weight: 700" class="smooth more" href="" title="">Xem th??m</a>
                                                            </div>
                                                  </div>
                                        </div>
                              </div>
                    </div>
                    <!--end gi???i thi???u b?? ??ao-->
          </div>
          <!-- start nh?? m??y / oem-->
          <div class="container">
                    <div class="h-factory" style="margin:8%  20%; width: 58%;">
                              <h2 class="text-center"><a class="h-title" href="#">NH?? M??Y/OEM</a></h2>
                              <div class="row">
                                        <div class="col-sm-4">
                                                  <div class="factory"><a class="img hv-scale" href="#"> <img src="images/fac1.png" alt="" title=""> </a>
                                                            <h3 class="title"><a href="#"> nh?? m??y interfood</a></h3>
                                                            <div class="more text-center"><a href="#"><i class="fa fa-caret-right"></i> Quy tr??nh s???n xu???t</a></div>
                                                  </div>
                                        </div>
                                        <div class="col-sm-4 ">
                                                  <div class="factory"><a class="img hv-scale" href="#"> <img src="images/logo-kirin-copy.png" width="160" height="36" caption="false"> </a>
                                                            <h3 class="title"><a href="#">nh?? m??y ngk kirin vi???t nam</a></h3>
                                                            <div class="more text-center"><a href="#"><i class="fa fa-caret-right"></i> Quy tr??nh s???n xu???t</a></div>
                                                  </div>
                                        </div>
                                        <div class="col-sm-4">
                                                  <div class="factory"><a class="img hv-scale" href="#"> <img src="images/fac3.png" alt="" title=""> </a>
                                                            <h3 class="title"><a href="#"> ?????t h??ng oem</a></h3>
                                                            <div class="more text-center"><a href="#"><i class="fa fa-caret-right"></i> Li??n h???</a></div>
                                                  </div>
                                        </div>
                              </div>
                    </div>
          </div>
          <!-- end nh?? m??y / oem-->

</div>
<!--end s???n ph???m th????ng hi???u-->

<!--start posts -->
<div class="h-posts">
          <!--start tabs bootstrap 5-->
          <div class="container">
                    <!-- <h2 class="h-title wow bounceInUp"><span>tin t???c & s??? ki???n <span class="hidden-xs">|</span></span> <i>ho???t ?????ng x?? h???i</i></h2> -->
                    <nav class="wrapper" style="padding-bottom: 20px;">
                              <div class="nav nav-tabs" id="nav-tab" role="tablist" style="margin: 0 12%; ">

                                        <button class="h-title nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Tin t???c v?? s??? ki???n</button>
                                        <button class="h-title nav-link " id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Ho???t ?????ng x?? h???i</button>

                              </div>
                    </nav>
                    <div class="tab-content wrapper" id="nav-tabContent">
                              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="row" style="height: 70px;">
                                                  <div class="col-2"><button style="font-weight: 500;">Tin t???c</button></div>
                                                  <div class="col-2"><i class="fa fa-calendar"></i> 04/12/2019 </div>
                                                  <div class="col-8"><a class="smooth cate" href="https://www.wonderfarmonline.com/blogs/tin-tuc/tong-ket-hanh-trinh-hoi-thi-hoc-sinh-sinh-vien-thanh-pho-voi-phap-luat-nam-hoc-2019-2020" title="">T???NG K???T H??NH TR??NH H???I THI ???H???C SINH, SINH VI??N TH??NH PH??? V???I PH??P LU???T??? N??M H???C 2019-2020</a></div>
                                        </div>
                                        <div class="row" style="height: 70px;">
                                                  <div class="col-2"><button style="font-weight: 500;">Tin t???c</button></div>
                                                  <div class="col-2"><i class="fa fa-calendar"></i> 25/02/2019</div>
                                                  <div class="col-8">
                                                            <a class="smooth cate" href="https://www.wonderfarmonline.com/blogs/tin-tuc/interfood-dong-hanh-cung-hoi-thi-hoc-sinh-sinh-vien-thanh-pho-voi-phap-luat-lan-6-chu-de-tieng-noi-tuoi-tre" title="">INTERFOOD ?????NG H??NH C??NG H???I THI ???H???C SINH SINH VI??N TH??NH PH??? V???I PH??P LU???T??? L???N 6 CH??? ????? ???TI???NG N??I TU???I TR??????</a>
                                                  </div>
                                        </div>
                                        <div class="row" style="height: 70px;">
                                                  <div class="col-2"><button style="font-weight: 500;">Tin t???c</button></div>
                                                  <div class="col-2"><i class="fa fa-calendar"></i> 31/10/2018</div>
                                                  <div class="col-8">
                                                            <a class="smooth cate" href="https://www.wonderfarmonline.com/blogs/tin-tuc/phat-dong-hoi-thi-hoc-sinh-thanh-pho-voi-phap-luat-lan-6-chu-de-tieng-noi-tuoi-tre" title="">Ph??t ?????ng h???i thi "H???c sinh th??nh ph??? v???i ph??p lu???t" l???n 6 ch??? ????? "Ti???ng n??i tu???i tr???"</a>
                                                  </div>
                                        </div>
                                        <div class="row" style="height: 70px;">
                                                  <div class="col-2"><button style="font-weight: 500;">Tin t???c</button></div>
                                                  <div class="col-2"> <i class="fa fa-calendar"></i> 06/06/2018</div>
                                                  <div class="col-8">
                                                            <a class="smooth cate" href="https://www.wonderfarmonline.com/blogs/tin-tuc/interfood-tu-hao-tai-tro-cuoc-thi-hoc-sinh-thanh-pho-voi-phap-luat-nam-2017" title="">Interfood t??? h??o t??i tr??? cu???c thi ???H???c sinh th??nh ph??? v???i ph??p lu???t??? n??m 2017</a>
                                                  </div>
                                        </div>

                              </div>
                              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="row" style="height: 70px;">
                                                  <div class="col-2"><button style="font-weight: 500;">Tin t???c</button></div>
                                                  <div class="col-2"> <i class="fa fa-calendar"></i> 04/12/2019
                                                  </div>
                                                  <div class="col-8">
                                                            <a class="smooth cate" href="https://www.wonderfarmonline.com/blogs/tin-tuc/tong-ket-hanh-trinh-hoi-thi-hoc-sinh-sinh-vien-thanh-pho-voi-phap-luat-nam-hoc-2019-2020" title="">T???NG K???T H??NH TR??NH H???I THI ???H???C SINH, SINH VI??N TH??NH PH??? V???I PH??P LU???T??? N??M H???C 2019-2020</a>
                                                  </div>
                                        </div>
                                        <div class="row" style="height: 70px;">
                                                  <div class="col-2"><button style="font-weight: 500;">Tin t???c</button></div>
                                                  <div class="col-2"> <i class="fa fa-calendar"></i> 25/02/2019
                                                  </div>
                                                  <div class="col-8">
                                                            <a class="smooth cate" href="https://www.wonderfarmonline.com/blogs/tin-tuc/interfood-dong-hanh-cung-hoi-thi-hoc-sinh-sinh-vien-thanh-pho-voi-phap-luat-lan-6-chu-de-tieng-noi-tuoi-tre" title="">INTERFOOD ?????NG H??NH C??NG H???I THI ???H???C SINH SINH VI??N TH??NH PH??? V???I PH??P LU???T??? L???N 6 CH??? ????? ???TI???NG N??I TU???I TR??????</a>
                                                  </div>
                                        </div>
                                        <div class="row" style="height: 70px;">
                                                  <div class="col-2"><button style="font-weight: 500;">Tin t???c</button></div>
                                                  <div class="col-2"> <i class="fa fa-calendar"></i> 31/10/2018
                                                  </div>
                                                  <div class="col-8">
                                                            <a class="smooth cate" href="https://www.wonderfarmonline.com/blogs/tin-tuc/phat-dong-hoi-thi-hoc-sinh-thanh-pho-voi-phap-luat-lan-6-chu-de-tieng-noi-tuoi-tre" title="">Ph??t ?????ng h???i thi "H???c sinh th??nh ph??? v???i ph??p lu???t" l???n 6 ch??? ????? "Ti???ng n??i tu???i tr???"</a>
                                                  </div>
                                        </div>
                                        <div class="row" style="height: 70px;">
                                                  <div class="col-2"><button style="font-weight: 500;">Tin t???c</button></div>
                                                  <div class="col-2"> <i class="fa fa-calendar"></i> 06/06/2018
                                                  </div>
                                                  <div class="col-8">
                                                            <a class="smooth cate" href="https://www.wonderfarmonline.com/blogs/tin-tuc/interfood-tu-hao-tai-tro-cuoc-thi-hoc-sinh-thanh-pho-voi-phap-luat-nam-2017" title="">Interfood t??? h??o t??i tr??? cu???c thi ???H???c sinh th??nh ph??? v???i ph??p lu???t??? n??m 2017</a>
                                                  </div>
                                        </div>
                                        <div class="row">
                                                  <div class="col-2"><button style="font-weight: 500;">Tin t???c</button></div>
                                                  <div class="col-2"> <i class="fa fa-calendar"></i> 26/04/2018
                                                  </div>
                                                  <div class="col-8">
                                                            <a class="smooth cate" href="https://www.wonderfarmonline.com/blogs/tin-tuc/interfood-tai-tro-cho-cuoc-thi-business-to-busines-nam-2013" title="">INTERFOOD t??i tr??? cho cu???c thi Business To Busines n??m 2013</a>
                                                  </div>
                                        </div>
                              </div>
                              <!--End tabs -->
                    </div>
                    <?php include 'includes/footer.php';
                    ob_end_flush();
                    ?>