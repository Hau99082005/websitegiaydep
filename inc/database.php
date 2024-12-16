<?php 
 include 'config/connect.php';
 session_start();
 ob_start();

 class cart {
    public $id, $name, $image, $price, $quantity;
    function __construct($id, $name, $image, $price, $quantity) {
      $this->id = $id;
      $this->name = $name;
      $this->image = $image;
      $this->price = $price;
      $this->quantity = $quantity;

    }
}
 function _header($title) {
    $s = '
     <!DOCTYPE html>
        <html lang="en">
       <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>'.$title.'</title>
        <link rel="apple-touch-icon" sizes="180x180" href="images/android-chrome-192x192.png">
       <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
       <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
       <link rel="manifest" href="images/site.webmanifest">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
     <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <script src="bootstrap/js/bootstrap.bundle.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    ';
    echo $s;
 }

 function _footer() {
    $s = '
        <footer class="footer">
		<div class="footer-area">
			<div class="container">
				<div class="row section_gap">
					<div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Về chúng tôi</h4>
							<ul class="list">
								<li><a href="index.php" style="text-decoration: none;">Trang chủ</a></li>
								<li><a href="sanpham.php" style="text-decoration: none;">Cửa Hàng</a></li>
								<li><a href="sanpham.php" style="text-decoration: none;">Sản phẩm</a></li>
								<li><a href="contact.php" style="text-decoration: none;">Liên Hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget instafeed">
							<h4 class="footer_title">Ảnh sản phẩm</h4>
							<ul class="list instafeed d-flex flex-wrap">';
                             $q = Database::query("SELECT * FROM `products` ORDER BY RAND() LIMIT 6");
                             while($r = $q->fetch_array()) {
								$s .= '<li><img src="sp/'.$r['image'].'" alt="" style="width="80px"; height="80px""></li>';
                             }
							$s .= '</ul>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Liên Hệ</h4>
							<div class="ml-40">
								<p class="sm-head">
									<span class="fa fa-location-arrow"></span>
									Địa chỉ
								</p>
								<p>70 Nguyễn Huệ - Phường Vĩnh Ninh - TP Huế</p>
	
								<p class="sm-head">
									<span class="fa fa-phone"></span>
									Số điện thoại
								</p>
								<p>
									0707545829
								</p>
	
								<p class="sm-head">
									<span class="fa fa-envelope"></span>
									Email
								</p>
								<p>
									hoanglinhle803@gmail.com
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row d-flex">
					<p class="col-lg-12 footer-text text-center">
						<!-- Link back to Colorlib cant be removed. Template is licensed under CC BY 3.0. -->
           &copy;<script>document.write(new Date().getFullYear());</script> Bản quyền thuộc về <i class="fa fa-heart" aria-hidden="true"></i> <a href="index.php" target="_blank"><img src="images/Logo.png" width="30px" height="30px"></a>
				</div>
			</div>
		</div>
	</footer>
  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/skrollr.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
    
    ';
    echo $s;
 }

 function _navbar() {
    if(isset($_GET['id_product'])) {
        addtoCartProduct($_GET['id_product']);
    }
    if(isset($_GET['clear'])) {
        unset($_SESSION['cart']);
    }
    $s = '
       <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.php"><img src="images/Logo.png" alt="" style="width="150px" height="150px""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item active"><a class="nav-link" href="index.php">Trang chủ</a></li>
              <li class="nav-item submenu dropdown">
                <a href="sanpham.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Cửa Hàng</a>
                <ul class="dropdown-menu">';
                 $q = Database::query("SELECT * FROM `categorys`");
                 while($r = $q->fetch_array()) {
                  $s .= '<li class="nav-item"><a class="nav-link" href="sanpham.php?id_category='.$r['id'].'">'.$r['name'].'</a></li>';
                 }
                $s .= '</ul>
							</li>
              <li class="nav-item submenu dropdown">
                <a href="chinhsach.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Chính sách</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="chinhsach.php">Chính sách</a></li>
                </ul>
							</li>
							<li class="nav-item submenu dropdown">
                <a href="hotro.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Hỗ trợ</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="hotro.php">Hỗ trợ</a></li>
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="contact.php">Liên Hệ</a></li>
            </ul>

            <ul class="nav-shop">
              <li class="nav-item"><a href="cart.php" style="text-decoration: none;"><i class="ti-shopping-cart"></i><span class="nav-shop__circle">';
        if(!isset($_SESSION['cart'])) $s.= '0';
        else $s.= count($_SESSION['cart']);
        $s.= '</span></a> </li>';
              if(!isset($_SESSION['user'])) {
              $s .= '<li class="nav-item"><a class="button button-header" href="login.php"><i class="fa fa-user"></i></a></li>';
              }else {
                $s .= '<li class="nav-item"><i class="fa fa-user"></i><p>Chào '.splitName($_SESSION['user']['name']).'</p></li>
                      <a class="fa fa-sign-out" href="dangxuat.php" style="text-decoration: none; color: #000;"></a>     
                ';
              }
            $s .= '</ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
    ';
    echo $s;
 }

 function _hero() {
    $s = '
      <main class="site-main">
        <section class="hero-banner">
            <div class="container">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">';
                $q = Database::query("SELECT * FROM `banner`");
                while($r = $q->fetch_array()) {
                   $s .= '<div class="carousel-item active" data-bs-interval="3000">
                       <img src="images/'.$r['image'].'" class="d-block w-100" alt="...">
                     </div>';
                }
                 $s .= '</div>
                 <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="visually-hidden">Previous</span>
                 </button>
                 <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="visually-hidden">Next</span>
                </button>
            </div>
            </div>
        </section>
    ';
    echo $s;
 }

 function _slider() {
    $s = '
       <section class="section-margin mt-0">
            <div class="owl-carousel owl-theme hero-carousel">';
             $q = Database::query("SELECT * FROM `products` ORDER BY RAND() LIMIT 3");
             while($r = $q->fetch_array()) {
                $s .= '<div class="hero-carousel__slide">
                    <img src="sp/'.$r['image'].'" alt="" class="img-fluid">
                    <a href="';
            
            if (!isset($_SESSION['user'])) {
                $s .= 'login.php';
            } else {
                $s .= 'index.php?id_product=' . intval($r['id']);
            }
            
            $s .= '" class="hero-carousel__slideOverlay" style="text-decoration: none;">
                        <h3>'.$r['name'].'</h3>
                        <p>'.$r['price'].'<sup>đ</sup></p>
                    </a>
                </div>';
             }
            $s .= '</div>
        </section>
    
    ';
    echo $s;
 }

 function _product() {
    $s = '
         <section class="section-margin calc-60px">
            <div class="container">
                <div class="section-intro pb-60px">
                    <h2>Sản phẩm <span class="section-intro__style"> thịnh hành</span></h2>
                </div>
                <div class="row">';
                 $q1 = Database::query("SELECT * FROM `products` ORDER BY RAND() LIMIT 12");
                 while($r1 = $q1->fetch_array()) {
                    $s .= '<div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card text-center card-product">
                            <div class="card-product__img">
                                <img class="card-img" src="sp/'.$r1['image'].'" alt="">
                                <ul class="card-product__imgOverlay">
                                    <li><a href="';
            
            if (!isset($_SESSION['user'])) {
                $s .= 'login.php';
            } else {
                $s .= 'index.php?id_product=' . intval($r1['id']);
            }
            
            $s .= '"><i class="ti-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h4 class="card-product__title">'.$r1['name'].'</h4>
                                <p class="card-product__price">'.$r1['price'].'<sup>đ</sup></p>
                            </div>
                        </div>
                    </div>';
                 }
                $s .= '</div>
            </div>
        </section>
    ';
    echo $s;
 }

 function _selling() {
    $s = '
         <section class="section-margin calc-60px">
            <div class="container">
                <div class="section-intro pb-60px">
                    <h2>Sản phẩm<span class="section-intro__style"> nổi bật</span></h2>
                </div>
                <div class="owl-carousel owl-theme" id="bestSellerCarousel">';
                 $q1 = Database::query("SELECT * FROM `products`");
                 while($r1 = $q1->fetch_array()) {
                    $s .= '<div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="img-fluid" src="sp/'.$r1['image'].'" alt="">
                            <ul class="card-product__imgOverlay">
                                <li><a href="';
            
            if (!isset($_SESSION['user'])) {
                $s .= 'login.php';
            } else {
                $s .= 'index.php?id_product=' . intval($r1['id']);
            }
            
            $s .= '" style="text-decoration: none;"><i class="ti-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h4 class="card-product__title"><a href="single-product.html" style="text-decoration: none;">'.$r1['name'].'</a></h4>
                            <p class="card-product__price">'.$r1['price'].'<sup>đ</sup></p>
                        </div>
                    </div>';
                 }
                $s .= '</div>
            </div>
        </section>
    
    ';
    echo $s;
 }

 function _blog() {
    $s = '
          <section class="blog">
            <div class="container">
                <div class="section-intro pb-60px">
                    <h2>Tin <span class="section-intro__style">Tức</span></h2>
                </div>

                <div class="row">';
                $q2 = Database::query("SELECT * FROM `news`");
                while($r2 = $q2->fetch_array()) {
                    $s .= '<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="card card-blog">
                            <div class="card-blog__img">
                                <img class="card-img rounded-0" src="images/'.$r2['image'].'" alt="">
                            </div>
                            <div class="card-body">
                                <ul class="card-blog__info">
                                    <li><span><i class="fa-solid fa-calendar-days"></i>'.$r2['day'].'</span></li>
                                </ul>
                                <h4 class="card-blog__title"><span>'.$r2['title'].'</span></h4>
                                <p>'.$r2['pagraph'].'</p>
                            </div>
                        </div>
                    </div>';
                }
                $s .= '</div>
            </div>
        </section>
        <!-- ================ Blog section end ================= -->



    </main>

    
    ';
    echo $s;
 }

 function sanpham() {
    $s = '';
    // Kiểm tra và lọc id_category từ GET
    $id_category = isset($_GET['id_category']) ? intval($_GET['id_category']) : null;

    // Lấy danh sách categories
    $queryCategory = $id_category 
        ? "SELECT * FROM `categorys` WHERE id = $id_category" 
        : "SELECT * FROM `categorys`";

    $q = Database::query($queryCategory);

    // Duyệt qua danh sách categories
    while ($r = $q->fetch_array()) {
        $s .= '	  
        <section class="section-margin--small mb-5">
          <div class="container">
            <div class="row">
              <!-- Sidebar Filter -->
              <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-filter">
                  <div class="top-filter-head">Sản phẩm</div>
                  <!-- Filter by Brand -->
                  <div class="common-filter">
                    <form action="#" method="post">
                      <ul>';
                      
                      // Truy vấn 5 sản phẩm ngẫu nhiên
                      $qProducts = Database::query("SELECT `name` FROM `products` ORDER BY RAND() LIMIT 5");
                      while ($product = $qProducts->fetch_array()) {
                          $s .= '<li class="filter-list">
                              <input class="pixel-radio" type="radio" id="'.$product['name'].'" name="brand">
                              <label for="'.$product['name'].'">'.$product['name'].'</label>
                          </li>';
                      }
                      
                      $s .= '</ul>
                    </form>
                  </div>
                  <!-- Filter by Color -->
                  <div class="common-filter">
                    <div class="head">Màu</div>
                    <form action="#" method="">
                      <ul>';
                      
                      // Lấy màu sắc không trùng lặp
                      $qColors = Database::query("SELECT DISTINCT `color` FROM `products` ORDER BY RAND() LIMIT 5");
                      while ($color = $qColors->fetch_array()) {
                          $s .= '<li class="filter-list">
                              <input class="pixel-radio" type="radio" id="'.$color['color'].'" name="color">
                              <label for="'.$color['color'].'">'.$color['color'].'</label>
                          </li>';
                      }
                      
                      $s .= '</ul>
                    </form>
                  </div>
                </div>
              </div>

              <!-- Product List -->
              <div class="col-xl-9 col-lg-8 col-md-7">
                <section class="lattest-product-area pb-40 category-list">
                  <div class="row">';

                  // Lấy sản phẩm theo danh mục
                  $queryProducts = $id_category
                      ? "SELECT * FROM `products` WHERE id_category = $id_category LIMIT 9"
                      : "SELECT * FROM `products` WHERE id_category = " . intval($r['id']) . " LIMIT 9";

                  $qProductsList = Database::query($queryProducts);

                  while ($product = $qProductsList->fetch_array()) {
                      $s .= '<div class="col-md-6 col-lg-4">
                          <div class="card text-center card-product">
                            <div class="card-product__img">
                              <img class="card-img" src="sp/'.$product['image'].'" alt="">
                              <ul class="card-product__imgOverlay">
                                <li><a href="' . 
                                (!isset($_SESSION['user']) ? 'login.php' : 'sanpham.php?id_product=' . intval($product['id'])) . 
                                '"><i class="ti-shopping-cart"></i></a></li>
                              </ul>
                            </div>
                            <div class="card-body">
                              <h4 class="card-product__title">'.$product['name'].'</h4>
                              <p class="card-product__price">'.$product['price'].'<sup>đ</sup></p>
                            </div>
                          </div>
                        </div>';
                  }
                  
                  $s .= '</div>
                </section>
              </div>
            </div>
          </div>
        </section>';

        // Sản phẩm hàng đầu
        $s .= '<section class="related-product-area">
          <div class="container">
            <div class="section-intro pb-60px">
              <h2>Sản phẩm <span class="section-intro__style">hàng đầu</span></h2>
            </div>
            <div class="row mt-30">';

              // Lấy 12 sản phẩm ngẫu nhiên
              $qTopProducts = Database::query("SELECT *  FROM `products` ORDER BY RAND() LIMIT 12");
              while ($topProduct = $qTopProducts->fetch_array()) {
                  $s .= '<div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                    <div class="single-search-product-wrapper">
                      <div class="single-search-product d-flex">
                        <img src="sp/'.$topProduct['image'].'" alt="">
                        <div class="desc">
                            <a href="' . 
                                (!isset($_SESSION['user']) ? 'login.php' : 'sanpham.php?id_product=' . intval($topProduct['id'])) . 
                                '" style="text-decoration: none; font-size: 20px;" class="title">'.$topProduct['name'].'</a>
                            <div class="price">'.$topProduct['price'].'<sup>đ</sup></div>
                        </div>
                      </div>
                    </div>
                  </div>';
              }
              
              $s .= '</div>
          </div>
        </section>';
    }

    echo $s;
}

 function _contact() {
    $s = '
      <section class="section-margin--small">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.353684910666!2d107.58544287460766!3d16.457619228924464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a14771646be3%3A0x2fd0ad0d9227d5b0!2zNzAgTmd1eeG7hW4gSHXhu4csIFbEqW5oIE5pbmgsIEh14bq_LCBUaOG7q2EgVGhpw6puIEh14bq_LCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1734363678228!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <div class="row">
        <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Huế, Việt Nam</h3>
              <p>70 Nguyễn Huệ, Phường Vĩnh Ninh</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-headphone"></i></span>
            <div class="media-body">
              <h3><a href="tel:0707545829">0707545829</a></h3>
              <p>thứ hai đến thứ 6: 6:00am - 10:00pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><a href="mailto:hoanglinhle803@gmail.com">hoanglinhle803@gmail.com</a></h3>
              <p>Gửi cho chúng tôi truy vấn của bạn bất cứ lúc nào!</p>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-lg-9">
          <form action="#/" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Nhập tên của bạn">
                </div>
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" placeholder="Nhập địa chỉ email của bạn">
                </div>
              </div>
              <div class="col-lg-7">
                <div class="form-group">
                    <textarea class="form-control different-control w-100" name="message" id="message" cols="30" rows="5" placeholder="Tin nhắn bạn gửi"></textarea>
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-right mt-3">
              <button type="submit" class="button button--active button-contactForm">Gửi</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
    
    ';
    echo $s;
}

