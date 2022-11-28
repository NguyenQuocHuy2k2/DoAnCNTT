<?php
session_start();
include "headeruser.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Capple - Website bán đồ ăn, trái cây , rau củ trực tuyến</title>

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

<body>

	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form action="addorder.php?id=<?php echo $_GET['id'] ?>" method="post">
					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Thông tin người nhận</h3>
							</div>
							<?php if (isset($_SESSION['user'])) :
								$getInfoByUsername = $user->getInfoByUsername($_SESSION['user']);
								foreach ($getInfoByUsername as $value) :
							?>
									<div class="form-group">
										<input class="input" type="text" name="full name" placeholder="Full Name" value="<?php echo $value['First_name'] . $value['Last_name'] ?>" readonly>
									</div>
									<div class="form-group">
										<input class="input" type="text" name="address" placeholder="Địa chỉ" required>
									</div>

									<div class="form-group">
										<input class="input" type="tel" name="phone" placeholder="Điện thoại" value="<?php echo $value['phone'] ?>" required>
									</div>

								<?php endforeach ?>
							<?php endif ?>
						</div>
						<!-- /Billing Details -->
						<!-- Order notes -->
						<div class="row">
							<div class="col-md-8">
								<div class="order-notes">
									<h4>Ghi chú</h4>
									<textarea style="height: 115px;" class="input" placeholder="Thông điệp bánh ngọt ví dụ: 'Chúc mừng sinh nhật'" name="note"></textarea>
								</div>
							</div>
							<div class="col-md-3"><?php $getProductById = $product->getProductById($_GET['id']) ?>
								<img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="img/<?php foreach ($getProductById as $value) { echo $value['pro_image'];} ?>">
							</div>
						</div>


						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">

						<div class="section-title text-center">
							<h3 class="title">Đơn hàng của bạn</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>SẢN PHẨM</strong></div>
								<div><strong>ĐƠN GIÁ</strong></div>
							</div>
							<div class="order-products">
								<?php if (isset($_SESSION['cart'])) :
									$getAllProducts = $product->getAllProducts();
									foreach ($getAllProducts as $value) :
										if ($value['id'] == $_GET['id']) : ?>
											<div class="order-col">
												<div><?php echo $_SESSION['cart'][$value['id']] ?> x <?php echo $value['name'] ?></div>
												<div style="max-width:440px;"><?php echo number_format($value['price']) ?>VND</div>
											</div>
							</div>
							<div class="order-col">
								<div><strong>TẠM TÍNH:</strong></div>
								<div><strong class="order-cash-total"><?php echo number_format($_SESSION['cart'][$value['id']] * $value['price']) ?>VND</strong></div>
							</div>
							<div class="order-col">
								<div><strong>PHÍ VẬN CHUYỂN:</strong></div>
		
									<?php
										if($_SESSION['cart'][$value['id']] * $value['price'] < 300000) 
										{
											$shipCost = 5000;
										}
										else{
											$shipCost = 0;
										}
									
									?>
								<div><strong class = "ship-cost-view"><?php echo number_format($shipCost) ?>VND</strong></div>						
								
								
							</div>
							<div class="order-col">
								<div><strong>TỔNG:</strong></div>
								<div><strong class="order-total"><?php echo number_format($_SESSION['cart'][$value['id']] * $value['price'] + $shipCost) ?>VND</strong></div>
							</div>
						</div>
			<?php
			endif;
				endforeach;
			endif
			?>
				<button class="primary-btn order-submit col-lg-offset-4" type="submit" name="submit" >ĐẶT HÀNG</button>
					</div>
					<!-- /Order Details -->
				</form>
			</div>
			<!-- /row -->
		</div>
	</div>
<?php
	include "footer.php";
?>