<?php
include_once "../../connect/config.php";

    $cor = '';
    $medida = '';
    $quantidade = "";
    $data = "";
    $erros = array();
    $saida = '';

    $nome = addslashes($_POST['nome']);
    $tipo = addslashes($_POST['tipo']);
    $medida = addslashes($_POST['medida']);
    $cor = addslashes($_POST['cor']);
    $quantidade = addslashes($_POST['Quantidade']);
    $data = addslashes($_POST['data']);
    $id = addslashes($_POST['id']);

    if(empty($nome)){
        $erros['e'] = 'Preencha o Campo nome do Material';
    }else{
        $cmd = $pdo->query("UPDATE material SET NomeMaterial = '$nome', tipo = '$tipo', medida = '$medida', cor = '$cor' where material.id = '$id' ");
        if($cmd->rowCount() > 0){
            $saida = '<p class="alert alert-success text-center">Registado Com sucesso</p>';
            ?><script>setTimeout(function(){location.assign("produtos.php");}, 3000);</script><?php
        }else{
            $saida ='<p class="alert alert-danger text-center">Falha no Registo</p>';
        }
    }

    if(isset($erros['e'])){
        $saida ='<p class="alert alert-success text-center">'.$erros['e'].'</p>';
    }
    
    echo $saida;
?>