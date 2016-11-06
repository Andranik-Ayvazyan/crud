<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/css/main.css" type="text/css">
    <link rel="stylesheet" href="/css/bootstrap-datepicker.css" type="text/css">
</head>
<body>
<?php
if($_SERVER['REQUEST_URI']!=='/'):
    $url = explode('/',$_SERVER['REQUEST_URI']);
    $str = $url[2];
    $pattern = '/[a-z]/';
     if(preg_match($pattern,$str))
     {
         exit('wrong parameter');
     }
       else
     {
         $prod_id = $url[2];
     }
    switch ($url[1])
    {
        case 'edit';
        include 'forms/edit.php';
        break;
        case 'add';
        include 'forms/add.php';
        break;

    }
else : ?>
<div class="container-fluid">
   <p class="add_button"><a href ='/add/' class="btn btn-primary add_prod" >Add</a></p>
    <div class="row">
        <div class="col-md-10 col-xs-12 col-lg-10 col-sm-10">
        <?php
        require_once 'connect.php';
        $sql = "SELECT * FROM product";
        $result = mysqli_query($con,$sql);
        if (mysqli_num_rows($result)>0) {
           echo "<table class='product_view'>";
            echo     "<tr><th class='td_number'>#</th><th class='td_name'>Name</th><th class='td_desc'>Description</th><th class='td_price'>Price</th><th>Quality</th><th>Expiry Date</th><th>Action</th></tr>";
           while($row = mysqli_fetch_assoc($result)) {
               echo "<tr><td class='td_number'>".$row['id']."</td><td class='td_name'><a class='prod_name'  data-toggle='modal' data-target='#myModal'>".$row['name']."</a></td><td class='prod_desc'>".$row['description']."</td><td class='prod_price'>".$row['price']."</td><td class='prod_qty'>".$row['quantity']."</td><td  class='prod_expiry'>".$row['expiry']."</td><td><a href = '/edit/".$row['id']."' class='btn btn-primary btn-xs prod_edit'>Edit</a><button class='btn btn-danger btn-xs prod_del' data-toggle='modal' data-target='#myModal' id='".$row['id']."'>Delete</button></td></tr>";
           }
           echo "</table >";
        }
        ?>

            <!-- Modal delete_product -->
            <div class="modal fade" id="myModal" role="dialog"></div>
         </div>
       </div>
    <div class = "status"></div>
</div>
<?php endif; ?>
<script src="/js/jquery.js" type="text/javascript"></script>
<script src="/js/bootstrap.js" type="text/javascript"></script>
<script src="/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="/js/main.js" type="text/javascript"></script>
</body>
</html>
