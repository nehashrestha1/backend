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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Facts/</span> Add Facts</h4>

                        <!-- Basic Layout & Basic with Icons -->
                        <div class="row">
                            <!-- Basic with Icons -->
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0"><a class="btn btn-primary btn-sm " href="index.php" role="button"> Manage facts</a></h5>
                                    <small class="text-muted float-end">Add new fact</small>
                                    </div>
                                    <div class="card-body">

                                        <?php
                                        if (isset($_POST['save'])) {

                                            $icon = $_POST['icon'];
                                            $title = $_POST['title'];
                                            $number = $_POST['number'];
                                            $status = $_POST['status'];

                                            if ($icon != "" && $title != "" && $number != "" && $status != "") {
                                                $insert = "INSERT INTO facts (icon, title, number, status) VALUES ('$icon', '$title', '$number', '$status')";
                                                $result = mysqli_query($conn, $insert);

                                                if ($result) {
                                                    echo "<div class='alert alert-success'>Fact is submitted</div>";
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                } else {
                                                    echo "<div class='alert alert-danger'>Fact is not submitted</div>";
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=create.php\">";
                                                }
                                            } else {
                                                echo "<div class='alert alert-danger'>All fields are required</div>";
                                            }

                                            // Redirect after 4 seconds
                                            echo "<meta http-equiv=\"refresh\" content=\"4;URL=create.php\">";
                                        }
                                        ?>

                                        <form class="row" method="POST" enctype="multipart/form-data" action="">
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="icon">Icon</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="icon-addon" class="input-group-text"><i class="bx bx-image"></i></span>
                                                        <input type="text" name="icon" class="form-control" id="basic-icon-default-image" placeholder="Enter image URL" aria-label="Enter image URL" aria-describedby="basic-icon-default-image2" />
                                                    </div>
                                                   
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="title">Title</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="title-addon" class="input-group-text"></span>
                                                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" aria-label="Enter title" aria-describedby="title-addon" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="number">Number</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="number-addon" class="input-group-text"></span>
                                                        <input type="number" name="number" class="form-control" id="number" placeholder="Enter number" aria-label="Enter number" aria-describedby="number-addon" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="form-label" for="status">Status</label>
                                                <div class="col-sm-10">
                                                    <select name="status" class="form-control" id="status" required>
                                                        <option value="0">Pending</option>
                                                        <option value="1">In Progress</option>
                                                        <option value="2">Completed</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-10">
                                                <button type="submit" name="save" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / Content -->

                        <?php require('../layouts/footer.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

                                    </html>
