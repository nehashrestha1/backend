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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Facts/</span> Edit Fact</h4>

                        <!-- Basic Layout & Basic with Icons -->
                        <div class="row">
                            <!-- Basic with Icons -->
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Edit Fact</h5>
                                        <small class="text-muted float-end">Modify fact details</small>
                                    </div>
                                    <div class="card-body">

                                        <?php
                                        $icon = $title = $number = $status = "";

                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];

                                            $sql = "SELECT * FROM facts WHERE id=$id";
                                            $result = mysqli_query($conn, $sql);
                                            if ($row = mysqli_fetch_assoc($result)) {
                                                $icon = $row['icon'];
                                                $title = $row['title'];
                                                $number = $row['number'];
                                                $status = $row['status'];
                                            }
                                        }

                                        if (isset($_POST['save'])) {
                                            $icon = $_POST['icon'];
                                            $title = $_POST['title'];
                                            $number = $_POST['number'];
                                            $status = $_POST['status'];

                                            if ($icon != "" && $title != "" && $number != "" && $status != "") {
                                                $update = "UPDATE facts SET icon='$icon', title='$title', number='$number', status='$status' WHERE id=$id";
                                                $result = mysqli_query($conn, $update);
                                                if ($result) {
                                                    echo "<div class='alert alert-success'>Fact is Updated</div>";
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                } else {
                                                    echo "<div class='alert alert-danger'>Fact is not Updated</div>";
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=edit.php?id=$id\">";
                                                }
                                            } else {
                                                echo "<div class='alert alert-danger'>All fields are required</div>";
                                                echo "<meta http-equiv=\"refresh\" content=\"2;URL=edit.php?id=$id\">";
                                            }
                                        }
                                        ?>

                                        <form class="row" method="POST" enctype="multipart/form-data" action="">
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="icon">Icon</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="icon-addon" class="input-group-text"><i class="bx bx-image"></i></span>
                                                        <input type="text" name="icon" class="form-control" id="icon" placeholder="Enter icon URL" aria-label="Enter icon URL" aria-describedby="icon-addon" value="<?php echo $icon; ?>" />
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="title">Title</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="title-addon" class="input-group-text"></span>
                                                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" aria-label="Enter title" aria-describedby="title-addon" value="<?php echo $title; ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="number">Number</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="number-addon" class="input-group-text"></span>
                                                        <input type="number" name="number" class="form-control" id="number" placeholder="Enter number" aria-label="Enter number" aria-describedby="number-addon" value="<?php echo $number; ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="form-label" for="status">Status</label>
                                                <div class="col-sm-10">
                                                    <select name="status" class="form-control" id="status" required>
                                                        <option value="0" <?php if ($status == 0) echo "selected"; ?>>Pending</option>
                                                        <option value="1" <?php if ($status == 1) echo "selected"; ?>>In Progress</option>
                                                        <option value="2" <?php if ($status == 2) echo "selected"; ?>>Completed</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-10">
                                                <button type="submit" name="save" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                        <!-- / Content -->

                                        <?php require('../layouts/footer.php'); ?>