function _chinhsach() {
    $s = '
        <section class="blog_categorie_area">
    <div class="container">
      <div class="row">';
       $q1 = Database::query("SELECT * FROM `news`");
       while($r1 = $q1->fetch_array()) {
        $s .= '<div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
            <div class="categories_post">
                <img class="card-img rounded-0" src="images/'.$r1['image'].'" alt="post">
                <div class="categories_details">
                    <div class="categories_text">
                            <h5>'.$r1['title'].'</h5>
                    </div>
                </div>
            </div>
        </div>';
       }
      $s .= '</div>
    </div>
  </section>
  <section class="blog_area">
      <div class="container">
          <div class="row">
              <div class="col-lg-8">
                  <div class="blog_left_sidebar">
                      <article class="row blog_item">
                        <h2>Chính sách</h2>
                          <div class="col-md-9">';
                           $q2 = Database::query("SELECT * FROM `chinhsach`");
                           while($r2 = $q2->fetch_array()) {
                              $s .= '<div class="blog_post">
                                  <div class="blog_details">
                                          <h2>'.$r2['title_container'].'</h2>
                                          <h4>'.$r2['title'].'</h4>
                                      <p>'.$r2['pagraph'].'</p>
                                  </div>
                              </div>';
                           }
                          $s .= '</div>
                      </article>
                  
                  </div>
              </div>
          </div>
      </div>
  </section>
 
<section class="instagram_area">
    <div class="container box_1620">
        <div class="insta_btn text-center mb-4">
            <p class="btn theme_btn">Follow us on Instagram</p>
        </div>
        <div class="instagram_image row justify-content-center">';
            $q = Database::query("SELECT * FROM `products` ORDER BY RAND() LIMIT 6");
            while ($r = $q->fetch_array()) {
                $s .='<div class="col-2 text-center mb-3">
                          <img src="sp/'.$r['image'].'" alt="" class="img-fluid insta-img">
                      </div>';
            }
        $s .= '</div>
    </div>
</section>

    ';
    echo $s;
}

