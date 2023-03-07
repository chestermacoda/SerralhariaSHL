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
    $cor = addslashes($_POST['cor']);
    $quantidade = addslashes($_POST['Quantidade']);
    $id = addslashes($_POST['id']);
    $descricao = addslashes($_POST['descricao']);

    if(empty($nome)){
        $erros['e'] = 'Preencha o Campo nome do Material';
    }else{
        $cmd = $pdo->query("UPDATE ferramenta SET nome = '$nome', tipo = '$tipo', cor = '$cor', quantidade = '$quantidade', descricao = '$descricao' where ferramenta.id = '$id' ");
        if($cmd->rowCount() > 0){
            $saida = '<p class="alert alert-success text-center">Registado Com sucesso</p>';
            ?><script>setTimeout(function(){location.reload();}, 3000);</script><?php
        }else{
            $saida ='<p class="alert alert-danger text-center">Falha no Registo</p>';
        }
    }

    if(isset($erros['e'])){
        $saida ='<p class="alert alert-success text-center">'.$erros['e'].'</p>';
    }
    
    echo $saida;
?>