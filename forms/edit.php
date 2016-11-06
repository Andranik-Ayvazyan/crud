<?php
if(isset($_REQUEST['prod_name']) && isset($_REQUEST['prod_desc']) && isset($_REQUEST['prod_price']) && isset($_REQUEST['prod_qty']) && isset($_REQUEST['prod_expiry']) &&  isset($_REQUEST['prod_id'])) :
    $prod_id = $_REQUEST['prod_id'];
    $prod_name = $_REQUEST['prod_name'];
    $prod_desc = $_REQUEST['prod_desc'];
    $prod_price = $_REQUEST['prod_price'];
    $prod_qty = $_REQUEST['prod_qty'];
    $prod_expiry = $_REQUEST['prod_expiry'];
    $prod_expiry = date("Y-m-d", strtotime($prod_expiry));
    require 'connect.php';
    $sql = "UPDATE product set name = '$prod_name', description = '$prod_desc ', price ='$prod_price', quantity = '$prod_qty', expiry = '$prod_expiry' WHERE id = $prod_id ";
    if(mysqli_query($con,$sql)):
      header('location:http://crud.loc/');
    endif;
else:

    require 'connect.php';
    $sql = "SELECT * FROM product WHERE id = $prod_id";
    $result = mysqli_query($con, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        echo " <a href = 'http://crud.loc/'>Return to main page</a>
               <div class='edit_prod'>
                   <form action = '' method = 'post'>
                         <label><p class='name_warning'>Fill only letters!</p><p>Name:</p><input class = 'product_name' name='prod_name' type = 'text' value = '" . $row['name'] . "' required></label>
                         <label><p class='name_warning'>Fill only letters!</p><p>Description:</p><textarea class = 'product_desc' name='prod_desc' required>" . $row['description'] . "</textarea></label>
                         <label><p class='number_warning'>Fill only numbers!</p><p>Price:</p><input class = 'product_price' type = 'text' name='prod_price' value = '" . $row['price'] . "' required></label>
                         <label><p class='number_warning'>Fill only numbers!</p><p>Quality:</p><input class = 'product_qty' type = 'text' name='prod_qty' value = '" . $row['quantity'] . "' required></label>
                         <label><p>Expiry date:</p><div class='input-group date'>
                                <input type='text' class='form-control product_expiry' name='prod_expiry' value='".$row['expiry']."'>
                                <div class='input-group-addon'>
                                    <span class='glyphicon glyphicon-th'></span>
                                </div>
                               </div>
                         </label>
                         <label><input type='hidden' name = 'prod_id' value ='" . $row['id'] . "'></label>
                         <label><input type='submit' class='btn btn-success editing_product' value ='edit'></label>
                   </form>
               </div>";
    }
endif;


