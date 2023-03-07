<?php
include_once "../../connect/config.php";
$erros = array(); 
$saida = '';
            $date = date('Y-m-d' );

            $id = addslashes($_POST['id']);
            $presenca = date('H:i:s');
            $cmd = $pdo->prepare("UPDATE presenca SET Saida = '$presenca' where id_funcionario ='$id' and data = '$date' ");
            $cmd->execute();
            
            if($cmd->rowCount() > 0){
                $saida = '<p class="alert alert-success text-center"">Efectuado Com sucesso</p>';
                ?><script>setTimeout(function(){location.reload();}, 100);</script><?php
            }else{
                $saida ='<p class="alert alert-danger text-center">Falha na Ação</p>';
            }
        

        
  
    if(isset($erros['e'])){
        $saida ='<p class="Error">'.$erros['e'].'</p>';
    }
    
    echo $saida;