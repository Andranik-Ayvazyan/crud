<?php
if(isset($_REQUEST['prod_id'])):
 $prod_id = $_REQUEST['prod_id'];
 require 'connect.php';
 $sql = "SELECT id,name FROM product WHERE id = $prod_id ";
 $result = mysqli_query($con,$sql);
 $row = mysqli_fetch_assoc($result);
 echo "  <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal'>&times;</button>
                            <h4 class='modal-title'>Deleting product</h4>
                        </div>
                        <div class='modal-body'>
                            <h4>Are you want to delete product ''<b>".$row['name']."</b>'' ?</h4>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-info' data-dismiss='modal'>Cancel</button>
                            <button type='button' id = '".$row['id']."' class='btn btn-danger deleting_product'>Delete</button>
                        </div>
                    </div>
                </div>";
endif;

if(isset($_REQUEST['confirmed_id'])):
 $prod_id = $_REQUEST['confirmed_id'];
 require 'connect.php';
 $sql = "DELETE FROM product WHERE id = $prod_id ";
 mysqli_query($con,$sql);
endif;


