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
                            <h1>Add User</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add User</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <form action="addU.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
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
                                        <label for="inputName">First name</label>
                                        <input type="text" id="inputfirst" class="form-control" name="First_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Last name</label>
                                        <input type="text" id="inputLast" class="form-control" name="Last_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Phone</label>
                                        <input type="text" id="inputPhone" class="form-control" name="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Username</label>
                                        <input type="text" id="inputName" class="form-control" name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Password</label>
                                        <input type="password" id="inputPassword" class="form-control" name="password" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputStatus">Role ID</label>
                                        <select id="inputStatus" class="form-control custom-select" name="role_id">
                                            <option selected disabled>Select one</option>
                                            <?php
                                            $getAllRole = $role->getAllRole();
                                            foreach ($getAllRole as $values) :
                                            ?>
                                                <option value=<?php echo $values['role_id'] ?>>
                                                    <?php echo $values['role_id'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputProjectLeader">Image</label>
                                        <!-- <input type="text"  name="fileToUpload" id="inputProjectLeader" class="form-control" -->
                                        <input type="file" name="image" id="fileToUpload">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" name="submit" value="Create new User" class="btn btn-success float-right">
                        </div>
                    </div>
                </form>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include "footer.php" ?>