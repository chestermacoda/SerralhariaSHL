<?php
include_once "../../connect/config.php";

   
    $erros = array();
    $saida = '';

    $id = addslashes($_POST['id']);
    $status = addslashes($_POST['status']);
 

  
        $cmd = $pdo->query("UPDATE funcionarios SET status = '$status' where funcionarios.id = '$id' ");
        if($cmd->rowCount() > 0){
            $saida = '<p class="Sucess">Efectuado Com sucesso</p>';
            ?><script>setTimeout(function(){location.reload();}, 3000);</script><?php
        }else{
            $saida ='<p class="Error">Falha na Ação</p>';
        }

    if(isset($erros['e'])){
        $saida ='<p class="Error">'.$erros['e'].'</p>';
    }
    
    echo $saida;
?>