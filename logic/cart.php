<?php
    include_once('pages/header.php');
    include_once('pages/navigation.php');
    include_once('models/functions.php');
    //include_once('')

if(isset($_POST["addToCart"])){
	$p_id = $_POST["proId"];
	if(isset($_SESSION["uid"])){
		$user_id = $_SESSION["uid"];
		$sql = "SELECT * FROM cart WHERE idProduct = '$p_id' AND idKorisnik = '$user_id'";
		$run_query = $konekcija->query($sql)/*mysqli_query($con,$sql)*/;
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>
			";
		} else {
			$sql = "INSERT INTO korpazakupovinu
			('idProduct','idKorisnik','kolicina') 
			VALUES ('$p_id','$user_id',1)";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added..!</b>
					</div>
				";
			}
		}
		}else{
			$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($con,$sql);
			if (mysqli_num_rows($query) > 0) {
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>";
					exit();
			}
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','-1','1')";
			if (mysqli_query($con,$sql)) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Your product has been added to cart!</b>
					</div>
				";
				exit();
			}
			
		}
	}
?>