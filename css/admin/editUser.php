<?php include "header.php"; ?>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit User</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit User</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <form action="editU.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $getUserById = $user->getUserById($_GET['user_id']);
                            foreach ($getUserById as $values) : ?>
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">General</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputName">User ID</label>
                                            <input readonly value="<?php echo $values['user_id'] ?>" type="text" id="inputID" class="form-control" name="user_id">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">First name</label>
                                            <input value="<?php echo $values['First_name'] ?>" type="text" id="inputFirst" class="form-control" name="first_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Last name</label>
                                            <input value="<?php echo $values['Last_name'] ?>" type="text" id="inputUserLast" class="form-control" name="last_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Phone</label>
                                            <input value="<?php echo $values['phone'] ?>" type="text" id="inputUserPhone" class="form-control" name="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Username</label>
                                            <input value="<?php echo $values['username'] ?>" type="text" id="inputUserName" class="form-control" name="username"  required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Password</label>
                                            <input value="<?php echo $values['password'] ?>" type="text" id="inputPassword" class="form-control" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Role ID</label>
                                            <select id="inputStatus" class="form-control custom-select" name="role_id">
                                                <option selected disabled>Select one</option>
                                                <option value="1" <?php if ($values['role_id'] == 1) echo 'selected' ?>>1</option>
                                                <option value="2" <?php if ($values['role_id'] == 2) echo 'selected' ?>>2</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProjectLeader">Image</label>
                                            <!-- <input type="text"  name="fileToUpload" id="inputProjectLeader" class="form-control" -->
                                            <img style="width:50px" src="../img/<?php echo $values['image'] ?>" alt="">
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
                            <input type="submit" name="submit" value="Apply change" class="btn btn-success float-right">
                        </div>
                    </div>
                </form>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include "footer.php" ?>