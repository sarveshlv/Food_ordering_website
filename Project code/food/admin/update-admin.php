<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update admin</h1>

            <br>

            <?php 

                $id = $_GET['id'];
                $sql = "SELECT * FROM admin_details WHERE id=$id";
                $res = mysqli_query($conn, $sql);

                if($res==TRUE)
                {
                    $count=mysqli_num_rows($res);
                    if($count==1)
                    {
                        $row = mysqli_fetch_assoc($res);

                        $fullname = $row['fullname'];
                        $username = $row['username'];

                    }
                    else
                    {
                        header('location:'.SITEURL.'admin/manage-admin.php');

                    }
                }

            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full name:</td>
                        <td><input type="text" name="fullname" value="<?php echo $fullname; ?>" class="textarea"></td>
                    </tr>

                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" value="<?php echo $username; ?>" class="textarea"></td>

                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Admin" class="btn-primary1 add-admin">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <?php 
        if(isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];

            $sql = "UPDATE admin_details SET fullname='$fullname',username='$username' WHERE id='$id'";

            $res = mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                $_SESSION['update'] = "<div class='success'>Admin Updated successfully</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
            else
            {
                $_SESSION['update'] = "<div class='success'>Failed to update admin details</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
    ?>

<?php include('partials/footer.php'); ?>