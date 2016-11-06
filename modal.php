<?php
if(isset($_REQUEST['prod_id'])) {
    $prod_id= $_REQUEST['prod_id'];
    require 'connect.php';
    $sql = "SELECT * FROM product WHERE id = $prod_id";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    echo "<div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>".$row['name']."</h4>
        </div>
        <div class='modal-body'>
          <h5>Price: ".$row['price']."</h5>
          <h5>Quantity: ".$row['quantity']."</h5>
          <h5>Expiry date: ".$row['expiry']."</h5>
          <fieldset>
        <legend>Product description:</legend>
        <p>".$row['description']."</p>
      </fieldset>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div>";
}
?>