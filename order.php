<?php 
	require 'config.php';
	if(isset($_GET['ID'])){
		$id=$_GET['ID'];
		$sql="SELECT * FROM product WHERE ID='$id'";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result);

		$pname=$row['product_name'];
		$pprice=$row['product_price'];
		$del_charge=50;
		$total_price=$pprice+$del_charge;
		$pImage=$row['product_image'];
	}
	else{
		echo 'No product found!';
	}
?>

<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Harshita Garg">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Complete your Order</title>
		<!-- latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">ShopKart</a>
<div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Categories</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10 mb-5">
			<h2 class="text-center p-2 text-primary">Fill the details to complete your order</h2>
			<h3>Product Details: </h3>
			<table class="table table-bordered" width="500px">
				<tr>
					<th>Product Name : </th>
					<td><?= $pname; ?></td>
					<td rowspan="4" class="text-center"><img src="<?= $pImage; ?>" width="200"></td>
				</tr>
							<tr>
					<th>Product Price : </th>
					<td><?= number_format($pprice); ?>/-</td>
				</tr>
							<tr>
					<th>Delivery Charge : </th>
					<td><?= number_format($del_charge); ?>/-</td>
				</tr>
							<tr>
					<th>Total Price : </th>
					<td><?= number_format($total_price);  ?>/-</td>
				</tr>
			</table>
			<h4>Enter your details :</h4>
			<form action="pay.php" method="post" accept-charset="utf-8">
				<input type="hidden" name="product_name" value="<?= $pname; ?>">
				<input type="hidden" name="product_price" value="<?= $pprice; ?>">
<div class="form-group">
	<input type="text" name="name" class="form-control" placeholder="Enter your name" required>
</div>
<div class="form-group">
	<input type="email" name="email" class="form-control" placeholder="Enter your E-mail" required>
</div>
<div class="form-group">
	<input type="tel" name="phone" class="form-control" placeholder="Enter your contact number" required>
</div>
<div class="form-group">
	<input type="submit" name="submit" class="btn btn-danger btn-lg" value="Click to pay :  Rs. <?= number_format($total_price); ?>/-">
</div>
			</form>
		</div>
	</div>
</div>
	</body>
	</html>