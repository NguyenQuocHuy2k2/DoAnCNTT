<?php include "header.php";
if (isset($_GET['status'])) {
  if ($_GET['status'] == 'df') {
    echo "<script> alert('Xóa không thành công'); </script>";
  }
  if ($_GET['status'] == 'ds') {
    echo "<script> alert('Xóa thành công'); </script>";
  }
  if ($_GET['status'] == 'es') {
    echo "<script> alert('Sửa thành công'); </script>";
  }
  if ($_GET['status'] == 'ef') {
    echo "<script> alert('Sửa thất bại (Import quantity phải lớn hơn hoặc bằng Sell number)'); </script>";
  }
  if ($_GET['status'] == 'as') {
    echo "<script> alert('Thêm thành công'); </script>";
  }
  if ($_GET['status'] == 'af') {
    echo "<script> alert('Thêm thất bại (Import quantity phải lớn hơn hoặc bằng Sell number)'); </script>";
  }
  echo '<script>window.history.pushState({}, document.title, "/" + "../admin/sales.php");</script>';
} ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sales</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Sales</li>
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
        <h3 class="card-title">Sales</h3>

        <div class="card-tools">
          <a class="btn  btn-sm bg-green" href="addsale.php">
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
              <th style="width: 25%">
                Sell Number
              </th>
              <th style="width: 25%">
                Import Quantity
              </th>
              <th style="width: 35%">
                Import Date
              </th>
              <th style="width: 14%">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $getAllSalesDESC = $sale->getAllSalesDESC();
            foreach ($getAllSalesDESC as $value) :
            ?>
              <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['Sell_number'] ?></td>
                <td><?php echo $value['Import_quantity'] ?></td>
                <td><?php echo $value['Import_date'] ?></td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="editSale.php?id=<?php echo $value['id']; ?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <a class="btn btn-danger btn-sm" href="deleteS.php?id=<?php echo $value['id']; ?>">
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