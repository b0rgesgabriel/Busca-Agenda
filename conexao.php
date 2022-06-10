<?php

$host = "localhost";
$user = "root";
$pass = "Emerj@bd";
$dbname = "agenda";


try{
    //Conexão com a porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    $conn->query("SET NAMES 'utf8'");

    //Conexão sem a porta
    //$conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

    //echo "Conexão com banco de dados realizado com sucesso!";
}  catch(PDOException $err){
    echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $err->getMessage();
}