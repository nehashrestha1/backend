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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Testimonials/</span> Edit Testimonial</h4>

                        <!-- Basic Layout & Basic with Icons -->
                        <div class="row">
                            <!-- Basic with Icons -->
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Edit Testimonial</h5>
                                        <small class="text-muted float-end">Testimonial Details</small>
                                    </div>
                                    <div class="card-body">

                                        <?php
                                        // Database connection
                                   

                                        $message = $image = $name = $position = $status = "";

                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $sql = "SELECT * FROM testimonial WHERE id=$id";
                                            $result = mysqli_query($conn, $sql);

                                            if ($row = mysqli_fetch_assoc($result)) {
                                                $message = $row['message'];
                                                $image = $row['image'];
                                                $name = $row['name'];
                                                $position = $row['position'];
                                            }
                                        }

                                        if (isset($_POST['save'])) {
                                            $message = $_POST['message'];
                                            $name = $_POST['name'];
                                            $position = $_POST['position'];

                                            if (!empty($_FILES['image']['name'])) {
                                                $image = 'uploads/' . basename($_FILES['image']['name']);
                                                move_uploaded_file($_FILES['image']['tmp_name'], $image);
                                            }

                                            if ($message != "" && $name != "" && $position != "" && $status != "") {
                                                $update = "UPDATE testimonial SET message='$message', image='$image', name='$name', position='$position' WHERE id=$id";
                                                $result = mysqli_query($conn, $update);
                                                if ($result) {
                                                    echo "<div class='alert alert-success'>Testimonial Updated Successfully</div>";
                                                    echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
                                                } else {
                                                    echo "<div class='alert alert-danger'>Failed to Update Testimonial</div>";
                                                }
                                            } else {
                                                echo "<div class='alert alert-danger'>All fields are required</div>";
                                            }
                                        }
                                        ?>

                                        <form class="row" method="POST" enctype="multipart/form-data" action="">
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-message">Message</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-message-square-dots"></i></span>
                                                        <textarea name="message" readonly class="form-control" id="basic-icon-default-message" placeholder="Enter message" aria-label="Enter message" aria-describedby="basic-icon-default-message2"><?php echo $message; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="form-label" for="basic-icon-default-image">Image</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-image2" class="input-group-text"></span>
                                                        <input type="file" name="image" readonly id="basic-icon-default-image" class="form-control" aria-label="Upload image" aria-describedby="basic-icon-default-image2" />
                                                    </div>
                                                    <img src="<?php echo '../uploads/'.$image; ?>" alt="Current Image" style="width: 100px; height: auto; margin-top: 10px;">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-name">Name</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-name2" class="input-group-text"></span>
                                                        <input type="text" name="name" readonly class="form-control" id="basic-icon-default-name" placeholder="Enter name" aria-label="Enter name" aria-describedby="basic-icon-default-name2" value="<?php echo $name; ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-position">position</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-position2" class="input-group-text"></span>
                                                        <input type="text" name="position" readonly class="form-control" id="basic-icon-default-position" placeholder="Enter position" aria-label="Enter position" aria-describedby="basic-icon-default-position2" value="<?php echo $position; ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                           

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="form-label" for="status">Status</label>
                                                <div class="col-sm-10">
                                                    <p><?php echo htmlspecialchars
($data['status'] == 1) ? 'Active' : 'In-Active'; ?></p>
                                                </div>
                                            </div>

                                            
                                        </form>
                                        <!-- / Content -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / Basic Layout & Basic with Icons -->
                    </div>
                    <!-- / Content wrapper -->
                </div>
                <!-- / Layout container -->
                <?php require('../layouts/footer.php'); ?>
            </div>
        </div>
    </div>
</body>
                                    </html>
