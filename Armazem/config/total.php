<?php
include_once "../connect/config.php";
include_once "validate.php";
if(isset($_SESSION['armazem'])){
    $id =$_SESSION['armazem'];
    $user = $con->user($id);
}
$notif = $pdo->query("SELECT * FROM notification ");
$svalues = $notif->fetchAll();
$totalNotification = count($svalues);

$Tmate = $pdo->query("SELECT * FROM material");
$m = $Tmate->fetchAll();
$totalM = count($m);

$Tferr = $pdo->query("SELECT * FROM ferramenta");
$f = $Tferr->fetchAll();
$totalF = count($f);

$status = "uso interno";
$status1 = "Saida";
$TReq = $pdo->query("SELECT * FROM requisitartools where status = '$status' or status = '$status1'");
$tr = $TReq->fetchAll();
$totalR = count($tr);

$tmate = $pdo->query("SELECT * FROM material where quantidade <= '$valor'");
$q = $tmate->fetchAll();
$not = count($q);

    $saida = "";
    $nomeMaterial = "";
    $tipo = "";
    $funcionario = "";
    $ferramenta = "";
    $dataRetorno = "";
    
$times = date('Y-m-d');
$time = $pdo->query("SELECT * FROM requisitartools  where  entregaData != '$times' and status != 'Devolucao'");
$Ntools = $time->fetchAll();
$tfalta = count($Ntools);
 





?>



