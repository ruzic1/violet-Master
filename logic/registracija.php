<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'].'/CAKE_SAJT/config/connections.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/CAKE_SAJT/models/functions.php';
    if(isset($_POST['logButton']))//provera da li je submitovana forma
    {
        //dodela podataka korisnika koji su prvobitno ispitani na klijentskoj strani
        $counter=0;
        //$upit="SELECT * FROM korisnik WHERE emailKorisnik='$_POST['mejlX']'";
        //$select = mysqli_query($konekcija, "SELECT * FROM korisnik WHERE emailKorisnik = '".$_POST['mejlX']."'");
        $upit="SELECT * FROM korisnik WHERE emailKorisnik = '".$_POST['mejlX']."'";
        $rezultat=$konekcija->query($upit);
        //$rezultatObrade=$rezultat->fetchAll();
        if($rezultat->rowCount()){
            $_SESSION['fail']="Iskoriscena je email adresa";
            echo ("iskoriscena je email adresa!");
            
        }
        else
        {
        $rezultat=$konekcija->query($upit);
        $rezultatObrade=$rezultat->fetchAll();
        var_dump($rezultatObrade);
        foreach($rezultatObrade as $row)
        {
            if(in_array($rezultatObrade->emailKorisnik,$row->emailKorisnik))
            $counter++;
            /*if(in_array($row->emailKorisnik,$rezultatObrade))
                $counter++;*/
        }
        //echo "vrednost brojaca:".$counter;
        $ime=$_POST['imeX'];
        $prezime=$_POST['prezimeX'];
        $datumRodjenja=$_POST['datumRodjenjaX'];
        $pol=$_POST['polX'];
        $mejl=$_POST['mejlX'];
        $lozinka=$_POST['lozinkaX'];
        $status=$_POST['statusX'];
        
        //regularni izrazi-serverska strana
        $regIme='/^[A-Z][a-z]{2,14}$/';
        $regPrezime='/^([A-z][a-z]{2,18})+$/';
        $regDatumRodjenja='/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/';
        $regMail='/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
        $regPassword='/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/';

        $greske=array();
        //testiranje unosa-serverska strana
        if(!preg_match($regIme,$ime)||$ime=="")
        {
            //$greske.push('Niste uneli validnu vrednost za ime!Prorevite da li je prvo slovo veliko');
            array_push($greske,'Nije uneta validna vrednost za ime');
        }
        if(!preg_match($regPrezime,$prezime)||$prezime=="")
        {
            array_push($greske,'Nije uneta validna vrednost za prezime');
        }
        if(!preg_match($regDatumRodjenja,$datumRodjenja)||$datumRodjenja=="")
        {
            array_push($greske,'Nije uneta validna vrednost za datum rodjenja.(DD-MM-YY format)');
        }
        if(!preg_match($regMail,$mejl)||$mejl=="")
        {
            array_push($greske,'Nije uneta validna vrednost za mejl');
        }
        if(!preg_match($regPassword,$lozinka)||$lozinka=="")
        {
            array_push($greske,'Nije uneta validna vrednost za lozinku');
        }

        if(count($greske)==0)
        {
            $cryptLozinka=md5($_POST['lozinkaX']);
            
            try
            {
                $unosKorisnika=unosKorisnika($ime,$prezime,$mejl,$cryptLozinka);
                /*if(isset($_POST['registerButton']))
                {
                    $ime=$_POST['']
                }*/
                /*$userFilter="SELECT * FROM korisnici";
                $rezultat=$konekcija->query($userFilter);
                $rezObrade=$rezultat->fetchAll();
                var_dump($rezObrade);*/
                /*foreach($rezObrade as $row)
                {
                    
                }*/
                //if($unosKorisnika)
                if($unosKorisnika)
                {
                    //global $odgovor;
                    $odgovor=['poruka'=>'Uspesan unos'];
                    echo json_encode($odgovor);
                    http_response_code(201);
                    //header('location:index.php');
                }
            }
            catch(PDOException $e)
            {
                echo "Doslo je do greske: ".$e->getMessage();
                http_response_code(500);
                header('Location:../register.php');
            }
        }

    }
        //$obradaPodataka=$priprema->execute();
                //$obradaPodataka=mysql_query($upit);
                /*$_SESSION['username']='ime';
                $_SESSION['success']='Ulogovani ste';
                http_response_code(201);
                header("location:../login.php");
                //return $_SESSION['success'];*/
    }
?>