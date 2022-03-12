<?php
    /*include('../config/connections.php');
    if(isset($_POST['actionX']))
    {

        $upit='SELECT * FROM proizvodi';
        
        if(isset($_POST['categoriesX']))
        {
            $cat_filter=implode("','",$_POST['cateogoriesX']);
            $upit.="
            AND idCategory IN('".$cat_filter."')
            ";
        }
        $obrada=$konekcija->prepare($upit);
        $obrada->execute();
        $rezultat=$obrada->fetchAll();
        $counter=$obrada->rowCount();
        if($counter>0)
        {
            foreach($rezultat as $red)
            {
                echo "<div class='col-lg-4 col-md-6 mb-4'>";
        echo "<div class='card h-100'>";
        echo "<a href='#'><img class='card-img-top' src='".$red->ProductImage."'</img></a>";
        echo "<div class='card-body'>
            <h5 class='productNamealign' text-align='center'>".$red->ProductName."</h5 ></div>";
        echo "<h3 class='price'>".$red->ProductPrice."$</h3>";
        echo "<div class='card-footer'></div>";
        //echo ""
        echo "<a href='#' class='btn btn-primary'>Add to Cart</a>";
        echo "</div>";
        echo "</div>";
            }
                

        }
    else $output='<h3>No data found</h3>';
    }*/
	session_start();
	$ip_add = getenv("REMOTE_ADDR");
	include "../config/connections.php";
	if(isset($_POST["category"])){
	$category_query = "SELECT * FROM kategorije";
	//$run_query->prepare($category_query);//mysqli_query($konekcija,$category_query) or die(mysqli_error($konekcija));
	$rezultat=$konekcija->query($category_query);
	//$rezultatObrade=$rezultat->fetchAll();
	//$res=json_encode($rezultatObrade,true);
	echo "
		<div class='nav nav-pills nav-stacked'>
		<ul class='list-group' id='noList' style='list-style:none;'>
			<li class='active'><a href='#'><h4>Categories</h4></a></li>
	";
	foreach($rezultat as $row){
		//$row=json_encode($rezultatObrade,true);
		$cid = $row->idCategory;//["idCategory"];
		$cat_name = $row->CategoryName;//["CategoryName"];
		echo"
		<li><a href='#' class='list-group-item category' cid='$cid'>$cat_name</a></li>
		";
		//echo "<br/>";
	}
	echo "</ul></div>";
}
else
{
	/*$var=$_POST['category'];
	echo $var;*/
	//echo "GRESKA";
}
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brend";
	//$run_query = mysqli_query($con,$brand_query);
	$rezultat=$konekcija->query($brand_query);
	$rezultatObrade=$konekcija->query($brand_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
		<ul class='list-group' id='noList' style='list-style:none;'>
			<li class='active'><a href='#'><h4>Brands</h4></a></li>
	";
	foreach($rezultatObrade as $row){
		//$row=json_encode($rezultatObrade,true);
		$bid = $row->brendID;//["idCategory"];
		$brand_name = $row->brendName;//["CategoryName"];
		echo"
			<li><a href='#' class='list-group-item selectBrand' bid='$bid'>$brand_name</a></li>
		";
		//echo "<br/>";
	}
	echo"</ul></div>";
}
/*if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}*/
if(isset($_POST["getProduct"])){
	//$limit = 9;
	/*if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}*/
	$product_query = "SELECT * FROM proizvodi";
	$run_query =$konekcija->query($product_query); //mysqli_query($con,$product_query);
	$rezultat=$run_query->fetchAll();
		foreach($rezultat as $row){
			$pro_id    = $row->idProduct;
			$pro_cat   = $row->idCategory;
			$pro_brand = $row->brendID;
			$pro_title = $row->ProductName;
			$pro_price = $row->ProductPrice;
			$pro_image = $row->ProductImage;
			echo "<div class='col-lg-4 col-md-6 mb-4'>";
			echo "<div class='card h-100'>";
			echo "<a href='#'><img class='card-img-top' src='".$row->ProductImage."'</img></a>";
			echo "<div class='card-body'>
				<h5 class='productNamealign' text-align='center'>".$row->ProductName."</h5 ></div>";
			echo "<h3 class='price'>".$row->ProductPrice."$</h3>";
			echo "<div class='card-footer'></div>";
			//echo ""
			echo "<a href='#' class='btn btn-primary'>Add to Cart</a>";
			echo "</div>";
			echo "</div>";	
			
		}
	}
	if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"])){
		if(isset($_POST["get_seleted_Category"])){
			$id = $_POST["idCategory"];
			$sql = "SELECT * FROM proizvodi WHERE idCategory = '$id'";
		}else if(isset($_POST["selectBrand"])){
			$id = $_POST["brendID"];
			$sql = "SELECT * FROM proizvodi WHERE brendID = '$id'";
		}else {
			$keyword = $_POST["keyword"];
			$sql = "SELECT * FROM proizvodi WHERE product_keywords LIKE '%$keyword%'";
		}
		
		$run_query = $konekcija->query($sql);//mysqli_query($konekcija,$sql);
		$rezultat=$run_query->fetchAll();
		foreach($rezultat as $row){
				$pro_id    = $row->idProduct;
				$pro_cat   = $row->idCategory;
				$pro_brand = $row->brendID;
				$pro_title = $row->ProductName;
				$pro_price = $row->ProductPrice;
				$pro_image = $row->ProductImage;
				echo "<div class='col-lg-4 col-md-6 mb-4'>";
			echo "<div class='card h-100'>";
			echo "<a href='#'><img class='card-img-top' src='".$row->ProductImage."'</img></a>";
			echo "<div class='card-body'>
				<h5 class='productNamealign' text-align='center'>".$row->ProductName."</h5 ></div>";
			echo "<h3 class='price'>".$row->ProductPrice."$</h3>";
			echo "<div class='card-footer'></div>";
			//echo ""
			echo "<a href='#' class='btn btn-primary cartCollection'>Add to Cart</a>";
			echo "</div>";
			echo "</div>";	
			}
		}
?>