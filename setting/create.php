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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">settings/</span> Add settings Section</h4>

                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0"><a class="btn btn-primary btn-sm " href="index.php" role="button"> Manage settings</a></h5>
                            <small class="text-muted float-end">Create a new settings section</small>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($_POST['save'])) {
                                    $site_key = $_POST['site_key'];
                                    $site_value = $_POST['site_value'];
                                    $status = $_POST['status'];

                                    if ($site_key != "" && $site_value != "" && $status != "") {
                                        // Perform SQL insertion
                                        $insert = "INSERT INTO settings (site_key, site_value, status) VALUES ('$site_key', '$site_value', '$status')";
                                        $result = mysqli_query($conn, $insert);

                                        if ($result) {
                                            echo "<div class='alert alert-success'>settings section created successfully.</div>";
                                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                        } else {
                                            echo "<div class='alert alert-danger'>Failed to create settings section.</div>";
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
                                        <label class="col-form-label" for="site_key">Site Key</label>
                                        <input type="text" name="site_key" class="form-control" id="site_key" placeholder="Enter top site_key" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="site_value">site_value</label>
                                        <input type="text" name="site_value" class="form-control" id="site_value" placeholder="Enter site_value" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="form-label" for="status">Status</label>
                                        <select name="status" class="form-control" id="status" required>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit" name="save" class="btn btn-primary">Create settings Section</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->

                <?php require('../layouts/footer.php'); ?>
