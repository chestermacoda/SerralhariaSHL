<?php
include_once "../connect/config.php";
include_once "validate.php";
if(isset($_SESSION['admin'])){
    $id =$_SESSION['admin'];
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

$func = $pdo->query("SELECT * FROM funcionarios where status = 'on'");
$todos = $func->fetchAll();
$AllFunc = count($todos);

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
// include_once "notificationValidate.php";

$id =  date('Y-m-d') ;
$cmd = $pdo->query("SELECT en.id,m.NomeMaterial,m.tipo,m.medida,en.quantidade,en.data FROM `entrada` en INNER join material m ON en.id_material = m.id  where en.data = '$id'");

$dados = $cmd->fetchAll();

$entradas = count($dados);


$data = date('Y-m-d');
$cmd = $pdo->query("SELECT sa.id,sa.quantidade,sa.data,m.NomeMaterial,f.nome FROM saidamaterial sa INNER JOIN material m ON m.id = sa.id_material INNER JOIN funcionarios f ON f.id = sa.id_funcionario where sa.data = '$data'");
$said = $cmd->fetchAll();

?>



