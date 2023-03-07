<?php
include_once "Armazem.php";
include_once "Secretaria.php";
// date_default_timezone_set("África/Maputo");

// servidor web
// $dbname = "ezyro_33435875_industria";
// $local = "sql306.ezyro.com";
// $usuario = "ezyro_33435875";
// $senha = "htobmsmo8u9d";


// servidor TurboHost
// $dbname = "shlcomz_Industria"; 
// $local = "localhost";
// $usuario = "shlcomz_Industria";
// $senha = "Chesternogar12345#";


// servidor local
$dbname = "industria"; 
$local = "localhost";
$usuario = "root";
$senha = "";


$con = new Armazem($dbname,$local,$usuario,$senha);
$se = new Secretaria($dbname,$local,$usuario,$senha);
$pdo = new PDO("mysql:host=".$local."; dbname=".$dbname.";",$usuario,$senha);


// valor do stocke minimo para notificacoes
$valor = 6;

// hora de saida
$sairr = '17:00:30';

?>