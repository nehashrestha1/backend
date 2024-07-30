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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">settings/</span> Edit settings Section</h4>

                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Edit settings Section</h5>
                                <small class="text-muted float-end">Update an existing settings section</small>
                            </div>
                            <div class="card-body">
                                <?php
                                // Initialize variables
                                $site_key = $site_value = $status = "";

                                // Check if ID is provided
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];

                                    // Fetch data from database based on ID
                                    $sql = "SELECT * FROM settings WHERE id=$id";
                                    $result = mysqli_query($conn, $sql);

                                    // Populate form fields with fetched data
                                    if ($row = mysqli_fetch_assoc($result)) {
                                        $site_key = $row['site_key'];
                                        $site_value = $row['site_value'];
                                        $status = $row['status'];
                                    } else {
                                        echo "<div class='alert alert-danger'>settings section not found.</div>";
                                        exit; // Exit if no record found
                                    }
                                } else {
                                    echo "<div class='alert alert-danger'>No ID provided.</div>";
                                    exit; // Exit if no ID provided
                                }

                                // Handle form submission
                                if (isset($_POST['save'])) {
                                    $site_value = $_POST['site_value'];
                                    $status = $_POST['status'];

                                    // Validate form data
                                    if ($site_value != "" && $status != "") {
                                        // Perform SQL update
                                        $update = "UPDATE settings SET site_value='$site_value', status='$status' WHERE id=$id";
                                        $result = mysqli_query($conn, $update);

                                        if ($result) {
                                            echo "<div class='alert alert-success'>settings section updated successfully.</div>";
                                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                        } else {
                                            echo "<div class='alert alert-danger'>Failed to update settings section.</div>";
                                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=edit.php?id=$id\">";
                                        }
                                    } else {
                                        echo "<div class='alert alert-danger'>All fields are required.</div>";
                                    }
                                }
                                ?>

                                <form class="row" method="POST" action="">
                                   

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="site_value">site_value</label>
                                        <input type="text" name="site_value" class="form-control" id="site_value" placeholder="Enter site_value" required value="<?php echo $site_value; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="form-label" for="status">Status</label>
                                        <select name="status" class="form-control" id="status" required>
                                            <option value="1" <?php if ($status == 1) echo "selected"; ?>>Active</option>
                                            <option value="0" <?php if ($status == 0) echo "selected"; ?>>Inactive</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit" name="save" class="btn btn-primary">Update settings Section</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->

                <?php require('../layouts/footer.php'); ?>
