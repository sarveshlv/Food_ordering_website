<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Order</h1>

            <br>

            <?php 
            
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];

                    $sql = "SELECT * FROM order_details WHERE id=$id";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    if($count==1)
                    {
                        $row = mysqli_fetch_assoc($res);

                        $food = $row['food'];
                        $status = $row['status'];
                    }
                    else
                    {
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            
            
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Food name:</td>
                        <td><?php echo $food; ?></td>
                    </tr>

                    <tr>
                        <td>Status: </td>
                        <td>
                            <select name="status" class="textarea">
                                <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                                <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                                <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                                <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>

                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update" class="btn-primary1 add-admin">
                        </td>
                    </tr>

                </table>
            </form>

            <?php 
            
                if(isset($_POST['submit']))
                {
                    $id = $_POST['id'];
                    $status = $_POST['status'];

                    $sql2 = "UPDATE order_details SET status = '$status' WHERE id=$id";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==true)
                    {
                        $_SESSION['update'] = "<div class='success'>Order updated successfuly!</div>";
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }
                    else
                    {
                        $_SESSION['update'] = "<div class='error'>Failed to update order!</div>";
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }
                }
            
            ?>
        </div>
    </div>

<?php include('partials/footer.php'); ?>