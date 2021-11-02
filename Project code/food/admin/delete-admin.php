<?php

    include('../config/constants.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM admin_details WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        //echo "Admin Deleted";
        $_SESSION['delete'] = "<div class='success'>Admin deleted successfully</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');

    }
    else
    {
        //echo "Failed to delete";
        $_SESSION['delete'] = "<div class='error'>Failed to delete admin</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

?>
