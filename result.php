<?php session_start() ?>
<?php if (isset($_SESSION['user'])) {
	include "headeruser.php";
} else {
	include "header.php";
}

?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->

		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- ASIDE -->

			<!-- /ASIDE -->

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
					if (isset($_GET['keyword'])) :
						$keyword = $_GET['keyword'];
						$searchCol = $_GET['searchCol'];
						$search = $product->search($keyword, $searchCol);
						// hiển thị 3 sản phẩm trên 1 trang
						$perPage = 6;
						// Lấy số trang trên thanh địa chỉ
						$page = isset($_GET['page']) ? $_GET['page'] : 1;
						// Tính tổng số dòng, ví dụ kết quả là 18
						$total = count($search);
						// lấy đường dẫn đến file hiện hành
						$url = $_SERVER['PHP_SELF'] . "?keyword=" . $keyword . "&searchCol=" . $searchCol . "\"";
						$search1 = $product->search1($keyword, $searchCol, $page, $perPage);
						foreach ($search1 as $value) :
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
										<h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
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
							</div>
							<!-- /product -->
					<?php endforeach;
					endif ?>
				</div>
				<!-- /store products -->

				<!-- store bottom filter -->
				<div class="store-filter clearfix">

					<ul class="store-pagination">
						<?php echo $product->paginate($url, $total, $perPage, $page); ?>
					</ul>
				</div>
				<!-- /store bottom filter -->
			</div>
			<!-- /STORE -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
<?php include "footer.php"; ?>