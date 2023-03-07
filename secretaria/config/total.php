<?php
include_once "../connect/config.php";
include_once "validate.php";
if(isset($_SESSION['secretaria'])){
    $id =$_SESSION['secretaria'];
    $user = $se->user($id);
}
$id =  date('Y-m-d') ;
$cmd = $pdo->query("SELECT en.id,m.NomeMaterial,m.tipo,m.medida,en.quantidade,en.data FROM `entrada` en INNER join material m ON en.id_material = m.id  where en.data = '$id'");

$dados = $cmd->fetchAll();

$entradas = count($dados);
$notif = $pdo->query("SELECT * FROM notification ");
$svalues = $notif->fetchAll();
$totalNotification = count($svalues);
  
$data = date('Y-m-d');
$cmd = $pdo->query("SELECT sa.id,sa.quantidade,sa.data,m.NomeMaterial,f.nome FROM saidamaterial sa INNER JOIN material m ON m.id = sa.id_material INNER JOIN funcionarios f ON f.id = sa.id_funcionario where sa.data = '$data'");
$said = $cmd->fetchAll();


$data = date('Y-m-d' );
$Tmate = $pdo->query("SELECT * FROM presenca where data = '$data'");
$m = $Tmate->fetchAll();
$totalM = count($m);


$Tmate = $pdo->query("SELECT * FROM material");
$ma = $Tmate->fetchAll();
$totaM = count($ma);

$func = $pdo->query("SELECT * FROM funcionarios where status = 'on'");
$todos = $func->fetchAll();
$AllFunc = count($todos);

$estagiario = 'Pro';


$funcio = $pdo->query("SELECT * FROM funcionarios where Area LIKE '%$estagiario%' and status = 'on'");
$todos = $funcio->fetchAll();
$Estagiarios = count($todos);

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



if($not > 0){
    foreach($q as $k){ 
        $nomeMaterial = $k['NomeMaterial'];
        $tipo = $k['tipo'];
        $quantidade = $k['quantidade'];
        $funcionario = "";
        $ferramenta = "";

        $tmate = $pdo->query("SELECT * FROM notification where id_material = '$nomeMaterial' and tipo = '$tipo'");
        // $value = $tmate->fetch();
        if($tmate->rowCount() <= 0){
            $cmd = $pdo->prepare("INSERT INTO notification(id_material,tipo,id_funcionario,id_ferramenta,quantidade,dataRetorno) values(:m,:t,:f,:fe,:q,:d)");
             
            $cmd->bindValue(":m",$nomeMaterial);
            $cmd->bindValue(":t",$tipo);
            $cmd->bindValue(":f",$funcionario);
            $cmd->bindValue(":fe",$ferramenta);
            $cmd->bindValue(":q",$quantidade);
            $cmd->bindValue(":d",$dataRetorno);
            $cmd->execute();
            if($cmd->rowCount() > 0){
                $con->NotificationTemp($nomeMaterial,$tipo,$funcionario,$ferramenta,$quantidade,$dataRetorno);
            }
        }

    }
}else{
    $tmate = $pdo->query("SELECT * FROM material ");
    $q = $tmate->fetchall();
   
    foreach($q as $k){ 
        $nomeMaterial = $k['NomeMaterial'];
        $tipo = $k['tipo'];

        $tmate = $pdo->query("DELETE FROM notification where id_material = '$nomeMaterial' and tipo = '$tipo'"); 
        $d = $tmate->fetch();
        
        if($tmate->rowCount() > 0){
            $tmate = $pdo->query("DELETE FROM NotificationTemp where id_material = '$nomeMaterial' and tipo = '$tipo'");
        }
    }
}


if($tfalta > 0){
    foreach($Ntools as $k){
        // nome da ferramenta
        $id = $k['id_ferramenta'];
        $Tferr = $pdo->query("SELECT nome FROM ferramenta where id = '$id'");
        $f = $Tferr->fetch();
        // nome do funcionario
        
        $ID = $k['id_funcionario'];
        $Tfun = $pdo->query("SELECT nome FROM funcionarios where id = '$ID'");
        $t = $Tfun->fetch();

        $quantidade = $k['quantidade'];
        $funcionario = $t['nome'];
        $ferramenta = $f['nome'];
        $dataRetorno = $k['retornoData'];
        $nomeMaterial = "";
        $tipo = "";
        $tmate = $pdo->query("SELECT * FROM notification where id_funcionario = '$funcionario' and id_ferramenta = '$ferramenta'");
        // $value = $tmate->fetch();

        if($tmate->rowCount() <= 0){
            $cmd = $pdo->prepare("INSERT INTO notification(id_material,tipo,id_funcionario,id_ferramenta,quantidade,dataRetorno) values(:m,:t,:f,:fe,:q,:d)");
             
            $cmd->bindValue(":m",$nomeMaterial);
            $cmd->bindValue(":t",$tipo);
            $cmd->bindValue(":f",$funcionario);
            $cmd->bindValue(":fe",$ferramenta);
            $cmd->bindValue(":q",$quantidade);
            $cmd->bindValue(":d",$dataRetorno);
            $cmd->execute();
            if($cmd->rowCount() > 0){
                $con->NotificationTemp($nomeMaterial,$tipo,$funcionario,$ferramenta,$quantidade,$dataRetorno);
            }
        }

    }
}else{
    $tmate = $pdo->query("SELECT * FROM ferramenta ");
    $q = $tmate->fetchall();
   
    foreach($q as $k){ 
        $nomeMaterial = $k['nome'];

        $tmate = $pdo->query("DELETE FROM notification where id_ferramenta = '$nomeMaterial'"); 
        $d = $tmate->fetch();
        
        if($tmate->rowCount() > 0){
            $tmate = $pdo->query("DELETE FROM NotificationTemp where id_ferramenta = '$nomeMaterial'");
        }
    }
}
?>



