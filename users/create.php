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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users/</span> Add users
                        </h4>

                        <!-- Basic Layout & Basic with Icons -->
                        <div class="row">
                            <!-- Basic with Icons -->
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0"><a class="btn btn-primary btn-sm " href="index.php" role="button"> Manage Users</a></h5>
                                        <small class="text-muted float-end">Merged input group</small>
                                    </div>
                                    <div class="card-body">

                                        <?php
                                        if (isset($_POST['save'])) {

                                            $name = $_POST['name'];

                                            $username = $_POST['username'];
                                            $phone = $_POST['phone'];
                                            $email = $_POST['email'];
                                            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                                            $role = $_POST['role'];
                                            $status = $_POST['status'];

                                            if ($name != "" && $username != "" && $phone != "" && $email != "" && $password != "" && $role != "" && $status != "") {
                                                $insert = "INSERT INTO users (name, username, phone, email, password, role, status) VALUES ('$name', '$username', '$phone', '$email', '$password', '$role', '$status')";
                                                $result = mysqli_query($conn, $insert);

                                                if ($result) {
                                                    echo "<div class='alert alert-success'>Data is submitted</div>";
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                } else {
                                                    echo "<div class='alert alert-danger'>Data is not submitted</div>";
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=create.php\">";
                                                }
                                            } else {
                                                echo "<div class='alert alert-danger'>All fields are required</div>";
                                            }

                                            // Redirect after 0 seconds
                                            echo "<meta http-equiv=\"refresh\" content=\"4;URL=create.php\">";
                                        }


                                        ?>
                                        <form class="row" method="POST" enctype="multipart/form-data" action="">
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-fullname">Name</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                        <input type="text" name="name" class="form-control" id="basic-icon-default-fullname" placeholder="Enter your name" aria-label="Enter your name" aria-describedby="basic-icon-default-fullname2" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-fullname">Username</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"></span>
                                                        <input type="text" name="username" class="form-control" id="basic-icon-default-fullname" placeholder="Enter username" aria-label="Enter username" aria-describedby="basic-icon-default-fullname2" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-fullname">Phone</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i</span>
                                                        <input type="number" name="phone" class="form-control" id="basic-icon-default-fullname" aria-label="Enter phone number" aria-describedby="basic-icon-default-fullname2" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-email">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                                        <input type="text" name="email" id="basic-icon-default-email" class="form-control" placeholder="yourname" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
                                                        <span id="basic-icon-default-email2" class="input-group-text">@gmail.com</span>
                                                    </div>
                                                    <div class="form-text">You can use letters, numbers & periods</div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="form-label" for="basic-icon-default-password">Password</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-password2" class="input-group-text"></span>
                                                        <input type="password" name="password" id="basic-icon-default-password" class="form-control" aria-label="Enter password" aria-describedby="basic-icon-default-password2" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-role">Role</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-role2" class="input-group-text"></span>
                                                        <input type="text" name="role" class="form-control" id="basic-icon-default-role" placeholder="Enter role" aria-label="Enter role" aria-describedby="basic-icon-default-role2" />
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

                                        <!-- / Content -->

                                        <?php require('../layouts/footer.php'); ?>