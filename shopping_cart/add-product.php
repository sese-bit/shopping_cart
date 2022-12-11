<?php 
	
	if(isset($_POST['btnAdd'])){
		if(isset($_POST['txtname']) AND isset($_POST['txtdescription']) AND isset($_POST['txtprice']) AND isset($_POST['txtphoto1']) AND isset($_POST['txtphoto2'])){
			require('open-connection.php');
	

					$name = $_POST['txtname'];
					$description = $_POST['txtdescription'];
					$price = $_POST['txtprice'];
					$photoname1 = $_POST['txtphoto1'];
					$photoname2 = $_POST['txtphoto2']; 
					$strSql = "
					INSERT INTO tbl_products(name, description, price, photo1, photo2)
					VALUES ('$name','$description','$price','$photoname1','$photoname2')";
					// $photo1 = explode('.', $_FILES['txtphoto1']['name']);
					// $photo2 = explode('.', $_FILES['txtphoto2']['name']);
					// $photo1 = end($photo1); 
					// $photo2 = end($photo2); 
					$rsProduct = mysqli_query($con, $strSql);
					$target_dir = "img/";
					if (isset($_FILES['txtphoto1'])) {
						$photo1 = $target_dir . basename($_FILES["txtphoto1"]["name"]);
						$imageFileType1 = strtolower(pathinfo($photo1,PATHINFO_EXTENSION));
					}
					if (isset($_FILES['txtphoto2'])) {
						$photo2 = $target_dir . basename($_FILES["txtphoto2"]["name"]);
						
					}
					
					
					

					// $photonum = (count(glob($directory)))/2;
					// $photo1 = "product$photonumA".'.'.$photo1;
					// $photo2 = "product$photonumB".'.'.$photo2;

					// $photokey = (count(glob($uploadDIR))/2);
					// if(isset($filetemp1) & isset($filetemp2)){
					// 	move_uploaded_file($filetemp1, $uploadDIR . "product");
					// }

					// $photo1 = $_POST['txtphoto1'];
					// $photo2 = $_POST['txtphoto2'];
		}
				else{
					echo 'ERROR: Failed to insert Record!';
					require ('close-connection.php');
				}	
	}

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
	<title>Add Product</title>

</head>
<body>
	<div class="container">
		<div class="col-10 mt-5" >
                <h1><i class="fa fa-store"></i> Learn IT Easy Online Shop</h1>
            </div>
		<hr>


		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
						<header class="card-header">
							<h4 class="card-title mt-2">Add Product</h4>
						</header>
					<article class="card-body">

						<form enctype="multipart/form-data" method="post">
						<div class="form-row">
							<div class="col form-group">
								<label>Product name </label>   
							  	<input class="form-control" type="text" name="txtname" id="txtname" placeholder=""  required>
							</div> <!-- form-group end.// -->
							<div class="col form-group">
								<label>Price</label>
							  	₱<input class="form-control" type="Number" name="txtprice" id="txtprice" placeholder=""  required>
							</div> <!-- form-group end.// -->
						</div> <!-- form-row end.// -->
						<div class="form-group">
							<label>Description</label>
  							<textarea class="form-control" name="txtdescription" id="txtdescription" rows="4" required></textarea>
						</div> <!-- form-group end.// -->
						<div class="form-row">
							<div class="form-group col-md-6">
							  <label for="txtphoto1">Photo 1</label>
							  <input name="txtphoto1" type="file" accept="image/*"  class="form-control" id="txtphoto1" required="">
							</div> <!-- form-group end.// -->
							<div class="form-group col-md-6">
							  <label for="txtphoto2">Photo 2</label>
							  <input name="txtphoto2" type="file" accept="image/*"  class="form-control" id="txtphoto2" required="">
							</div> <!-- form-group end.// -->
						</div> <!-- form-row.// -->
						<div class="form-row">
							<div class="form-group col-md-6">
							  <button type="submit" class="btn btn-primary btn-block" name="btnAdd">Add Product</button>
							</div> <!-- form-group end.// -->
							<div class="form-group col-md-6">
							   <a href="all-products.php" class="btn btn-danger btn-block">Cancel/Go Back</a>
							</div> <!-- form-group end.// -->
						</div> <!-- form-row.// -->
					</form>
					</article> <!-- card-body end .// -->
				</div> <!-- card.// -->
			</div> <!-- col.//-->
		</div> <!-- row.//-->
	</div> 
	<!--container end.//-->

	<br><br>
	</article>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>