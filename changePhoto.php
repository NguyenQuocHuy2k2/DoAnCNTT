<style type="text/css">
    body {
        background: #f7f7ff;
        margin-top: 20px;
    }

    .main-body {
        padding: 15px;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid transparent;
        border-radius: .25rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
    }

    .me-2 {
        margin-right: .5rem !important;
    }
</style>

<?php
session_start();
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Capple - Website bán đồ ăn, trái cây, rau củ trực tuyến</title>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />


</head>

<!-- HEADER -->
<header>

<div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                <li><a href="tel:0935540795"><i class="fa fa-phone"></i> 0935.540.795</a></li>
                    <li><a href="mailto:duyhoang04244@gmail.com"><i class="fa fa-envelope-o"></i> duyhoang042444@gmail.com</a></li>
                    <li><a href="https://goo.gl/maps/HATUMepFByXb91iT7"><i class="fa fa-map-marker"></i> 01 Võ Văn Ngân - Phường Linh Chiểu - Thành phố Thủ Đức</a></li>
                </ul>
                <ul class="header-links pull-right">
                   <!--  <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li> -->
                    <?php $getLastname = $user->getLastname($_SESSION['user']); ?>
                    <li><a href="profile.php"><i class="<?php if ($_SESSION['permision'] == 1) {
                                                            echo "fa fa-user-secret";
                                                        } else {
                                                            echo "fa fa-user";
                                                        } ?>"></i> Xin chào <?php foreach ($getLastname as $value) {
                                                                                echo $value['Last_name'];
                                                                            } ?></a></li>

                    <li><a href="admin/logoutuser.php"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>

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
                                <input name="keyword" class="input" placeholder="tìm kiếm">
                                <button type="submit" class="search-btn">Tìm</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <!-- /Wishlist -->




                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
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
                                                            <button class="delete"><i class="fa fa-close"></i></button>
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
                                        <a href="orders.php">Xem đơn hàng <i class="fa fa-arrow-circle-right"></i></a>
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

</header>
<!-- /HEADER -->
<!--   <meta charset="utf-8"> -->
<!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
<!--  All snippets are MIT license http://bootdey.com/license -->

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Main content -->
        <section class="content">
            <form action="changePT.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $getUserById = $user->getUserById($_GET['user_id']);
                        foreach ($getUserById as $values) : ?>
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">User_ID</label>
                                        <input readonly value="<?php echo $values['user_id'] ?>" type="text" id="inputID" class="form-control" name="user_id">
                                    </div>
                                    <div class="form-group">
                                        <img style="width:50px" src="./img/<?php echo $values['image'] ?>" alt="">
                                        <input type="file" name="image" id="fileToUpload">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" name="submit" value="Change Photo" style="background-color: #80bb35;" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include "footer.php" ?>