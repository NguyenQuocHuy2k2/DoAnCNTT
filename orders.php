<?php session_start() ?>
<?php if (isset($_SESSION['user'])) {
    include "headeruser.php";
} else {
    include "header.php";
}
if(isset($_GET['status'])){
    if ($_GET['status']=='sd') {
        echo "<script> alert('Hủy đơn hàng thành công'); </script>";
        echo '<script>window.history.pushState({}, document.title, "/" + "location:"orders.php");</script>';
    }
    if($_GET['status']=='s'){
        echo "<script> alert('Đặt hàng thành công'); </script>";
        echo '<script>window.history.pushState({}, document.title, "/" + "location:"orders.php");</script>';
    }
    if($_GET['status']=='sr'){
        echo "<script> alert('Nhận hàng thành công'); </script>";
        echo '<script>window.history.pushState({}, document.title, "/" + "location:"orders.php");</script>';
    }
}
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
                                            <!-- <th class="product-remove">&nbsp;</th> -->
                                            <th class="product-thumbnail">&nbsp;</th>
                                            
                                            <th class="product-price">TỔNG GIÁ</th>
                                            <th class="product-name">ĐỊA CHỈ</th>
                                            <th class="product-price">ĐIỆN THOẠI</th>
                                            <th class="product-subtotal">TRẠNG THÁI</th>
                                            <th class="product-name">NGÀY TẠO</th>
                                            <th class="product-id">MÃ ĐƠN HÀNG</th>
                                            
                                        </tr>
                                    </thead>

                                    <?php
                                    $getInfoByUsername = $user->getInfoByUsername($_SESSION['user']);
                                    foreach ($getInfoByUsername as $value) {
                                        $user_id = $value['user_id'];
                                    }
                                    $getOrderByUserID = $order->getOrderByUserID($user_id);
                                    $getAllProducts = $product->getAllProducts();

                                    foreach ($getOrderByUserID as $value) :
                                        foreach ($getAllProducts as $value1) :
                                            if ($value['pro_id'] == $value1['id']) :
                                    ?>
                                                <tbody>

                                                    <tr class="cart_item">
                                                        <td class="product-thumbnail">
                                                            <a href="detail.php?id=<?php echo $value1['id'] ?>&type_id=<?php echo $value1['type_id'] ?>"><?php echo $value['quantity'] ?>x<img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="img/<?php echo $value1['pro_image'] ?>"></a>
                                                        </td>

                                                        <td class="product-quantity">
                                                            <span class="amount"><?php echo number_format($value['total']) ?>VND</span>
                                                        </td>

                                                        <td class="product-subtotal">
                                                            <?php echo $value['address'] ?>
                                                        </td>

                                                        <td class="product-quantity">
                                                            <?php echo $value['phone'] ?>
                                                        </td>

                                                        <td class="product-subtotal">
                                                            <?php if ($value['status'] == 0) {
                                                                echo 'Hàng đang được giao';
                                                            } else {
                                                                echo 'Hàng đã giao';
                                                            } ?>
                                                        </td>

                                                        <td class="product-subtotal">
                                                            <?php echo $value['date_create'] ?>
                                                        </td>

                                                        <td class="product-id">
                                                            <?php echo $value['order_id'] ?>
                                                        </td>
                                                    
                                                        
                                                    </tr>

                                                    <tr>
                                                        <td class="actions" colspan="6">

                                                            <?php if ($value['status'] == 0) : ?>
                                                                <div class="add-to-cart">


                                                                    <button class="add-to-cart-btn"><a style="text-decoration: none;" href="./delorder.php?order_id=<?php echo $value['order_id'] ?>"><i class="fa fa-credit-card"></i> HỦY ĐƠN HÀNG</a></button>
                                                                    <button class="add-to-cart-btn"><a style="text-decoration: none;" href="./received.php?order_id=<?php echo $value['order_id'] ?>"><i class="fa fa-credit-card"></i> ĐÃ NHẬN HÀNG</a></button>

                                                               
                                                            <?php else : ?>
                                                                <div class="add-to-cart">
                                                                <button class="add-to-cart-btn"><a style="text-decoration: none;" href="repurchase.php?order_id=<?php echo $value['order_id'] ?>"><i class="fa fa-credit-card"></i> MUA LẠI</a></button>
                                                                 </div>
                                                            <?php endif ?>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                    <?php
                                            endif;
                                        endforeach;
                                    endforeach;

                                    ?>

                                </table>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php include "footer.php" ?>