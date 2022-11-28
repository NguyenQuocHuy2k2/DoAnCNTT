<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/protype.php";
require "models/user.php";
$product = new Product;
$protype = new Protype;
$user = new User;
$getAllProducts = $product->getAllProducts();
$getAllNewProducts = $product->getAllNewProducts();
$getTopSellingProducts = $product->getTopSellingProducts();
?>
<?php
    include "topheader.php"
?>
<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="tel:0935540795"><i class="fa fa-phone"></i> 0935.540.795</a></li>
                    <li><a href="mailto:duyhoang04244@gmail.com"><i class="fa fa-envelope-o"></i> duyhoang042444@gmail.com</a></li>
                    <li><a href="https://goo.gl/maps/HATUMepFByXb91iT7"><i class="fa fa-map-marker"></i> 01 Võ Văn Ngân - Phường Linh Chiểu - Thành phố Thủ Đức</a></li>
                </ul>
                <ul class="header-links pull-right">
                   
                    <li><a href="login/index.php"><i class="fa fa-user-o"></i> Đăng nhập</a></li>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="index.php" class="logo">
                                <img src="./img/logobandoan.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->
              
                    <!-- SEARCH BAR -->
                   <div class="col-md-6">
                        <div class="header-search">
                            <form method="get" action="result.php">
                                <select class="input-select" name="searchCol">
                                    <option value="0">Tất cả</option>
                                    <option value="1">Trái cây</option>
                                    <option value="2">Bánh ngọt</option>
                                    <option value="3">Rau củ</option>
                                </select>
                                <input name="keyword" class="input" placeholder="Tìm kiếm">
                                <button type="submit" class="search-btn">Tìm</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">

                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-bag"></i>
                                    <span>Giỏ hàng</span>
                                    <?php
                                    $temp = 0;
                                   if(isset($_SESSION['cart'])){
                                    foreach ($_SESSION['cart'] as $value) {
                                        $temp+=1;
                                    }
                                   }
                                    ?>
                                    <div class="qty"><?php echo $temp; ?></div>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list"><?php $totalPrice = 0;
                                                            $totalProduct = 0; ?>
                                        <?php if (isset($_SESSION['cart'])) :

                                            foreach ($_SESSION['cart'] as $key => $qty) :
                                                $getAllProducts =  $product->getAllProducts();
                                                foreach ($getAllProducts as $value) :
                                                    if ($value['id'] == $key) : ?>
                                                        <?php $totalPrice += $value['price'] * $qty;
                                                        $totalProduct += 1;
                                                        ?>
                                                        <div class="product-widget">
                                                            <div class="product-img">
                                                                <img src="./img/<?php echo $value['pro_image'] ?>" alt="">
                                                            </div>
                                                            <div class="product-body">
                                                                <h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
                                                                <h4 class="product-price"><span class="qty"><?php echo $qty ?>x</span><?php echo number_format($value['price']) ?>VND</h4>
                                                            </div>
                                                            <a href="delcart1.php?id=<?php echo $value['id'] ?>"><button class="delete"><i class="fa fa-close"></i></button></a>
                                                        </div>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </div>
                                    <div class="cart-summary">
                                        <small><?php echo $totalProduct ?> Sản phẩm</small>
                                        <h5>SUBTOTAL: <?php echo number_format($totalPrice) ?></h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="cart.php?type_id=1">Xem giỏ hàng</a>
                                        <a href="./login/index.php">Xem đơn hàng <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">

                    <?php
					$getAllProtype = $protype->getAllProtype();
					if (isset($_GET['type_id'])) : ?>
                    <li><a href="index.php">Home</a></li>
                    <?php
						$type_id = $_GET['type_id'];
						foreach ($getAllProtype as $value) :
						?>
                    <li <?php if($type_id==$value['type_id']) echo 'class="active"' ?>><a
                            href="products.php?type_id=<?php echo $value['type_id'] ?>">
                            <?php echo $value['type_name'] ?></a></li>
                    <?php endforeach; ?>
                    <?php else : ?>
                    <li class="active"><a href="index.php">Home</a></li>
                    <?php
						$getAllProtype = $protype->getAllProtype();

						foreach ($getAllProtype as $value) :
						?>
                    <li><a href="products.php?type_id=<?php echo $value['type_id'] ?>">
                            <?php echo $value['type_name'] ?></a></li>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->