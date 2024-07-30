<?php require('../layouts/header.php'); ?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php require('../layouts/sidebar.php'); ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php require('../layouts/navbar.php'); ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categories/</span> Edit Category</h4>

                        <!-- Basic Layout & Basic with Icons -->
                        <div class="row">
                            <!-- Basic with Icons -->
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Edit Category</h5>
                                        <small class="text-muted float-end">Category Details</small>
                                    </div>
                                    <div class="card-body">

                                        <?php
                                        $title = $description = $image = $status = "";

                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];

                                            $sql = "SELECT * FROM categories WHERE id=$id";
                                            $result = mysqli_query($conn, $sql);
                                            if ($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $description = $row['description'];
                                                $image = $row['image'];
                                                $status = $row['status'];
                                            }
                                        }

                                        if (isset($_POST['save'])) {
                                            $title = $_POST['title'];
                                            $description = $_POST['description'];
                                            $status = $_POST['status'];

                                            if (!empty($_FILES['image']['name'])) {
                                                $image = 'uploads/' . basename($_FILES['image']['name']);
                                                move_uploaded_file($_FILES['image']['tmp_name'], $image);
                                            }

                                            if ($title != "" && $description != "" && $status != "") {
                                                $update = "UPDATE categories SET title='$title', description='$description', image='$image', status='$status' WHERE id=$id";
                                                $result = mysqli_query($conn, $update);
                                                if ($result) {
                                                    echo "<div class='alert alert-success'>Category Updated Successfully</div>";
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                } else {
                                                    echo "<div class='alert alert-danger'>Failed to Update Category</div>";
                                                }
                                            } else {
                                                echo "<div class='alert alert-danger'>All fields are required</div>";
                                            }
                                        }
                                        ?>

                                        <form class="row" method="POST" enctype="multipart/form-data" action="">
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-title">Title</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-title2" class="input-group-text"><i class="bx bx-book"></i></span>
                                                        <input type="text" name="title" class="form-control" id="basic-icon-default-title" placeholder="Enter category title" aria-label="Enter category title" aria-describedby="basic-icon-default-title2" value="<?php echo $title; ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-description">Description</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-description2" class="input-group-text"></span>
                                                        <textarea name="description" class="form-control" id="basic-icon-default-description" placeholder="Enter description" aria-label="Enter description" aria-describedby="basic-icon-default-description2"><th scope="row"><?php echo $i++; ?></th></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="form-label" for="basic-icon-default-image">Image</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-image2" class="input-group-text"></span>
                                                        <input type="file" name="image" id="basic-icon-default-image" class="form-control" aria-label="Upload image" aria-describedby="basic-icon-default-image2" />
                                                    </div>
                                                    <img src="<?php echo $image; ?>" alt="Current Image" style="width: 100px; height: auto; margin-top: 10px;">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="form-label" for="status">Status</label>
                                                <div class="col-sm-10">
                                                    <select name="status" class="form-control" id="status" required>
                                                        <option value="1" <?php if ($status == 1) echo "selected"; ?>>Active</option>
                                                        <option value="0" <?php if ($status == 0) echo "selected"; ?>>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-10">
                                                <button type="submit" name="save" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                        <!-- / Content -->

                                        <?php require('../layouts/footer.php'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / Basic Layout & Basic with Icons -->
                    </div>
                    <!-- / Content wrapper -->
                </div>
                <!-- / Layout container -->
            </div>
        </div>
    </div>
</body>
