<?php require('inc/toppart.php'); ?>

<?php require('inc/sidebar.php'); ?>

<?php require('inc/navbar.php'); ?>

<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $select_query = "SELECT * FROM users WHERE id=$id";
    $select_result = mysqli_query($conn,$select_query);
    $select_row = $select_result->fetch_assoc();
    $name = $select_row['name'];
    $email = $select_row['email'];
} 
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <h2>Edit User</h2>
        <div class="row">
            <div class="col-md-9">
                <?php
                if(isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = md5($_POST['password']);

                    $query = "UPDATE users SET name='$name', email='$email', password='$password' WHERE id=$id";
                    $result = mysqli_query($conn,$query);
                    if($result)
                    {
                        echo "Record Updated Successfully.";
                    }
                    else
                    {
                        echo "Failed to update record.";
                    }

                }
                ?>
            <form action="" action="#" method="POST" enctype="multipart/form-data">
                <div class="form-group col-md-6">
                  <label for="">Full Name:</label>
                  <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="" value="<?php echo $name; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Email:</label>
                  <input type="email" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="" value="<?php echo $email; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Password:</label>
                  <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder=""  value="">
                </div>
                <button type="submit" class="btn btn-primary ml-2" name="submit">Submit</button>
            </form>
            </div>
        </div>

        </div>
        <!-- /.container-fluid -->
<?php require('inc/footer.php'); ?>