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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hero/</span> Edit Hero Section</h4>

                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Edit Hero Section</h5>
                                <small class="text-muted float-end">Update an existing hero section</small>
                            </div>
                            <div class="card-body">
                                <?php
                                // Initialize variables
                                $top_title = $title = $status = "";

                                // Check if ID is provided
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];

                                    // Fetch data from database based on ID
                                    $sql = "SELECT * FROM hero WHERE id=$id";
                                    $result = mysqli_query($conn, $sql);

                                    // Populate form fields with fetched data
                                    if ($row = mysqli_fetch_assoc($result)) {
                                        $top_title = $row['top_title'];
                                        $title = $row['title'];
                                        $status = $row['status'];
                                    } else {
                                        echo "<div class='alert alert-danger'>Hero section not found.</div>";
                                        exit; // Exit if no record found
                                    }
                                } else {
                                    echo "<div class='alert alert-danger'>No ID provided.</div>";
                                    exit; // Exit if no ID provided
                                }

                                // Handle form submission
                                if (isset($_POST['save'])) {
                                    $top_title = $_POST['top_title'];
                                    $title = $_POST['title'];
                                    $status = $_POST['status'];

                                    // Validate form data
                                    if ($top_title != "" && $title != "" && $status != "") {
                                        // Perform SQL update
                                        $update = "UPDATE hero SET top_title='$top_title', title='$title', status='$status' WHERE id=$id";
                                        $result = mysqli_query($conn, $update);

                                        if ($result) {
                                            echo "<div class='alert alert-success'>Hero section updated successfully.</div>";
                                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                        } else {
                                            echo "<div class='alert alert-danger'>Failed to update hero section.</div>";
                                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=edit.php?id=$id\">";
                                        }
                                    } else {
                                        echo "<div class='alert alert-danger'>All fields are required.</div>";
                                    }
                                }
                                ?>

                                <form class="row" method="POST" action="">
                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="top_title">Top Title</label>
                                        <input type="text" name="top_title" class="form-control" id="top_title" placeholder="Enter top title" required value="<?php echo $top_title; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" required value="<?php echo $title; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="form-label" for="status">Status</label>
                                        <select name="status" class="form-control" id="status" required>
                                            <option value="1" <?php if ($status == 1) echo "selected"; ?>>Active</option>
                                            <option value="0" <?php if ($status == 0) echo "selected"; ?>>Inactive</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit" name="save" class="btn btn-primary">Update Hero Section</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->

                <?php require('../layouts/footer.php'); ?>
