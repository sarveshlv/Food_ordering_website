<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add admin</h1>
        <br>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter you name" class="textarea"></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Your username" class="textarea"></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Your password" class="textarea"></td>
                </tr>

                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Add admin" class="btn-primary1 add-admin"></td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php

    if(isset($_POST['submit']))
    {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "INSERT INTO admin_details SET 
            fullname='$full_name',
            username='$username',
            password='$password'";


        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res==TRUE)
        {
            $_SESSION['add'] = "Admin added successfully";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else {

            $_SESSION['add'] = "Failed to add Admin";
            header("location:".SITEURL.'admin/add-admin.php');
        }



    }
    

?>