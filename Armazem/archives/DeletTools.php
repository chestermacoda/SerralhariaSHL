<?php
include_once "../../connect/config.php";


        $erros = array();
        $saida = '';

        $id = addslashes($_POST['id']);
        $cmd = $pdo->prepare("DELETE From material where id = '$id'");
        $cmd->execute();
        if($cmd->rowCount() > 0){
            $saida = '<p class="alert alert-success text-center">Removido Com Sucesso</p>';
            ?><script>setTimeout(function(){location.assign("produtos.php");}, 100);</script><?php
        }else{
            $saida ='<p class="alert alert-danger text-center">Impossivel Remover </p>';
        }


    if(isset($erros['e'])){
        $saida ='<p class="alert alert-danger text-center">'.$erros['e'].'</p>';
    }
    
    echo $saida;
?>