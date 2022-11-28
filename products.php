<?php
session_start();
if (isset($_SESSION['user'])) {
	include "headeruser.php";
} else {
	include "header.php";
} ?>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->

	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- STORE -->
			<div id="store" class="col-lg-12">
				<!-- store top filter -->
				<div class="store-filter clearfix">
					<div class="store-sort">
						<label>
							Sắp xếp:
							<select class="input-select">
								<option value="0">Popular</option>
								<option value="1">Position</option>
							</select>
						</label>

						<label>
							Hiển thị:
							<select class="input-select">
								<option value="0">20</option>
								<option value="1">50</option>
							</select>
						</label>
					</div>
					<ul class="store-grid">
						<li class="active"><i class="fa fa-th"></i></li>
						<li><a href="#"><i class="fa fa-th-list"></i></a></li>
					</ul>
				</div>
				<!-- /store top filter -->

				<!-- store products -->
				<div class="row">
					<?php
					if (isset($_GET['type_id'])) :
						$type_id = $_GET['type_id'];
						$getProductsByType = $product->getProductsByType($type_id);
						// hiển thị 6 sản phẩm trên 1 trang
						$perPage = 6;
						// Lấy số trang trên thanh địa chỉ
						$page = isset($_GET['page']) ? $_GET['page'] : 1;
						// Tính tổng số dòng, ví dụ kết quả là 18
						$total = count($getProductsByType);
						// lấy đường dẫn đến file hiện hành
						$url = $_SERVER['PHP_SELF'] . "?type_id=" . $type_id;
						$get3ProductsByType = $product->get3ProductsByType($type_id, $page, $perPage);
						foreach ($get3ProductsByType as $value) :
					?>
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
										<div class="product-label">
										</div>
									</div>
									<div class="product-body">
										<p class="product-category"></p>
										<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price']) ?></h4>
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
							</div>
							<!-- /product -->
						<?php endforeach; ?>
				</div>
				<!-- /store products -->

				<!-- store bottom filter -->
				<div class="store-filter clearfix">
					<!-- <span class="store-qty">Showing 20-100 products</span> -->
					<ul class="store-pagination">
						<?php echo $product->paginate($url, $total, $perPage, $page); ?>
					</ul>
				</div>
				<!-- /store bottom filter -->
			<?php endif; ?>
			</div>
			<!-- /STORE -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
<?php include "footer.php" ?>