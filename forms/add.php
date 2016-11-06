<?php
if(!empty($_REQUEST['prod_name']) && !empty($_REQUEST['prod_desc']) && !empty($_REQUEST['prod_qty']) && !empty($_REQUEST['prod_price']) && !empty($_REQUEST['prod_expiry'])) {
    $prod_name = $_REQUEST['prod_name'];
    $prod_desc = $_REQUEST['prod_desc'];
    $prod_price = $_REQUEST['prod_price'];
    $prod_qty = $_REQUEST['prod_qty'];
    $prod_expiry = $_REQUEST['prod_expiry'];
    $prod_expiry = date("Y-m-d", strtotime($prod_expiry));
    require 'connect.php';
    $sql = "INSERT INTO product VALUES (null,'$prod_name','$prod_desc','$prod_price','$prod_qty','$prod_expiry')";
    if (mysqli_query($con, $sql)) {
        header('location:http://crud.loc/');
    } else {
        header('location:http://crud.loc/');
    }


} else {
    echo " 
        <a href = 'http://crud.loc/'>Return to main page</a>
        <div class='add'>
         <div class='form-group'>
            <form action='' method = 'post'>
            <label><p class='name_warning'>Fill only letters!</p><p> Name:</p><input class = 'product_name' name = 'prod_name' type = 'text' required></label>
            <label><p class='name_warning'>Fill only letters!</p><p>Description:</p><textarea class = 'product_desc' name = 'prod_desc' required></textarea></label>
            <label><p class='number_warning'>Fill only numbers!</p><p>Price:</p><input class = 'product_price' name = 'prod_qty' type = 'text'  required></label>
            <label><p class='number_warning'>Fill only numbers!</p><p>Quantity:</p><input class = 'product_qty' name = 'prod_price' type = 'text' required></label>
            <label><p>Expiry date:</p><div class='input-group date' id='datepicker'>
                    <input type='text' class='form-control product_expiry' name = 'prod_expiry' value='2016-12-02'>
                    <div class='input-group-addon'>
                        <span class='glyphicon glyphicon-th'></span>
                    </div>
                   </div>
            </label>
            <input type='submit' class='btn btn-success adding_product' value ='submit'></label>
            </form>
         </div>
       </div>";
}