function _hotro() {
    $s = '
  <section class="blog_area">
      <div class="container">
          <div class="row">
              <div class="col-lg-8">
                  <div class="blog_left_sidebar">
                      <article class="row blog_item">
                        <h2>Hỗ trợ</h2>
                          <div class="col-md-9">';
                           $q2 = Database::query("SELECT * FROM `hotro`");
                           while($r2 = $q2->fetch_array()) {
                              $s .= '<div class="blog_post">
                                  <div class="blog_details">
                                          <h2>'.$r2['title_container'].'</h2>
                                          <h4>'.$r2['title'].'</h4>
                                      <p>'.$r2['pagraph'].'</p>
                                  </div>
                              </div>';
                           }
                          $s .= '</div>
                      </article>
                  
                  </div>
              </div>
          </div>
      </div>
  </section>
 
<section class="instagram_area">
    <div class="container box_1620">
        <div class="insta_btn text-center mb-4">
            <p class="btn theme_btn">Follow us on Instagram</p>
        </div>
        <div class="instagram_image row justify-content-center">';
            $q = Database::query("SELECT * FROM `products` ORDER BY RAND() LIMIT 6");
            while ($r = $q->fetch_array()) {
                $s .='<div class="col-2 text-center mb-3">
                          <img src="sp/'.$r['image'].'" alt="" class="img-fluid insta-img">
                      </div>';
            }
        $s .= '</div>
    </div>
</section>

    ';
    echo $s;
}

