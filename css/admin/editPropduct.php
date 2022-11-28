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
                            <h1>Edit Product</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Product</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <form action="editPD.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $getProductById = $product->getProductById($_GET['id']);
                            foreach ($getProductById as $values) : ?>
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
                                            <label for="inputName">ID</label>
                                            <input readonly value="<?php echo $values['id'] ?>" type="text" id="inputID" class="form-control" name="id">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Name</label>
                                            <input value="<?php echo $values['name'] ?>" type="text" id="inputName" class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Manufacture</label>
                                            <select id="inputStatus" class="form-control custom-select" name="manu">
                                                <option selected disabled>Select one</option>
                                                <?php
                                                $getAllManu = $manufacture->getAllManu();
                                                foreach ($getAllManu as $values1) :
                                                ?>
                                                    <option value=<?php echo $values1['manu_id'] ?> <?php if ($values1['manu_id'] == $values['manu_id']) echo 'selected' ?>><?php echo $values1['manu_name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Protype</label>
                                            <select id="inputStatus" class="form-control custom-select" name="type">
                                                <option selected disabled>Select one</option>
                                                <?php
                                                $getAllProtypes = $protype->getAllProtypes();
                                                foreach ($getAllProtypes as $values1) :
                                                ?>
                                                    <option value=<?php echo $values1['type_id'] ?> <?php if ($values1['type_id'] == $values['type_id']) echo 'selected' ?>><?php echo $values1['type_name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputDescription">Description</label>
                                            <textarea name="desc" id="summernote" class="form-control" rows="4"><?php echo $values['description'] ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputClientCompany">Price</label>
                                            <input type="text" id="inputClientCompany" class="form-control" name="price" value="<?php echo $values['price'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Feature</label>
                                            <select id="inputStatus" class="form-control custom-select" name="feature">
                                                <option selected disabled>Select one</option>
                                                <option value="1" <?php if ($values['feature'] == 1) echo 'selected' ?>>Nổi bật</option>
                                                <option value="0" <?php if ($values['feature'] == 0) echo 'selected' ?>>Không nổi bật</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProjectLeader">Image</label>
                                            <!-- <input type="text"  name="fileToUpload" id="inputProjectLeader" class="form-control" -->
                                            <img style="width:50px" src="../img/<?php echo $values['pro_image'] ?>" alt="">
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