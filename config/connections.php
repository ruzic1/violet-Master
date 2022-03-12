<?php
    define("SERVER","localhost");
    define("DB","tech");
    define("USER","root");
    define("PW","");

    try
    {
        $konekcija= new PDO("mysql:host=".SERVER.";dbname=".DB.";charset=utf8",USER,PW);
        $konekcija->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $konekcija->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    }
    catch(PDOException $ex)
    {
        echo "Cannot connect to database, ".$ex->getMessage();
    }
?>