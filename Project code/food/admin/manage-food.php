<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Food</h1>

            <br><br>

            <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary1">Add Food</a>

            <br><br>

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

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                if(isset($_SESSION['unothorize']))
                {
                    echo $_SESSION['unothorize'];
                    unset($_SESSION['unothorize']);
                }

            
            ?>

            <table class="tb1-full">
                <tr>
                    <th>S No.</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php 
                
                    $sql = "SELECT * FROM  food_list";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    $sn=1;

                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            $price = $row['price'];
                            $image_name = $row['image_name'];
                            $active = $row['active'];
                            $featured = $row['featured'];

                            ?>

                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $price; ?></td>
                                <td>
                                    <?php 
                                        if($image_name=="")
                                        {
                                            echo "<div class='error'>Image not added</div>";
                                        }
                                        else
                                        {
                                            ?>
                                                <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" width="100px">
                                            <?php
                                        }
                                    
                                    ?>
                                </td>
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-primary4 b">Delete food</a>
                                </td>
                            </tr>

                            <?php

                        }
                    }
                    else
                    {
                        echo "<tr><td colspan = '7' class='error'> Food not added yet! </td></tr>";
                    }
                
                
                ?>
                
            </table>
        </div>
    </div>

<?php include('partials/footer.php'); ?>