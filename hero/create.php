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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">hero/</span> Add Hero Section</h4>

                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0"><a class="btn btn-primary btn-sm " href="index.php" role="button"> Manage Hero</a></h5>
                            <small class="text-muted float-end">Create a new hero section</small>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($_POST['save'])) {
                                    $top_title = $_POST['top_title'];
                                    $title = $_POST['title'];
                                    $status = $_POST['status'];

                                    if ($top_title != "" && $title != "" && $status != "") {
                                        // Perform SQL insertion
                                        $insert = "INSERT INTO hero (top_title, title, status) VALUES ('$top_title', '$title', '$status')";
                                        $result = mysqli_query($conn, $insert);

                                        if ($result) {
                                            echo "<div class='alert alert-success'>Hero section created successfully.</div>";
                                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                        } else {
                                            echo "<div class='alert alert-danger'>Failed to create hero section.</div>";
                                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=create.php\">";
                                        }
                                    } else {
                                        echo "<div class='alert alert-danger'>All fields are required.</div>";
                                    }

                                    // Redirect after 4 seconds
                                    echo "<meta http-equiv=\"refresh\" content=\"4;URL=create.php\">";
                                }
                                ?>

                                <form class="row" method="POST" action="">
                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="top_title">Top Title</label>
                                        <input type="text" name="top_title" class="form-control" id="top_title" placeholder="Enter top title" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="form-label" for="status">Status</label>
                                        <select name="status" class="form-control" id="status" required>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit" name="save" class="btn btn-primary">Create Hero Section</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->

                <?php require('../layouts/footer.php'); ?>
