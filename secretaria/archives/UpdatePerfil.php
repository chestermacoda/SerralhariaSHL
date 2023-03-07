<?php
include_once "../../connect/config.php";


    $erros = array();
    $saida = '';

    $nome = addslashes($_POST['nome']);
    $apelido = addslashes($_POST['apelido']);
    $email = addslashes($_POST['email']);
    $id = addslashes($_POST['id']);
    $cmd = $pdo->query("SELECT senha FROM usuarios where id = '$id'");
    $dados = $cmd->fetch();
    $senha = $dados['senha'];

    if(empty($nome)){
        $erros['e'] = 'Preencha o Campo Nome';
    }elseif(empty($apelido)){
        $erros['e'] = 'Preencha o Campo Apelido';
    }elseif(empty($email)){
        $erros['e'] = 'Preencha o Campo E-Mail';
    }else{
        $cmd = $pdo->query("UPDATE usuarios SET nome = '$nome',apelido = '$apelido',email = '$email' where usuarios.id = '$id' ");
        if($cmd->rowCount() > 0){
            $saida = '<p class="alert alert-success text-center">Actualizado Com sucesso</p>';
            ?><script>setTimeout(function(){location.reload();}, 3000);</script><?php
        }else{
            $saida ='<p class="alert alert-danger text-center">Falha na Actualização</p>';
        }
    }

    if(isset($erros['e'])){
        $saida ='<p class="alert alert-danger text-center">'.$erros['e'].'</p>';
    }
    
    echo $saida;
?>