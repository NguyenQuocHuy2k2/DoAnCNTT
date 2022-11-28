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
  if ($_GET['status'] == 'ac') {
    echo "<script> alert('Thêm thành công'); </script>";
  }
  if ($_GET['status'] == 'af') {
    echo "<script> alert('Thêm không thành công'); </script>";
  }
  echo '<script>window.history.pushState({}, document.title, "/" + "/admin/roles.php");</script>';
} ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Roles</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Roles</li>
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
        <h3 class="card-title">Roles</h3>

        <div class="card-tools">
          <a class="btn  btn-sm bg-green" href="addRole.php">
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

              <th style="width: 43%">
                Role ID
              </th>
              <th style="width: 43%">
                Role Name
              </th>
              <th style="width: 14%">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $getAllRole = $role->getAllRole();
            foreach ($getAllRole as $value) :
            ?>
              <tr>
                <td><?php echo $value['role_id'] ?></td>
                <td><?php echo $value['role_name'] ?></td>

                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="editRole.php?role_id=<?php echo $value['role_id']; ?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <a class="btn btn-danger btn-sm" href="deleteR.php?role_id=<?php echo $value['role_id']; ?>">
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