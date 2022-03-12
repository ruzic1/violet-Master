<?php
    session_start();
    include_once('../config/connections.php');
    if(isset($_POST['logButton2'])){
        $email=$_POST['emailX'];
        $lozinka=$_POST['passwordX'];
        if(isset($_POST['emailX'])&&isset($_POST['passwordX']))
        {
            echo "setovani su parametri";
        }
        else
        {
            echo "nisu setovani parametri";
        }
        $regexEmail='/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
        $regexLozinka='/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/';

        //testiranje unosa-->serverska strana
        $greska=0;
        if(!preg_match($regexEmail,$email))
        {
            $greska++;
        }
        if(!preg_match($regexLozinka,$lozinka))
        {
            $greska++;
        }
        if($greska==0)
        {
            $cryptedLozinka=md5($lozinka);
            $upit="SELECT * FROM korisnik k INNER JOIN uloga u ON k.idUloga=u.idUloga WHERE emailKorisnik=:email AND k.lozinkaKorisnik=:lozinka";
            $obradaForme=$konekcija->prepare($upit);
            $obradaForme->bindParam(":email",$email);
            $obradaForme->bindParam(":lozinka",$cryptedLozinka);
            $rezObrada=$obradaForme->execute();
            var_dump($rezObrada);
            //$obradaForme->execute();
            try{
                //$rezultatObrade=$obradaForme->fetchAll();
                if($rezObrada)
                {
                $_SESSION['korisnik']=$rezObrada;
                $odgovor=['poruka'=>'Uspesan unos'];
                echo json_encode($odgovor);
                http_response_code(201);
                }
            
            else
            {
                $greska="invalid value for email or password";
                echo $greska;

                //header('location:../logovanje.php?errorInProccessingData='.$greska);
            }
        }
            catch(PDOException $e)
            {
                echo "Doslo je do greske: ".$e->getMessage();
                http_response_code(500);
                header('Location:../register.php');
            }
            //var_dump($rezultatObrade);            

            
        }
    }
?>