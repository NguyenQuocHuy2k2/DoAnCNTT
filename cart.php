<?php session_start() ?>
<?php if (isset($_SESSION['user'])) {
    include "headeruser.php";
} else {
    include "header.php";
}
// if(isset($_GET['type_id'])){
//     if ($_GET['type_id']=='1') {
//         echo "<script> alert('Giá trị đơn hàng phải lớn hơn 100.000VNĐ'); </script>";
//         echo '<script>window.history.pushState({}, document.title, "/" + "location:"cart.php");</script>';
//     }}
?>

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="css/font-awesome.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/style1.css">
<link rel="stylesheet" href="css/responsive.css">
</head>

<body>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">sản phẩm</th>
                                            <th class="product-price">giá</th>
                                            <th class="product-quantity">số lượng</th>
                                            <th class="product-subtotal">tổng giá</th>
                                        </tr>
                                    </thead>
                                    <?php $total = 0;
                                    ?>
                                    <?php if (isset($_SESSION['cart'])) : ?>
                                        <?php foreach ($_SESSION['cart'] as $key => $qty) : ?>
                                            <?php $getAllProducts =  $product->getAllProducts();
                                            ?>
                                            <?php foreach ($getAllProducts as $value) : ?>
                                                <?php if ($value['id'] == $key) : ?>
                                                    <tbody>
                                                       
                                                            <tr class="cart_item">
                                                                <td class="product-remove">
                                                                    <a title="Remove this item" class="remove" href="delcart.php?id=<?php echo $key ?>&type_id=<?php echo $_GET['type_id'] ?>">×</a>
                                                                </td>

                                                                <td class="product-thumbnail">
                                                                    <a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="img/<?php echo $value['pro_image'] ?>"></a>
                                                                </td>

                                                                <td class="product-name" style="max-width: 440px;">
                                                                    <a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a>
                                                                </td>

                                                                <td class="product-price">
                                                                    <span class="amount"><?php echo number_format($value['price']) ?>VND</span>
                                                                </td>

                                                                <td class="product-quantity">
                                                                    <div class="quantity buttons_added">
                                                                        <!--     <input type="button" class="minus" value="-"> -->
                                                                        <a href="subtractqty.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $_GET['type_id'] ?>"><input type="button" class="minus" value="-"></a>
                                                                        <input type="text" size="1" class="input-text qty text" title="Qty" value="<?php echo $qty ?>">
                                                                        <a href="addqty.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $_GET['type_id'] ?>"><input type="button" class="plus" value="+"></a>
                                                                        <!--    <input type="button" class="plus" value="+"> -->
                                                                    </div>
                                                                </td>

                                                                <td class="product-subtotal">
                                                                    <span class="amount"><?php echo number_format($value['price'] * $qty);
                                                                    $total += $value['price'] * $qty; ?>VND</span>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="actions" colspan="6">
                                                                    <div class="add-to-cart">
                                                                    <button class="add-to-cart-btn"><a style="text-decoration: none;" href="./check.php?id=<?php echo $value['id'] ?>"><i class="fa fa-credit-card"></i> Thanh toán</a></button>
                                                                    </div>
                                                                </td>
                                                            </tr>            
                                                    </tbody>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endforeach ?>
                                    <?php endif ?>

                                </table>
                            </form>
                            <div class="cart-collaterals">
                                <div class="cart_totals col-lg-offset-4">
                                    <h2>Tạm tính</h2>
                                    <table cellspacing="0">
                                        <tbody>
                                            <tr class="order-total">
                                                <th>Tổng</th>
                                                <td><strong><span class="amount"><?php echo number_format($total) ?>VND</span></strong> </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                            <hr size="5px" align="center" color=#e6e9ee />
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="products-tabs">
                                    <!-- tab -->
                                    <div id="pap1" class="tab-pane active">
                                        <div class="products-slick" data-nav="#slick-nav-1">
                                            <?php
                                            if (isset($_GET['type_id'])) :
                                                $type_id = $_GET['type_id'];
                                                $getProductsTopSellingByType1 = $product->getProductsTopSellingByType1($type_id); ?>
                                                <?php foreach ($getProductsTopSellingByType1 as $value) : ?>
                                                    <!-- product -->
                                                    <div class="product">
                                                        <div class="product-img">
                                                            <img style="width=100px" src="./img/<?php echo $value['pro_image'] ?>" alt="">
                                                            <div class="product-label">
                                                                <span class="new">BÁN CHẠY</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category"></p>
                                                            <h3 class="product-name"><a href="detail.php?type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
                                                            <h4 class="product-price"><?php echo number_format($value['price']) ?>VND</h4>
                                                            <div class="product-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <div class="product-btns">
                                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                            </div>
                                                        </div>
                                                        <a href="addcart.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>">
                                                            <div class="add-to-cart">
                                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ</button>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <!-- /product -->
                                                <?php endforeach ?>
                                            <?php endif ?>


                                        </div>
                                        <div id="slick-nav-1" class="products-slick-nav"></div>
                                    </div>
                                    <!-- /tab -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include "footer.php" ?>