function login() {
    if (isset($_POST['emailphone']) && isset($_POST['password'])) {
        if (is_numeric($_POST['emailphone'])) {
            $x = 'phone';
        } else {
            $x = 'email';
        }
        
        $q = Database::query("SELECT * FROM users WHERE $x = '{$_POST['emailphone']}' AND password = '{$_POST['password']}'");
        if ($r = $q->fetch_array()) {
            if ($r['role'] == 'admin') {
                header("Location: admin.php");
            } else {
                $_SESSION['user'] = $r;
                if (isset($_POST['remember_me'])) {
                    setcookie('emailphone', $_POST['emailphone'], time() + (86400 * 30), "/"); 
                    setcookie('password', $_POST['password'], time() + (86400 * 30), "/"); 
                } else {
                    setcookie('emailphone', '', time() - 3600, "/");
                    setcookie('password', '', time() - 3600, "/");
                }
                
                header("Location:  index.php");
            }
        } else {
            $_SESSION['login_fail'] = 'Dữ liệu nhập không chính xác!!!';
            header("Location: dangnhap.php");
        }
    }

    $saved_emailphone = isset($_COOKIE['emailphone']) ? $_COOKIE['emailphone'] : '';
    $saved_password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
    $s = '
	<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>Bạn chưa có tài khoản?</h4>
							<p>Hãy đăng ký thành viên của website chúng tôi để trải nghiệm với tư cách thành viên.</p>
							<a class="button button-account" href="register.php" style="text-decoration: none;">Tạo tài khoản</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Đăng Nhập</h3>';
           if (isset($_SESSION['login_fail'])) {
               $s .= '<div style="color: red;">'.$_SESSION['login_fail'].'</div>';
               unset($_SESSION['login_fail']); 
           }
           
            $s .= '<form class="row login_form" action="" method="post" id="contactForm" >
							<div class="col-md-12 form-group">
								<input type="text" name="emailphone" class="form-control form-control-lg"
                          placeholder="Nhập vào số điện thoại hoặc email của bạn" value="' .$saved_emailphone.'" />
							</div>
							<div class="col-md-12 form-group">
								 <input type="password" name="password" class="form-control form-control-lg"
                placeholder="Nhập vào mật khẩu" id="password" value="'.$saved_password.'" />
                <button type="button" onclick="togglePassword()" class="btn btn-secondary btn-sm mt-2">Hiện/Ẩn mật khẩu</button>
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									 <input class="form-check-input me-2" type="checkbox" name="remember_me" value="1" id="form2Example3"' . (!empty($saved_emailphone) ? ' checked' : '') . ' />
                    <label class="form-check-label" for="form2Example3">
                        Ghi nhớ mật khẩu    
                    </label>
								</div>
                                <a href="#!" class="text-body" style="text-decoration: none;">Quên mật khẩu?</a>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="button button-login w-100">Đăng Nhập</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
      <script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
    </script>
    ';
    echo $s;
}

