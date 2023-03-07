<?php
include_once "../../connect/config.php";

    
    $erros = array();
    $saida = '';

    $id = addslashes($_POST['id']);
    $id_ferramenta = addslashes($_POST['nome']);
    $id_funcionario = addslashes($_POST['funcionario']);
    $quantidade = addslashes($_POST['Quantidade']);
    $status = addslashes($_POST['status']);
    $entrega = addslashes($_POST['dataRetorno']);

    if(empty($id_ferramenta)){
        $erros['e'] = 'Preencha o Campo nome do Material';
    }elseif(empty($status)){
        $erros['e'] = 'Escolha o Campo Procedimento';
    }elseif($status == "Saida" AND $entrega == ''){
        $erros['e'] = 'Escolha a Data de Retorno da Ferramenta';
    }else{
        $cmd = $pdo->prepare("UPDATE requisitartools SET id_ferramenta = '$id_ferramenta', id_funcionario = '$id_funcionario', quantidade = '$quantidade', retornoData = '$entrega', status = '$status' where id = '$id' ");
        $cmd->execute();
        if($cmd->rowCount() > 0){
            $saida = '<p class="alert alert-success text-center">Actualizado Com sucesso</p>';
            ?><script>setTimeout(function(){location.assign("requisita.php");}, 100);</script><?php
        }else{
            $saida ='<p class="alert alert-danger text-center">Falha na Actualização da Requisição</p>';
        }
    }

    if(isset($erros['e'])){
        $saida ='<p class="alert alert-danger text-center">'.$erros['e'].'</p>';
    }
    
    echo $saida;
?>