<!DOCTYPE html>
<html>
    <head>
        <title>Mobile Planet - Cửa hàng di động hàng đầu</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/ulg/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="/styles/style.css">
        <script src="/scripts/script.js"></script>
    </head>
    <body>
        <div class="wrapper">

            <header class="header">
                <div class="dynamic-container">
                    <a href="index.php" style="color: black;"><h3 class="my-title">mobileplanet.com</h3></a>
                    <div class="menu-group">
                        <form class="form-group form-outline float-left" action="search.php" method="$_GET">
                            <div class="form-group form-outline float-left">
                                <input type="text" id="search" name="keyword" class="form-control float-left" placeholder="Tìm kiếm sản phẩm..."/>
                            </div>
                            <button type="submit" class="btn my-button float-left">
                                <i class="bi-search"></i>
                            <span class="top-button-text">Tìm kiếm</span>
                            </button>
                        </form>
                        <button type="button" class="btn my-button float-left">
                            <i class="bi-cart"></i>
                            <a href="cart_invoke.php">
                                <span class="top-button-text">Giỏ hàng</span>
                            </a>
                        </button>
                        <button type="button" class="btn my-button float-left">
                            <i class="bi-person"></i>
                            <a href="user_invoke.php">
                                <span class="top-button-text">Tài khoản</span>
                            </a>
                        </button>
                    </div>
                </div>
            </header>

            <nav class="nav-bar">
                <div class="dynamic-container">
                    <div class="row">
                        <div class="col-6 col-lg-3 nav-element">
                            <i class="bi-phone"></i>
                            <label>ĐIỆN THOẠI DI ĐỘNG</label>
                            <a href="phone_category.php" class="stretched-link"></a>
                        </div>
                        <div class="col-6 col-lg-3 nav-element">
                            <i class="bi-tablet"></i>
                            <label>MÁY TÍNH BẢNG</label>
                            <a href="tablet_category.php" class="stretched-link"></a>
                        </div>
                        <div class="col-6 col-lg-3 nav-element">
                            <i class="bi-laptop"></i>
                            <label>MÁY TÍNH XÁCH TAY</label>
                            <a href="laptop_category.php" class="stretched-link"></a>
                        </div>
                        <div class="col-6 col-lg-3 nav-element">
                            <i class="bi-headphones"></i>
                            <label>PHỤ KIỆN</label>
                            <a href="accessories_category.php" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </nav>

            <main class="content dynamic-container">

                <div class="banner row">
                    <div id="main-banner" class="col-12 col-lg-8">
                        <div id="banner-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">                  
                            <?php 
                                require_once($_SERVER['DOCUMENT_ROOT']."/controllers/index_controller.php");
                                $controller = new IndexController();
                                $controller->special_offer_invoke(3);
                            ?>
                            </div>
                            <a class="carousel-control-prev" href="#banner-carousel" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#banner-carousel" role="button" data-slide="next">
                              <span class="carousel-control-next-icon"></span>
                            </a>
                          </div>
                    </div>
                    <div style="min-height: 100%;" class="col-12 col-lg-4">      
                        <?php 
                            require_once($_SERVER['DOCUMENT_ROOT']."/controllers/index_controller.php");
                            $controller = new IndexController();
                            $controller->special_offer_invoke(2); 
                        ?>
                    </div>
                </div>

                <h3 class="title">Điện thoại nổi bật</h3>
                <div id="phones-carousel" style="min-height: 425px;" class="carousel slide my-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php 
                            require_once($_SERVER['DOCUMENT_ROOT']."/controllers/index_controller.php");
                            $controller = new IndexController();
                            $controller->product_invoke("Điện thoại di động");
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#phones-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#phones-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>

                <h3 class="title">Máy tính bảng nổi bật</h3>
                <div id="tablet-carousel" class="carousel slide my-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                    <?php 
                        require_once($_SERVER['DOCUMENT_ROOT']."/controllers/index_controller.php");
                        $controller = new IndexController();
                        $controller->product_invoke("Máy tính bảng");         
                    ?>
                    </div>
                    <a class="carousel-control-prev" href="#tablet-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#tablet-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>

                <h3 class="title">Laptop nổi bật</h3>
                <div id="laptop-carousel" class="carousel slide my-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php 
                            require_once($_SERVER['DOCUMENT_ROOT']."/controllers/index_controller.php");
                            $controller = new IndexController();
                            $controller->product_invoke("Máy tính xách tay");         
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#laptop-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#laptop-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>

                <h3 class="title">Phụ kiện nổi bật</h3>
                <div id="accessories-carousel" class="carousel slide my-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php 
                            require_once($_SERVER['DOCUMENT_ROOT']."/controllers/index_controller.php");
                            $controller = new IndexController();
                            $controller->product_invoke("Phụ kiện");
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#accessories-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#accessories-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>

            </main>

            <footer class="footer">
                <div class="dynamic-container">
                    <div class="float-left">
                        <h6>CÔNG TY CỔ PHẦN HÀNH TINH DI ĐỘNG</h6>
                        <label>123 - 124 Nguyễn Văn A, Phường 2, Quận 10, TP. Hồ Chí Minh</label>
                        <h6>Liên hệ:</h6>
                        <label>0901 0000 - 0902 0000</label><br/>
                        <label>cskh@mobileplanet.com</label><br/>
                    </div>
                    <div id="social-media-logo" class="float-right">
                        <a class="mr-2" href="https://www.facebook.com/" target="_blank">
                            <i class="bi-facebook" style="color: black; font-size: 1.5rem;"></i>
                        </a>
                        <a class="mr-2" href="https://twitter.com/" target="_blank">
                            <i class="bi-twitter" style="color: black; font-size: 1.5rem;"></i>
                        </a>
                        <a href="https://www.youtube.com/" target="_blank">
                            <i class="bi-youtube" style="color: black; font-size: 1.5rem;"></i>
                        </a>
                    </div>
                </div>
            </footer>

        </div>
    </body>
</html>