function splitName($str){
    $rs = NULL;
    $word = mb_split(' ', $str);
    $n = count($word)-1;
    if ($n > 0) {$rs = $word[$n];}

    return $rs;
}
function register() {
    $errName = $errPhone = $errPass = $errRepass = '';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty($_POST['name'])) {
            $errName = "Vui lòng nhập vào tên của bạn!";
        }
        if (empty($_POST['phone'])) {
            $errPhone = "Cần có 1 số điện thoại!";
        } else {
            if (!preg_match('/^\d{10}$/', $_POST['phone'])) {
                $errPhone = "Số điện thoại phải có đúng 10 chữ số!";
            } else {
                $phoneCheckQuery = "SELECT COUNT(*) FROM users WHERE phone='" . $_POST['phone'] . "'";
                $phoneCheckResult = Database::query($phoneCheckQuery);
                $phoneExists = $phoneCheckResult->fetch_array()[0];

                if ($phoneExists > 0) {
                    $errPhone = "Số điện thoại đã tồn tại!";
                }
            }
        }
        if (empty($_POST['pass'])) {
            $errPass = "Vui lòng nhập mật khẩu!";
        }
        if (empty($_POST['repass'])) {
            $errRepass = "Vui lòng xác nhận mật khẩu!";
        } else {
            if ($_POST['pass'] != $_POST['repass']) {
                $errRepass = "Mật khẩu không khớp!";
            }
        }
        if ($errName == '' && $errPhone == '' && $errPass == '' && $errRepass == '') {
            $insertQuery = "INSERT INTO users(name, phone, password, role) VALUES('".$_POST['name']."', '".$_POST['phone']."', '".$_POST['pass']."', '')";
            Database::query($insertQuery);
            $userQuery = "SELECT * FROM users WHERE phone='" . $_POST['phone'] . "' AND password='" . $_POST['pass'] . "'";
            $userResult = Database::query($userQuery);
            $_SESSION['user'] = $userResult->fetch_array();
            header("location: index.php");
        }
    }
    $s = '
       <section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>Bạn đã có tài khoản?</h4>
							<p>Hãy tiếp tục mua sắm trên website chúng tôi.</p>
							<a class="button button-account" href="login.php">Đăng nhập</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner register_form_inner">
						<h3>Tạo tài khoản</h3>
						<form class="row login_form" action="" method="post" id="register_form" >
							<div class="col-md-12 form-group">
								 <input type="text" name="name" class="form-control" placeholder="username" />
                                  <span style="color: red;">'.$errName.'</span>
							</div>
							<div class="col-md-12 form-group">
								 <input type="text" name="phone" class="form-control" placeholder="phone" />
                                  <span style="color: red;">'.$errPhone.'</span>
              </div>
              <div class="col-md-12 form-group">
								 <input type="password" id="pass" name="pass" class="form-control"  placeholder="mật khẩu"/>
                            <span style="color: red;">'.$errPass.'</span>
                            <input type="checkbox" onclick="togglePassword(\'pass\')"> Hiển thị mật khẩu
              </div>
              <div class="col-md-12 form-group">
					        <input type="password" id="repass" name="repass" class="form-control" placeholder="xác nhận mật khẩu" />
                            <span style="color: red;">'.$errRepass.'</span>
                            <input type="checkbox" onclick="togglePassword(\'repass\')"> Hiển thị mật khẩu
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="button button-register w-100">Đăng ký</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
      <script>
        function togglePassword(fieldId) {
            var field = document.getElementById(fieldId);
            if (field.type === "password") {
                field.type = "text";
            } else {
                field.type = "password";
            }
        }
        </script>
    ';
    echo $s;
}

