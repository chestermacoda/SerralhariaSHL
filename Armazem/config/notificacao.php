<?php
include_once "total.php";
if($tmate->rowCount() > 0){
    foreach($q as $v){
        $nomeMaterial = $v['NomeMaterial'];
        $tipo = $v['tipo'];
        $quantidade = $v['quantidade'];
        $notif = $pdo->query("SELECT * FROM notification where id_material = '$nomeMaterial' and tipo = '$tipo'");
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
            }
            
        }else{
             
            $Tmate = $pdo->query("SELECT * FROM material");
            $m = $Tmate->fetchAll();
            foreach($m as $tds){
                $nomeMaterial = $tds['NomeMaterial'];
                $tipo = $tds['tipo'];
                $quantidade = $tds['quantidade'];

                if($quantidade > $valor){
                    $notif = $pdo->query("DELETE FROM notification where id_material = '$nomeMaterial' and tipo = '$tipo'");
                    if($notif->rowCount() > 0){
                        $tmate = $pdo->query("DELETE FROM NotificationTemp where id_material = '$nomeMaterial' and tipo = '$tipo'");
                    }
                }
            }
            
        }

    }
}else{
    $Tmate = $pdo->query("SELECT * FROM material");
    $m = $Tmate->fetchAll();
    foreach($m as $tds){
        $nomeMaterial = $tds['NomeMaterial'];
        $tipo = $tds['tipo'];
        $quantidade = $tds['quantidade'];

        if($quantidade > $valor){
            $notif = $pdo->query("DELETE FROM notification where id_material = '$nomeMaterial' and tipo = '$tipo'");
            if($notif->rowCount() > 0){
                $tmate = $pdo->query("DELETE FROM NotificationTemp where id_material = '$nomeMaterial' and tipo = '$tipo'");
                 
            }
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

        if($tmate->rowCount() == 0){
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
}
else{
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