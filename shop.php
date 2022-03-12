<?php
    include_once('pages/header.php');
    include_once('pages/navigation.php');
    include_once('models/functions.php');
    $counter=0;
?>
<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2 col-xs-12">
				<div id="get_category">

				</div>
				<div id="get_brand">

				</div>
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Products</div>
					<div class="panel-body">
							<!--Here we get product jquery Ajax Request-->
						        <!--<div id="get_product" class='col-sm-12 col-lg-9 mt-2'>-->
                                    <div class='row col-sm-12 col-lg-9 mt-2' id='get_product'>

                                    </div>
							<!--Here we get product jquery Ajax Request-->

                                <!--</div>-->
						<!--<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">Samsung Galaxy</div>
								<div class="panel-body">
									<img src="product_images/images.JPG"/>
								</div>
								<div class="panel-heading">Rs.500.00
									<button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
								</div>
							</div>
						</div> -->
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
<!--<div id="coverShop">
    <div id="tekst">
        <h2>Shop</h2>
        <p>Check clothes and brands that we have in our collection!</p>
    </div>
</div>
<div id="filterColumn">
    <div id="leftColumn">
    </ul>
    <input type="button" id="filterResult" value='Filter Result'/>
    <div id='row searchResults'></div>
    <div class="col-md-9">
             <br />
                <div class="row filter_data">

                </div>
            </div>
    </div>-->
    

    
    <!--<section class="pt-5 pb-5">
    <div class="container">
      <h2 class="text-center font-weight-bold mb-5 mt-5">Related products</h2>
      <div class="row d-flex equal">
          <div class="  col-md-4 mb-4">
              <div class="card h-100 border-0">
                  <div class="card-img-top">
                      <img src="http://via.placeholder.com/350/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap">
                  </div>
                  <div class="card-body text-center">
                      <h4 class="card-title">
                          <a href="#" class=" font-weight-bold text-dark text-uppercase small"> Product name</a>
                        </h4>
                      <h5 class="card-price small text-warning">
                          <i>
                            <s>$599</s> $299</i>
                        </h5>
                  </div>
              </div>
          </div>
          <div class=" col-md-4 mb-4">
              <div class="card h-100 border-0">
                  <div class="card-img-top">
                      <img src="http://via.placeholder.com/350/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap">
                  </div>
                  <div class="card-body text-center">
                      <h4 class="card-title">
                          <a href="#" class=" font-weight-bold text-dark text-uppercase small"> Product name</a>
                        </h4>
                      <h5 class="card-price small text-warning">
                          <i>
                            <s>$599</s> $299</i>
                        </h5>
                  </div>
              </div>
          </div>
          <div class=" col-md-4 mb-4">
              <div class="card h-100 border-0">
                  <div class="card-img-top">
                      <img src="http://via.placeholder.com/350/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap">
                  </div>
                  <div class="card-body text-center">
                      <h4 class="card-title">
                          <a href="#" class=" font-weight-bold text-dark text-uppercase small"> Product name</a>
                        </h4>
                      <h5 class="card-price small text-warning">
                          <i>
                            <s>$599</s> $299</i>
                        </h5>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="container">
      <h2 class="text-center font-weight-bold mb-5 mt-5">Related products</h2>
      <div class="row d-flex equal">
          <div class="  col-md-4 mb-4">
              <div class="card h-100 border-0">
                  <div class="card-img-top">
                      <img src="http://via.placeholder.com/350/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap">
                  </div>
                  <div class="card-body text-center">
                      <h4 class="card-title">
                          <a href="#" class=" font-weight-bold text-dark text-uppercase small"> Product name</a>
                        </h4>
                      <h5 class="card-price small text-warning">
                          <i>
                            <s>$599</s> $299</i>
                        </h5>
                  </div>
              </div>
          </div>
          <div class=" col-md-4 mb-4">
              <div class="card h-100 border-0">
                  <div class="card-img-top">
                      <img src="http://via.placeholder.com/350/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap">
                  </div>
                  <div class="card-body text-center">
                      <h4 class="card-title">
                          <a href="#" class=" font-weight-bold text-dark text-uppercase small"> Product name</a>
                        </h4>
                      <h5 class="card-price small text-warning">
                          <i>
                            <s>$599</s> $299</i>
                        </h5>
                  </div>
              </div>
          </div>
          <div class=" col-md-4 mb-4">
              <div class="card h-100 border-0">
                  <div class="card-img-top">
                      <img src="http://via.placeholder.com/350/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap">
                  </div>
                  <div class="card-body text-center">
                      <h4 class="card-title">
                          <a href="#" class=" font-weight-bold text-dark text-uppercase small"> Product name</a>
                        </h4>
                      <h5 class="card-price small text-warning">
                          <i>
                            <s>$599</s> $299</i>
                        </h5>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>-->
    <!--<div id="rightColumn">-->
        
        
    <!--<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>-->
        <!--<div class="row"></div>
        <div class="row"></div>
        <div class="row"></div>-->
    <!--</div>-->
</div>
<?php
    //include('pages/footer.php');
?>
<!--php
    echo"<div class='col-sm-12 col-lg-9 mt-2'>";
    echo "<div class='row' id='products'>";
        $var=DohvatanjeProizvoda();
    echo"</div>";
    echo"</div>";
    <ul>
    <?/*php
            echo "<p>Categories:</p>";
            $dohvatanjeKategorija=IspisKategorija();

            ?>
    </ul>
    <ul>
        <?php
            echo "<p>Brands: </p>";
            $dohvatanjeBrendova=IspisBrendova();
        ?>*/
-->