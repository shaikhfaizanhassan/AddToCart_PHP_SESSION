    <?php
    session_start();
    include("connection.php");


    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shopping</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<style>
    .box
    {
        width: 100%;
        height: auto;
        
        padding:10px;
        border: 1px solid;
    }
    .box img
    {
        width: 100%;
        height: 500px;
        
    }
    a
    {
        color: black;
    }
    a:hover
    {
        text-decoration: none;
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
        <div class="row">
        <?php
        if (isset($_GET["pdetails"])) {
            $pid = $_GET["pdetails"];
            $g = mysqli_query($con, "select * from product where id='$pid'");
            $fetch = mysqli_fetch_array($g);
        
        
        ?>
            <form action="cart.php?action=add&id=<?php echo $fetch[0] ?>" method="POST">
            <div class="col-lg-8">
                <div class="box">
                    <img src="image/<?php echo $fetch[3] ?>" alt="">
                    <h2>
                    <a href="detail.php?pdetails=<?php echo $fetch[0] ?>"><?php echo $fetch[1] ?></a>
                    </h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi numquam hic deserunt quod quisquam! Aperiam reprehenderit perferendis neque nihil officiis, ducimus sed culpa commodi accusamus magnam repellendus, officia iste saepe! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, facere? Nam magni voluptatem illum provident porro voluptas corporis iusto, a molestiae repellendus dolore officiis commodi ipsam saepe quod accusamus blanditiis.</p>
                    <h3 style="color:red">Rs <?php echo $fetch[2] ?></h3>
                    <input type="text" name="qty" class="form-control" placeholder="Enter Quantity">
                    <input type="hidden" name="hiddenname" value="<?php echo $fetch[1] ?>">
                    <input type="hidden" name="hiddeprice" value="<?php echo $fetch[2] ?>"> 
                    <br>
                
                    <input type="submit" name="add_to_cart" class="btn btn-success">
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php } ?>