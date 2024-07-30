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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">products/</span> View product
                        </h4>

                        <!-- Basic Layout & Basic with Icons -->
                        <div class="row">
                            <!-- Basic with Icons -->
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0"><a class="btn btn-primary btn-sm " href="index.php" role="button"> Manage Products</a></h5>
                                        <small class="text-muted float-end">Merged input group</small>
                                    </div>
                                    <div class="card-body">

                                        <?php


                                        if (isset($_GET['id'])) {

                                            $id = $_GET['id'];

                                            $select = "SELECT *FROM products";
                                            $select_result = mysqli_query($conn, $select);
                                            $data = mysqli_fetch_assoc($select_result);
                                        }
                                        
                                        ?>

                                        <form class="row" method="POST" enctype="multipart/form-data" action="">


                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-description">Title</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-description2" class="input-group-text"><i class="bx bx-message-square-dots"></i></span>
                                                        <input type="text" name="title" readonly value="<?php echo $data['title']; ?>" class="form-control" id="basic-icon-default-image" placeholder="Enter title" aria-label="" aria-describedby="basic-icon-default-image2" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-description">Description</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-description2" class="input-group-text"><i class="bx bx-message-square-dots"></i></span>
                                                        <textarea name="description" readonly class="form-control" id="basic-icon-default-description" placeholder="Enter description" aria-label="Enter description" aria-describedby="basic-icon-default-description2"><?php echo $data['title']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-image">Image</label><br>
                                                <img src="<?php echo '../uploads/'.$data['image']; ?>" alt="" width="100" height="100">  
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-image2" class="input-group-text"><i class="bx bx-image"></i></span>
                                                        <input type="text" name="image" readonly value="<?php echo $data['image']; ?>"   class="form-control" id="basic-icon-default-image" placeholder="Enter image URL from Flies" aria-label="" aria-describedby="basic-icon-default-image2" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-description">Price</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-description2" class="input-group-text"><i class="bx bx-message-square-dots"></i></span>
                                                        <input type="number" readonly value="<?php echo $data['price']; ?>" name="price" class="form-control" id="basic-icon-default-image" placeholder="Enter price" aria-label="" aria-describedby="basic-icon-default-image2" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-image">Qty</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-image2" class="input-group-text"><i class="bx bx-image"></i></span>
                                                        <input type="number" readonly name="qty" value="<?php echo $data['qty']; ?>" class="form-control" id="basic-icon-default-image" placeholder="Enter qty" aria-label="" aria-describedby="basic-icon-default-image2" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-image">Discount</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-image2" class="input-group-text"><i class="bx bx-image"></i></span>
                                                        <input type="number"readonly name="discount" value="<?php echo $data['discount']; ?>" class="form-control" id="basic-icon-default-image" placeholder="Enter discount" aria-label="" aria-describedby="basic-icon-default-image2" />
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

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- / Content -->

                    <?php require('../layouts/footer.php'); ?>