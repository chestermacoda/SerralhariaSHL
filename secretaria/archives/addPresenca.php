<?php
include_once "../../connect/config.php";

        $select = '';
        $erros = array();
        $saida = '';
        $date = date('Y-m-d' );
     
     
        if(!empty($_POST['select'])){
            $select = $_POST['select'];
            for($i=0; $i < count($select); $i++){
                $id = $select[$i];
                $presenca = $_POST['time']; 

                $date = date('Y-m-d' );
                $cmd = $pdo->prepare("UPDATE presenca SET Entrada = '$presenca' where id_funcionario ='$id' and data = '$date'");
                $cmd->execute();

            }
            if($cmd->rowCount() > 0){
                $saida = '<p class="Sucess">Efectuado Com sucesso</p>';
                ?><script>setTimeout(function(){location.reload();}, 100);</script><?php
            }else{
                $saida ='<p class="Error">Falha na Ação</p>';
            }
        }else if(!empty($_POST['id'])){
            $id = addslashes($_POST['id']);
            // $presenca = addslashes($_POST['presenca']);
            $presenca = date('H:i:s');
            $cmd = $pdo->prepare("UPDATE presenca SET Entrada = '$presenca' where id_funcionario ='$id' and data = '$date'");
            $cmd->bindValue(':f',$id);
            $cmd->bindValue(':st',$presenca);
            $cmd->execute();
            if($cmd->rowCount() > 0){
                $saida = '<p class="alert alert-success text-center">Efectuado Com sucesso</p>';
                ?><script>setTimeout(function(){location.reload();}, 100);</script><?php
            }else{
                $saida ='<p class="alert alert-danger text-center"">Falha na Ação</p>';
            }
        }

        
  
    if(isset($erros['e'])){
        $saida ='<p class="Error">'.$erros['e'].'</p>';
    }
    
    echo $saida;
?>