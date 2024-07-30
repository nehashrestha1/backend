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

          <!-- $select_query = "SELECT * FROM files ORDER BY id DESC";
          $result = mysqli_query($conn, $select_query);

          if (!$result) {
          die("Query failed: " . mysqli_error($conn));
          } -->
          
          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">File /</span> Manage Files</h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
              <h5 class="card-header">Files</h5>
              <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>title</th>
                      <th>description</th>
                      <th>image</th>
                      <th>Image Link</th>
                      <th>Status</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    <?php
                    $select = "SELECT * FROM files";
                    $select_result = mysqli_query($conn, $select);
                    $i = 1;
                    while ($data = mysqli_fetch_array($select_result)) {
                      ?>
                      <tr>
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><?php echo htmlspecialchars
($data['title']); ?></td>
                        <td><?php echo htmlspecialchars
($data['description']); ?></td>
                        <td><img src="<?php  echo "../uploads/". $data['image']; ?>" width="100" height="100" alt=""></td>

                        <td><?php echo htmlspecialchars
($data['image']); ?></td>
                        <td><?php echo htmlspecialchars
($data['status'] == 1) ? 'Active' : 'In-Active'; ?></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="edit.php?id=<?php echo $data['id']; ?>"><i
                                  class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item" href="delete.php?id=<?php echo $data['id']; ?>"
                                onclick=" return confirm('Do you want to delete this data??/')"><i
                                  class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!--/ Basic Bootstrap Table -->
          </div>
          <!-- / Content -->

          <?php require ('../layouts/footer.php'); ?>
        </div>
      </div>
    </div>
  </div>
</body>