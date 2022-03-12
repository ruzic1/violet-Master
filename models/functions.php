<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/violet-master/config/connections.php';
function dinamickoPrikazivanjeMenija()
{
    global $konekcija;
    //$navLinks = "SELECT * FROM navigacija";
    $upit="SELECT * FROM navigacija";
    $rezultat=$konekcija->query($upit);
    $rezu=$rezultat->fetchAll();
    foreach($rezu as $link)
    {
    /*$active = strpos($_SERVER["PHP_SELF"], $link->hrefLink) ? "active" : "";
    $navLinksString .= "<li class='m-2'>
    <a class='$active' href='$link->hrefLink'>$link->nazivLink</a>
    </li>";*/
    //echo "<li><a href='".$link->hrefLink."'>$link->nazivLink</a></li>";
    if($link->nazivLink=="Home"||$link->nazivLink=="Shop"||$link->nazivLink=="Gallery"||$link->nazivLink=="Contact"||$link->nazivLink=="Author")
    {
        echo "<li><a href='".$link->hrefLink."'>$link->nazivLink</a></li>";
    }
}

    /*global $konekcija;
    try{
    $obrada=$konekcija->prepare('SELECT * FROM navigacija');
    $rez=$obrada->fetchAll();
    }
    catch(PDOException $e)
    {
        echo "greska: ".$e->getMessage();
    }

    $navLinksString = "";

    var_dump($rez);
    foreach($rez as $link)
    {

    if($link->nazivLink=="Home"||$link->nazivLink=="Shop"||$link->nazivLink=="Gallery"||$link->nazivLink=="Contact"||$link->nazivLink=="Author")
    {
        echo "<li><a href='".$link->hrefLink."'>$link->nazivLink</a></li>";
    }

    }*/
}
/*function dinamickoPrikazivanjeMenija()
{
    global $konekcija;
    $upit="SELECT * FROM navigacija";
    $obrada=$konekcija->query($upit);
    $rezultatObrade=$obrada->fetchAll();
    foreach($rezultatObrade as $counter)
    {
        if(isset($_SESSION['korisnik'])&&$counter->nazivLink=="Poll"&&$_SESSION['korisnik']->ImeUloga=="korisnik")
        {
            echo "<li><a href='".$counter->hrefLink."'>$counter->nazivLink</a></li>";
            continue;
        }
        if(isset($_SESSION['korisnik'])&&$counter->nazivLink=="Admin"&&$_SESSION['korisnik']->ImeUloga=="admin")
        {
            echo "<li><a href='".$counter->hrefLink."'>$counter->nazivLink</a></li>";
            continue;
        }
        if($counter->nazivLink=="Home"||$counter->nazivLink=="Shop"||$counter->nazivLink=="Gallery"||$counter->nazivLink=="Contact"||$counter->nazivLink=="Author")
        {
            echo "<li><a href='".$counter->hrefLink."'>$counter->nazivLink</a></li>";
        }
    }
}*/

function ispisivanjeAdminMenija()
{
    global $konekcija;
    $upit="SELECT * FROM adminpanel";
    $obrada=$konekcija->query($upit);
    $rezultatObrade=$obrada->fetchAll();
    foreach($rezultatObrade as $redovi)
    {
        if($_SESSION['korisnik']->ImeUloga=="admin")
        {
            echo "<li><a href='".$counter->hrefLink."'>$counter->nazivLink</a></li>";
        }
    }
 //return $adminPanelLinksString;
}


function unosKorisnika($ime,$prezime,$mejl,$cryptLozinka)
{
    global $konekcija;
    $uloga=1;
    $rezultat="";
    $upit="INSERT INTO korisnik(imeKorisnik,prezimeKorisnik,emailKorisnik,lozinkaKorisnik,idUloga) VALUES(:ime,:prezime,:email,:lozinka,:uloga)";
    $priprema=$konekcija->prepare($upit);
    $priprema->bindParam(':ime',$ime);
    $priprema->bindParam(':prezime',$prezime);
    $priprema->bindParam(':email',$mejl);
    $priprema->bindParam(':lozinka',$cryptLozinka);
    $priprema->bindParam(':uloga',$uloga);
    try{
        $rezultat=$priprema->execute();
    }
    catch(exception $e)
    {
        echo "greska:".$e->getMessage();
    }
    return $rezultat;
}
function IspisKategorija()
{
    global $konekcija;
    $upit="SELECT * FROM kategorije";
    $obrada=$konekcija->query($upit);
    $rezultat=$obrada->fetchAll();
    //var_dump($rezultat);
    foreach ($rezultat as $red)
    {
        echo "<input type='checkbox' class='common_selector categories'>";
        echo "<label for=''>".$red->CategoryName."</label>";
        echo "<br/>";
        //echo "<li>".$red->CategoryName."</li>";
    }
}
function IspisBrendova()
{
    global $konekcija;
    $upit="SELECT * FROM brend";
    $obrada=$konekcija->query($upit);
    $rezultat=$obrada->fetchAll();
    //var_dump($rezultat);
    foreach ($rezultat as $red)
    {
        echo "<input type='checkbox' class='common_selector brand'>";
        echo "<label for=''>".$red->brendName."</label>";
        echo "<br/>";
        //echo "<li>".$red->CategoryName."</li>";
    }
}
function DohvatanjeProizvoda()
{
    global $konekcija;
    $upit="SELECT * FROM proizvodi p INNER JOIN kategorije k ON p.idCategory=k.idCategory";
    $obrada=$konekcija->query($upit);
    $rezultat=$obrada->fetchAll();
    $brojac=0;

    foreach ($rezultat as $red)
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
/*<div class=' col-md-4 mb-4'>
              <div class='card h-100 border-0'>
                  <div class='card-img-top'>
                      <img src='http://via.placeholder.com/350/5fa9f8/efefef' class='img-fluid mx-auto d-block' alt='Card image cap'>
                  </div>
                  <div class='card-body text-center'>
                      <h4 class='card-title'>
                          <a href='#' class=' font-weight-bold text-dark text-uppercase small'> Product name</a>
                        </h4>
                      <h5 class='card-price small text-warning'>
                          <i>
                            <s>$599</s> $299</i>
                        </h5>
                  </div>
              </div>
          </div>
          <div class=' col-md-4 mb-4'>
              <div class='card h-100 border-0'>
                  <div class='card-img-top'>
                      <img src='http://via.placeholder.com/350/5fa9f8/efefef' class='img-fluid mx-auto d-block' alt='Card image cap'>
                  </div>
                  <div class='card-body text-center'>
                      <h4 class='card-title'>
                          <a href='#' class=' font-weight-bold text-dark text-uppercase small'> Product name</a>
                        </h4>
                      <h5 class='card-price small text-warning'>
                          <i>
                            <s>$599</s> $299</i>
                        </h5>
                  </div>
              </div>
          </div>*/