function cart() {
    $total = 0.0;
    // Xử lý xóa từng sản phẩm
    if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
        $deleteIndex = (int)$_GET['delete'];
        if (isset($_SESSION['cart'][$deleteIndex])) {
            unset($_SESSION['cart'][$deleteIndex]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Reset lại index
        }
    }
    // Xử lý cập nhật số lượng
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
        foreach ($_POST['quantities'] as $index => $quantity) {
            if (isset($_SESSION['cart'][$index]) && is_numeric($quantity) && $quantity > 0) {
                $_SESSION['cart'][$index]->quantity = (int)$quantity;
            }
        }
    }
    // Tính tổng tiền
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $item_total = $item->quantity * $item->price * 1000;
            $total += $item_total;
        }
    }
    // Hiển thị giỏ hàng
    $s = ' 
        <section class="cart_area section-margin--small">
            <div class="container">
                <form method="POST" action="">
                    <div class="cart_inner">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-white">
                                    <tr>
                                        <th scope="col">Sản phẩm</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Tổng tiền</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                    foreach ($_SESSION['cart'] as $index => $item) {
                                        $item_total = $item->quantity * $item->price * 1000;
                                        $s .= '<tr>
                                            <td>'.$item->name.'</td>
                                            <td><img src="sp/'.$item->image.'" alt="'.$item->name.'" width="80" height="80"></td>
                                            <td>'.$item->price.'<sup>đ</sup></td>
                                            <td>
                                                <input type="number" name="quantities['.$index.']" value="'.$item->quantity.'" min="1" class="form-control" style="width: 70px;">
                                            </td>
                                            <td>'.number_format($item_total, 0, '.', '.').'<sup>đ</sup></td>
                                            <td>
                                                <a href="?delete='.$index.'" class="btn btn-danger btn-sm" onclick="return confirm(Xóa sản phẩm này?)">
                                                    <i class="ti-trash"></i> Xóa
                                                </a>
                                            </td>
                                        </tr>';
                                    }
                                } else {
                                    $s .= '<tr>
                                        <td colspan="6" class="text-center">Giỏ hàng của bạn đang trống!</td>
                                    </tr>';
                                }
                                $s .= '</tbody>
                            </table>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="index.php" class="btn btn-outline-primary">Tiếp tục mua hàng</a>
                                <button type="submit" name="update_cart" class="btn btn-warning">Cập nhật giỏ hàng</button>
                                <h4 class="text-success">Tổng tiền: <span class="text-danger">'.number_format($total,0, '.', '.').'<sup>đ</sup></span></h4>
                                <a href="checkout.php" class="btn btn-success">Thanh toán</a>
                                <a href="cart.php?clear=OK" class="btn btn-info" style="text-decoration: none;"><span class="fa fa-trash"></span></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>';
    echo $s;
}

