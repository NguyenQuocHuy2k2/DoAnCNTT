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
  if ($_GET['status'] == 'as') {
    echo "<script> alert('Thêm thành công'); </script>";
  }
  if ($_GET['status'] == 'af') {
    echo "<script> alert('Thêm không thành công'); </script>";
  }
  echo '<script>window.history.pushState({}, document.title, "/" + "../admin/users.php");</script>';
} ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
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
        <h3 class="card-title">Users</h3>

        <div class="card-tools">
          <a class="btn  btn-sm bg-green" href="addUser.php">
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
              <th style="width: 5%">
                User_ID
              </th>
              <th style="width: 10%">
                image
              </th>
              <th style="width: 14%">
                First name
              </th>
              <th style="width: 14%">
                Last name
              </th>
              <th style="width: 14%">
                Phone
              </th>
              <th style="width: 12%">
                Username
              </th>
              <th style="width: 13%">
                Password
              </th>
              <th style="width: 5%">
                Role_ID
              </th>
              <th style="width: 15%">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $user = $user->getAllUserDESC();
            foreach ($user as $value) :
            ?>
              <tr>
                <td><?php echo $value['user_id'] ?></td>
                <td><img style="width:50px" src="../img/<?php echo $value['image'] ?>" alt=""></td>
                <td><?php echo $value['First_name'] ?></td>
                <td><?php echo $value['Last_name'] ?></td>
                <td><?php echo $value['phone'] ?></td>
                <td><?php echo $value['username'] ?></td>
                <td><?php echo $value['password'] ?></td>
                <td><?php echo $value['role_id'] ?></td>

                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="editUser.php?user_id=<?php echo $value['user_id']; ?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <a class="btn btn-danger btn-sm" href="deleteU.php?user_id=<?php echo $value['user_id']; ?>">
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