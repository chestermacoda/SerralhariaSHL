<?php
include_once "../../connect/config.php";


    $erros = array();
    $saida = '';

    $SenhaAntiga = addslashes($_POST['SenhaAntiga']);
    $NovaSenha = addslashes($_POST['NovaSenha']);
    $Csenha = addslashes($_POST['Csenha']);
    $id = addslashes($_POST['id']);
    $cmd = $pdo->query("SELECT senha FROM usuarios where id = '$id'");
    $dados = $cmd->fetch();
    $senha = $dados['senha'];

    if(empty($SenhaAntiga)){
        $erros['e'] = 'Preencha o Campo Senha Antiga';
    }elseif($SenhaAntiga != $senha){
        $erros['e'] = 'Senha Antiga Incorrecta';
    }elseif(empty($NovaSenha)){
        $erros['e'] = 'Preencha o Campo Senha Nova';
    }elseif(empty($Csenha)){
        $erros['e'] = 'Preencha o Campo Confirmar Senha Nova';
    }elseif($NovaSenha != $Csenha){
        $erros['e'] = 'Nova Senha e Confirmar Senha São Diferentes';
    }else{
        $cmd = $pdo->query("UPDATE usuarios SET senha = md5($NovaSenha) where usuarios.id = '$id' ");
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