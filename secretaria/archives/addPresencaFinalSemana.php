<?php
        include_once "../../connect/config.php";
        session_start();
        $select = '';
        $erros = array();
        $saida = '';
        $date = $_SESSION['dataFinalsemana'];
        $presenca = $_POST['time'];
        if(empty($presenca)){
            $erros['e'] = 'Adiciono a Hora PorFavor';
        }if(!empty($_POST['select'])){
            $select = $_POST['select'];
            
            for($i=0; $i < count($select); $i++){
                $id = $select[$i];
                 
                
                $cmd = $pdo->prepare("UPDATE presenca SET Entrada = '$presenca' where id_funcionario ='$id' and data = '$date'");
                $cmd->execute();
                // var_dump($cmd);
                // die();
            }
            if($cmd->rowCount() > 0){
                $saida = 'Efectuado Com sucesso';
                 
            }else{
                $saida ='Falha na Ação';
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
        $saida =$erros['e'];
    }
    
    echo $saida;
?>