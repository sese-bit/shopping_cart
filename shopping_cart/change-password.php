<?php
session_start() ;
$usertype = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/static-login-style.css">
    <title>Change Password</title>
</head>
<body>
    <div class="container">
            <div class="row mt-5">
                <div class="col-10">
                    <h1><i class="fa fa-store"></i> Change Password</h1>
                </div>
            </div>
        <hr>
        <?php
            if(isset($_POST['btnconfirm'])){
                require_once('open-connection.php');
                if(isset($_POST['usertype'])){
                    $type = ($_POST['usertype']);
                    $username = htmlspecialchars($_POST['txtusername']);
                    $password = htmlspecialchars($_POST['txtpassword']);
                    $newpassword = htmlspecialchars($_POST['txtnewpassword']);
                    if($password === $newpassword){
                        $username = stripcslashes($username);
                        $password = stripcslashes($password);

                        $username = mysqli_real_escape_string($con, $username);
                        $password = mysqli_real_escape_string($con, $password);

                        $password = md5($password);

                        if(isset($_SESSION['typeuser'])){
                            $currentpass = htmlspecialchars($_POST['txtcurrentpass']);
                            $currentpass = stripcslashes($currentpass);
                            $currentpass = mysqli_real_escape_string($con, $currentpass);
                            $currentpass = md5($currentpass);
                            $strSql= "
                                    SELECT * FROM tbl_user 
                                    WHERE username = '$username' AND password = '$currentpass'
                                ";

                            if($rsUser = mysqli_query($con, $strSql)){
                                if(mysqli_num_rows($rsUser) == 1) {
                                    $arruser = mysqli_fetch_assoc($rsUser);
                                    if ($arruser['password']==($password)) {
                                        echo'<div class="container-fluid text-center pt-3 mx-auto" style="width: 380px">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        You entered the same password used in account
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                               </button>
                                        </div>
                                        </div>';
                                    }
                                    else{
                                        $strSql = "
                                        UPDATE tbl_user SET
                                        password = '$password'
                                        WHERE username =  '$username';";
                                        $rsUser = mysqli_query($con,$strSql);
                                        echo'<div class="container-fluid text-center pt-3 mx-auto" style="width: 380px">
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Successfully Changed
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>';
                                        header('Location: index.php');
                                    }
                                }
                                else{
                                    echo'<div class="container-fluid text-center pt-3 mx-auto" style="width: 380px">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Account is not registered
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>';
                                }
                            }
                        }
                        else {
                            $strSql= "
                                        SELECT * FROM tbl_customer 
                                        WHERE emailAddress = '$username'
                                    ";
                            $rsUser = mysqli_query($con, $strSql);

                                if(mysqli_num_rows($rsUser) == 1){
                                    $arruser = mysqli_fetch_assoc($rsUser);
                                    if ($arruser['password']==($password)) {
                                        echo'<div class="container-fluid text-center pt-3 mx-auto" style="width: 380px">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        You entered the same password used in account
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        </div>';
                                    }
                                else{
                                    $strSql = "
                                    UPDATE tbl_customer SET
                                        password = '$changepassword'
                                    WHERE emailAddress =  '$username'
                                    ";
                                    echo'<div class="container-fluid text-center pt-3 mx-auto" style="width: 380px">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Successfully Changed
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    </div>';
                                }
                            }
                            else{
                                echo'<div class="container-fluid text-center pt-3 mx-auto" style="width: 380px">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Account is not registered
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    </div>';
                            }
                        }
                        require_once('close-connection.php');
                    }
                    else {
                        echo'<div class="container-fluid text-center pt-3 mx-auto" style="width: 380px">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Your confirm password is not match
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            </div>';
                    }
                }
            }
        ?>

        <div class="card card-container">
            <form class="form-signin" action="" method ="post">
                <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                <p id="profile-name" class="profile-name-card"></p>
                <h2 class="d-flex justify-content-center"><?php if(isset($_SESSION['typeuser'])){echo 'Admin';} else {echo 'Customer';} ?></h2>
                <br>
                <?php if(isset($_SESSION['typeuser'])){
                    echo '<input type="password" name="txtcurrentpass" id="txtcurrentpass" class="form-control" placeholder="Current Pasword" required autofocus>';
                    }
                ?>
                <input type="text" name="txtusername" id="txtusername" class="form-control" placeholder="Username" required autofocus <?php if(isset($_SESSION['typeuser'])){ $name = $_SESSION['adminuser']; echo "value='$name'";} ?>>
                <input type="password" name="txtpassword" id="txtpassword" class="form-control" placeholder="Password" required>
                <input type="password" name="txtnewpassword" id="txtnewpassword" class="form-control" placeholder="Confirm Password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="btnconfirm">Confirm</button>
                <a class="btn btn-lg btn-primary btn-block btn-signin pt-2" href="static-login.php" value="Login">Go Back</a>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>