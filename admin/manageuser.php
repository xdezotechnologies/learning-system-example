<?php require('inc/toppart.php'); ?>

<?php require('inc/sidebar.php'); ?>

<?php require('inc/navbar.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <h6 class="m-0 font-weight-bold">Manage Users</h6>
        <?php
        if(isset($_GET['msg'])) 
        {
            $msg=$_GET['msg'];
            if($msg=="dsuccess") 
            {
                ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>User deleted sucessfully.</strong> 
        </div>
        
        <script>
          $(".alert").alert();
        </script>
                <?php
            }
        if($msg=="derror")
            {
                ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>User couldn't deleted.</strong> 
        </div>
        
        <script>
          $(".alert").alert();
        </script>
                <?php
            }
        }
        ?>

                  <!-- DataTales Example -->
                  <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S.N.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S.N.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php
                      $query = "SELECT * FROM users";
                      $result = mysqli_query($conn,$query);
                      $sn=0;
                      while($data=mysqli_fetch_array($result))
                      {
                          $sn++;
                      ?>
                    <tr>
                      <td><?php echo $sn; ?></td>
                      <td><?php echo $data['name']; ?></td>
                      <td><?php echo $data['email']; ?></td>
                      <td><?php if($data['status']==1) { echo "Active"; } else { echo "Inactive"; } ?></td>
                      <td>
                          <a name="" id="" class="btn btn-success btn-sm" href="edituser.php?id=<?php echo $data['id']; ?>" role="button">Edit</a>
                          <a name="" id="" class="btn btn-danger btn-sm" href="process/deleteuser.php?id=<?php echo $data['id']; ?>" role="button">Delete</a>

                      </td>
                    </tr>
                    <?php
                      } 
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
<?php require('inc/footer.php'); ?>