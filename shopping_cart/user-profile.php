<?php 
    session_start() 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>Your Profile</title>
</head>
<body>
    <div class="container">
        <div class="row mt-2">
            <div class="col-10">
                <h1><i class="fa fa-store"></i> Learn IT Easy Online Shop</h1>
            </div>      
        </div>
        <hr>

        <div class="row">
            <div class="col-12">
                <h1 class="text-primary">User Profile!</h1>
            </div>
            <div class="col-12">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Your Profile</li>
                </ol>
                </nav>
            </div>
        </div>
        
        <?php 
        require ('open-connection.php');
        $name = $_SESSION['adminuser'];
        $strSql = mysqli_query($con,"SELECT * FROM `tbl_user` WHERE `username`='$name';");
        $rsuser=mysqli_fetch_array($strSql); 
        require ('close-connection.php');
        ?>
        <div class="row">
        <div class="col-sm-2">
            <br>
            <i class="fa fa-users fa-6x"></i>
        </div>
        <div class="col-sm-10">
            <table class="table table-bordered">
            <tr>
                <td>User ID</td>
                <td><?php echo $rsuser['userId']; ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php echo ucwords($rsuser['name']); ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $rsuser['username']; ?></td>
            </tr>
            </table>
            <a class="btn btn-warning pull-right" href="change-password.php">Edit Profile</a>
        </div>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>