<?php
include("connection.php");
session_start();
 if(isset($_POST["add_to_cart"]))
 {
     if(isset($_SESSION["shoppingCart"]))
     {
         $item_array_id = array_column($_SESSION["shoppingCart"], "item_id");
         if(!in_array($_GET["id"],$item_array_id))
         {
             $count = count($_SESSION["shoppingCart"]);
             $item = array(
                 'item_id' => $_GET['id'],
                 'item_name' => $_POST['hiddenname'],
                 'item_price' => $_POST['hiddeprice'],
                 'item_qty' => $_POST['qty'],
             );
             $_SESSION["shoppingCart"][$count] = $item;
         }
         else
         {
             echo "<script>alert('Item Already added')</script>";
             echo "<script>window.location='detail.php'</script>";
         }
     }
     else
     {
         $item = array(
             'item_id' => $_GET['id'],
             'item_name' => $_POST['hiddenname'],
             'item_price' => $_POST['hiddeprice'],
             'item_qty' => $_POST['qty'],
         );
         $_SESSION["shoppingCart"][0] = $item;
     }
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<style>
    tr
    {
        border: 1px solid;
    }

    td{
        border: 1px solid;
    }
    th{
        border: 1px solid;
    }
    
</style>
</head>
<body>
    <div class="container">
        
        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand"  href="index.php">Home</a>
            </div>
            <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
            
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li ><a href="#" style="color:white"><span style="color:white" class="glyphicon glyphicon-user"></span> Cart ( 0 ) </a></li>
            <li><a href="#" style="color:white"><span style="color:white" class="glyphicon glyphicon-log-in"></span> Price ( 0 ) </a></li>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
        </nav>
        <h1>Your Shopping Cart</h1>
        
        <table class="table table-hover">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Net amount</th>
            <th>Action</th>
        </tr>
        <?php 
        if(!empty($_SESSION["shoppingCart"]))
        {
            $total = 0;
            $netamount = 0;
            $i = 1;
            foreach ($_SESSION["shoppingCart"] as $key => $value) {
            
        ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $value["item_name"] ?></td>
            <td><?php echo $value["item_price"] ?></td>
            <td><?php echo $value["item_qty"] ?></td>
            <td><?php echo number_format($value["item_qty"] * $value["item_price"]) ?></td>
            <td><a href="cart.php?action=delete&id=<?php echo $value["item_id"] ?>" class="btn btn-danger">Remove</a></td>
        </tr>
        <?php
                $netamount = $netamount + ($value["item_qty"] * $value["item_price"]);
        ?>

        <?php }} ?>
        <tr style="border: 1px solid;">
            
            <td colspan="4" style="text-align: center; font-weight: bolder;">Grand total</td>
            <td><?php echo $netamount ?></td>
            
        </tr>
        
    </table>

    </div>

</body>
</html>