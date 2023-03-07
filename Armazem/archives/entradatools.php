<?php
include_once "../../connect/config.php";
    $erros = array();
    $saida = '';
    $quantity = '';
    $quantidade = addslashes($_POST['Quantidade']);
 
    // actualizar a quantidade da ferramenta ja existente
    $id = $_POST['nome'];
    $cmd = $pdo->query("SELECT * FROM ferramenta where id = '$id'");
    $dados = $cmd->fetch();
    $valor = $dados['quantidade'];
    
    if($quantidade > 0){
        $quantity = $valor + $quantidade;
    }
    if(empty($id)){
        $erros['e'] = 'Preencha o Campo nome do Material';
    }elseif(empty($quantidade)){
        $erros['e'] = 'Preencha o Campo Quantidade Ferramenta';
    }else{
        $cmd = $pdo->query("UPDATE ferramenta SET quantidade = '$quantity' WHERE `ferramenta`.`id` = '$id';");
        if($cmd->rowCount() > 0){
            $saida = '<p class="alert alert-success text-center ">Registado Com sucesso</p>';
            ?><script>setTimeout(function(){location.reload();}, 1000);</script><?php
        }else{
            $saida ='<p class="alert alert-danger text-center border-danger">Falha no Registo</p>';
        }
        
    }


    if(isset($erros['e'])){
        $saida ='<p class="alert alert-danger text-center border-danger">'.$erros['e'].'</p>';
    }
    
    echo $saida;
?>