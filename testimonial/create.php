<?php require ('../layouts/header.php'); ?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php require ('../layouts/sidebar.php'); ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php require ('../layouts/navbar.php'); ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Testimonials/</span> Add
                            Testimonial</h4>

                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0"><a class="btn btn-primary btn-sm" href="index.php" role="button">Manage
                                        Testimonials</a></h5>
                                <small class="text-muted float-end">Create a new testimonial</small>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($_POST['save'])) {
                                    $message = $_POST['message'];
                                    $name = $_POST['name'];
                                    $image = $_POST['image'];
                                    $position = $_POST['position'];
                                    $image = $_POST['image'];

                                    if ($message != "" && $name != "" && $position != "" && $image != "") {
                                        // Perform SQL insertion
                                        $insert = "INSERT INTO testimonial (message, name,position,image) VALUES ('$message', '$name','$position', '$image')";
                                        $result = mysqli_query($conn, $insert);

                                        if ($result) {
                                            echo "<div class='alert alert-success'>Testimonial created successfully.</div>";
                                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                        } else {
                                            echo "<div class='alert alert-danger'>Failed to create testimonial.</div>";
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
                                        <label class="col-form-label" for="message">Message</label>
                                        <textarea name="message" class="form-control" id="message"
                                            placeholder="Enter testimonial message" required></textarea>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter name" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="basic-icon-default-image">Image</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-image2" class="input-group-text"><i
                                                        class="bx bx-image"></i></span>
                                                <input type="text" name="image" class="form-control"
                                                    id="basic-icon-default-image" placeholder="Enter image URL"
                                                    aria-label="Enter image URL"
                                                    aria-describedby="basic-icon-default-image2" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="basic-icon-default-image">Image</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-image2" class="input-group-text"><i
                                                        class="bx bx-image"></i></span>
                                                <input type="text" name="image" class="form-control"
                                                    id="basic-icon-default-image" placeholder="Enter image URL"
                                                    aria-label="Enter image URL"
                                                    aria-describedby="basic-icon-default-image2" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="position">Position</label>
                                        <input type="text" name="position" class="form-control" id="position"
                                            placeholder="Enter position" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label class="col-form-label" for="image">Image URL</label>
                                        <input type="text" name="image" class="form-control" id="image" placeholder="Enter image URL" required>
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit" name="save" class="btn btn-primary">submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->

                <?php require ('../layouts/footer.php'); ?>