function checkout() {
    // Lấy giỏ hàng từ session
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $total = 0;

    // Tính tổng tiền
    foreach ($cart as $item) {
        $total += $item->quantity * $item->price * 1000;
    }

    // Bắt đầu HTML
    $s = '
    <section class="checkout_area section-margin--small">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Chi tiết thanh toán</h3>
                        <!-- FORM Thanh Toán -->
                        <form class="row contact_form" action="process_order.php" method="post">
                            <div class="col-md-6 form-group p_star">
                                <p>Họ Tên <span>*</span></p>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <p>Địa Chỉ <span>*</span></p>
                                <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ của bạn" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <p>Số điện thoại <span>*</span></p>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <p>Ghi chú</p>
                                <input type="text" name="note" class="form-control" placeholder="Ghi chú về đơn hàng (nếu có)">
                            </div>
                            
                            <!-- Hiển thị đơn hàng -->
                            <div class="col-lg-4">
                                <div class="order_box">
                                    <h2>Đơn Hàng Của Bạn</h2>
                                    <ul class="list">
                                        <li><h4>Sản phẩm <span>Tổng tiền</span></h4></li>';

                                        foreach ($cart as $item) {
                                            $item_total = $item->quantity * $item->price * 1000;
                                            $s .= '<li>
                                                <p>'.$item->name.' 
                                                <span class="middle">x '.$item->quantity.'</span> 
                                                <span class="last">'.number_format($item_total, 0, '.', '.').'</span></p>
                                            </li>';
                                        }

                                        $s .= '</ul>
                                    <ul class="list list_2">
                                        <li>
                                            <span>Tổng tiền </span>
                                            <span>'.number_format($total, 0, '.', '.').' VND</span>
                                        </li>
                                    </ul>

                                    <!-- Nút Submit -->
                                    <div class="text-center">
                                        <button type="submit" class="button button-paypal">Tiếp tục thanh toán</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </section>';

    echo $s;
}

function addtoCartProduct($id_product) {
    $q = Database::query("SELECT * FROM `products` WHERE id =". $id_product);
    $r = $q->fetch_array();
    if(isset($_SESSION['cart'])) {
        $a = $_SESSION['cart'];
        for($i = 0; $i <count($a); $i++) 
            if($r['id']==$a[$i]->id)break;
        if($i<count($a))$a[$i]->quantity++;
        else  $a[count($a)] = new cart($r['id'], $r['name'], $r['image'], $r['price'], 1);
        
    }else {
        $a = array();
        $a[0] = new cart($r['id'], $r['name'], $r['image'], $r['price'], 1);
    }
    $_SESSION['cart'] = $a;
}

?>

