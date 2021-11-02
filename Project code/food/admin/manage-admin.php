<?php include('partials/menu.php'); ?>

        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>

                <br>

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['user-not-founf']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);

                    }

                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }
                ?>
                <br><br>
                
                <a href="add-admin.php" class="btn-primary1">Add admin</a>
                <br><br>
                <table class="tb1-full">
                    <tr>
                        <th>S.no</th>
                        <th>Full name</th>
                        <th>Username</th>
                        <th>Actions</th>
                        
                    </tr>

                    <?php
                        $sql = "SELECT * FROM admin_details";

                        $res = mysqli_query($conn, $sql);

                        if($res==TRUE)
                        {
                            $count = mysqli_num_rows($res);

                            $sn=1;

                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $id = $rows['id'];
                                    $fullname = $rows['fullname'];
                                    $username = $rows['username'];

                                    ?>
                                        <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $fullname; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary2">Change password</a>
                                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-primary3">Update</a>
                                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-primary4">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                                
                            }
                            else
                            {

                            }
                        }
                    ?>


                    
                </table>
            </div>
        </div>

<?php include('partials/footer.php'); ?>