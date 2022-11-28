<?php include "header.php";
if (isset($_GET['status'])) {
  if ($_GET['status'] == 'df') {
    echo "<script> alert('Xóa không thành công'); </script>";
  }
  if ($_GET['status'] == 'dc') {
    echo "<script> alert('Xóa thành công'); </script>";
  }
  if ($_GET['status'] == 'ec') {
    echo "<script> alert('Sửa thành công'); </script>";
  }
  if ($_GET['status'] == 'ef') {
    echo "<script> alert('Sửa không thành công'); </script>";
  }
  if ($_GET['status'] == 'ac') {
    echo "<script> alert('Thêm thành công'); </script>";
  }
  if ($_GET['status'] == 'af') {
    echo "<script> alert('Thêm không thành công'); </script>";
  }
}
echo '<script>window.history.pushState({}, document.title, "/" + "/admin/products.php");</script>';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Products</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Products</h3>

        <div class="card-tools">
          <a class="btn  btn-sm bg-green" href="addProduct.php">
            <i class="fas fa-plus"></i>
            Add
          </a>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">
                ID
              </th>
              <th style="width: 15%">
                Name
              </th>
              <th style="width: 10%">
                Image
              </th>
              <th style="width: 10%">
                Description
              </th>
              <th>
                Price
              </th>
              <th style="width: 8%" class="text-center">
                Manufactures
              </th>
              <th style="width: 8%" class="text-center">
                Protype
              </th>
              <th style="width: 8%" class="text-center">
                Feature
              </th>
              <th style="width: 8%" class="text-center">
                Created_at
              </th>
              <th style="width: 14%">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $getAllProductsDESC = $product->getAllProductsDESC();
            foreach ($getAllProductsDESC as $value) :
            ?>
              <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['name'] ?></td>
                <td><img style="width:50px" src="../img/<?php echo $value['pro_image'] ?>" alt=""></td>
                <td class="project_progress">
                  <?php
                  if (strlen($value['description']) > 60) : ?>
                    <?php echo substr($value['description'], 0, 60) ?><a style="color: black;" href="detailProducts.php?id=<?php echo $value['id'] ?>">...</a>
                    <?php else: echo $value['description'] ?>
                  <?php endif ?>

                </td>
                <td><?php echo number_format($value['price']) ?> VND</td>
                <td class="project_progress">
                  <?php echo $value['manu_name'] ?>
                </td>
                <td class="project-state">
                  <?php echo $value['type_name'] ?>
                </td>
                <td class="project-state">
                  <?php if ($value['feature'] == '1') {
                    echo 'Nổi bật';
                  } else {
                    echo 'Không nổi bật';
                  } ?>
                </td>
                <td class="project-state">
                  <?php echo $value['created_at'] ?>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="editPropduct.php?id=<?php echo $value['id']; ?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <a class="btn btn-danger btn-sm" href="deletePD.php?id=<?php echo $value['id']; ?>">
                    <i class="fas fa-trash">
                    </i>
                    Delete
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "footer.php" ?>