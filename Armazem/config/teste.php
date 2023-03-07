<?php
include_once "../../connect/config.php";
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
// include_once "notificationValidate.php";
foreach($svalues as $n){
    echo "<td wi>".$n['id_material'] ."</td><td>". $n['tipo']."</td><td>". $n['quantidade']."</td></tr><br>";
}

 
 
 
if($time->rowCount() > 0){
   echo "certo";
    foreach($Ntools as $k){
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
        $notif = $pdo->query("SELECT * FROM notification where id_funcionario = '$funcionario' and id_ferramenta = '$ferramenta'");
        if($notif->rowCount() == 0){
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
                ?><script>setTimeout(function(){location.reload();}, 100);</script><?php
            }
            
        }else{
            $sta = '';
            $notif = $pdo->query("SELECT * FROM notification ");
            $svalues = $notif->fetchAll();
            foreach($svalues as $no){
                $sta = $no['satus'];
                // $status = $no['id_ferramenta'];
            }
            $k['status'] == "devolucao";
            $Tmate = $pdo->query("SELECT * FROM ferramenta");
            $m = $Tmate->fetchAll();
            foreach($m as $tds){
                $nomeMaterial = $tds['nome'];
                $tipo = $tds['tipo'];
                $quantidade = $tds['quantidade'];
                $status = $tds['status'];
                if($status){
                    // $notif = $pdo->query("DELETE FROM notification where id_material = '$nomeMaterial' and tipo = '$tipo'");
                    // if($notif->rowCount() > 0){
                    //     $tmate = $pdo->query("DELETE FROM NotificationTemp where id_material = '$nomeMaterial' and tipo = '$tipo'");
                    // }
                    echo "Certo";
                }
            }
            
        }

    }





}else{
    
    
}

 