<?php 
    session_start() 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
	<title>All Customers</title>
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
                    <h1 class="text-primary">Customers List!</h1>
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Customers</li>
                    </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <div class="w-100"></div>
                                <th scope="col-1">ID</th>
                                <th scope="col-3">Firstname</th>
                                <th scope="col-2">Lastname</th>
                                <th scope="col-4">Email Address</th>
                                <th scope="col-1"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                require('open-connection.php');
                                $strSql= "SELECT * FROM tbl_customer ORDER BY customerID";
                            ?>

                               <?php  if($rsProducts = mysqli_query($con, $strSql)):?>
                                    <?php if(mysqli_num_rows($rsProducts) > 0):?>
                                        <?php while ($recProducts = mysqli_fetch_array($rsProducts)) {
                                            echo
                                            '<tr>
                                                <td>'.$recProducts['customerID'].'</td>
                                                <td>'.$recProducts['firstName'].'</td>
                                                <td>'.$recProducts['lastName'].'</td>
                                                <td>'.$recProducts['emailAddress'].'</td>
                                                <td></td>
                                                <td></td>
                                            </tr>';
                                            }
                                            mysqli_free_result($rsProducts);
                                        ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7">No Record Found!</td>
                                            </tr>
                                        <?php endif; ?>

                                    <?php else: echo 'ERROR: Could not execute your request.';?>
                                        <?php require('close-connection.php'); ?>
                                <?php endif; ?>
                        </tbody>
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>                
                </div>            
            </div>
             <div class="row mb-5">
                    <div class="d-grid gap-2 col-5 mx-auto">
                        
                    </div>
            </div>
 </div>






 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>