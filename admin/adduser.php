<?php require('inc/toppart.php'); ?>

<?php require('inc/sidebar.php'); ?>

<?php require('inc/navbar.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <h2>Add User</h2>
        <div class="row">
            <div class="col-md-9">
                <?php
                if(isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = md5($_POST['password']);

                    if($name!="" && $email!="" && $password!="")
                    {
                        $query = "INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
                        $result = mysqli_query($conn,$query);
                        if($result)
                        {
                            ?>
                            <meta http-equiv="refresh" content="0; manageuser.php?msg=success">
                            <?php
                        }
                        else 
                        {
                            echo "Failed to create users.";
                        }
                    }
                    else 
                    {
                        echo "Name, Email and password are necessary.";
                    }
                }
                ?>
            <form action="" action="#" method="POST" enctype="multipart/form-data">
                <div class="form-group col-md-6">
                  <label for="">Full Name:</label>
                  <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Email:</label>
                  <input type="email" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Password:</label>
                  <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
                </div>
                <button type="submit" class="btn btn-primary ml-2" name="submit">Submit</button>
            </form>
            </div>
        </div>

        </div>
        <!-- /.container-fluid -->
<?php require('inc/footer.php'); ?>