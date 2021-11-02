<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper order">
            <h1>Manage Order</h1>

            <br>

            <?php 
            
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            
            
            ?>


                <br><br>

                <table class="tb1-full order1">
                    <tr>
                        <th class="width">S.no</th>
                        <th>Food</th>
                        <th class="width">Price</th>
                        <th class="width">Qty.</th>
                        <th class="width">Total</th>
                        <th class="date-width">Order Date</th>
                        <th class="date-width">Status</th>
                        <th>Customer name</th>
                        <th>Customer contact</th>
                        <!--th>Email</th>-->
                        <th>Address</th>
                        <th>Actions</th>
                        
                    </tr>

                    <?php 
                    
                        $sql = "SELECT * FROM order_details ORDER BY id DESC";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        $sn=1;

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $food = $row['food'];
                                $price = $row['price'];
                                $qty = $row['quantity'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                /*$customer_email = $row['customer_email'];*/
                                $customer_address = $row['customer_address'];
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $food; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $order_date; ?></td>

                                        <td>
                                            <?php 
                                                if($status=="Ordered") {
                                                     echo "<label>$status</label>";
                                                } 
                                                else if($status=="On Delivery") {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                else if($status=="Delivered") {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                else if($status=="Cancelled") {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>


                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>

                                        <!--<td>/*<//?php echo $customer_email; ?>*/</td>-->

                                        <td class="address"><?php echo $customer_address; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-primary1">Update Order</a>
                                        </td>
                                    </tr>
                                <?php

                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='12' class='error'>Orders not available!</td></tr>";
                        }
                    
                    
                    ?>

                    
                </table>
        </div>
    </div>

<?php include('partials/footer.php'); ?>