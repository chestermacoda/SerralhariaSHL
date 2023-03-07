<?php
include_once "../../connect/config.php";

    $cor = '';
    $medida = '';
    $quantidade = "";
    $data = "";
    $erros = array();
    $saida = '';
    
        $nome = addslashes($_POST['nome']);
        $apelido = addslashes($_POST['apelido']);
        $email = addslashes($_POST['email']);
        $formacao = addslashes($_POST['formacao']);
        $datanascimento = addslashes($_POST['datanascimento']);
        $bi = addslashes($_POST['bi']);
        $bairro  = addslashes($_POST['bairro']);
        $nacionalidade  = addslashes($_POST['nacionalidade']);
        $salario  = addslashes($_POST['salario']);

        $EstadoCivil  = addslashes($_POST['EstadoCivil']);
        $INSS  = addslashes($_POST['INSS']);
        $Nuit  = addslashes($_POST['Nuit']);

        $id  = addslashes($_POST['id']);
        $status  = "on";

        if(!empty($nome) && !empty($apelido) && !empty($email)){
            $row = $pdo->query("SELECT nome,email FROM funcionarios ");
            $linha = $row->fetch();
            $name  = $linha['nome'];
            $mail  = $linha['email'];
        }
        

        

        if(empty($nome)){
            $erros['e'] = 'Preencha o Campo nome do Funcionario';
        }elseif(empty($apelido)){
            $erros['e'] = 'Preencha o Campo Apelido';
        }elseif(empty($email)){
            $erros['e'] = 'Preencha o Campo E-mail';
        }elseif(empty($formacao)){
            $erros['e'] = 'Preencha o Campo Area de Formação';
        }elseif(empty($datanascimento)){
            $erros['e'] = 'Preencha o Campo Data de Nascimento';
        }elseif(empty($bi)){
            $erros['e'] = 'Preencha o Campo BI';
        }elseif(empty($bairro)){
            $erros['e'] = 'Preencha o Campo Bairro';
        }else{
            
            $cmd = $pdo->query("UPDATE funcionarios SET nome = '$nome', apelido = '$apelido', email = '$email', Area = '$formacao', dataNascimento = '$datanascimento', bI = '$bi', Bairro = '$bairro', Nacionalidade = '$nacionalidade',EstadoCivil='$EstadoCivil', Salario = '$salario',Nuit='$Nuit',INSS='$INSS' WHERE funcionarios.id = '$id'");
        
            if($cmd->rowCount() > 0){
                    $saida = '<p class="alert alert-success text-center">Registado Com sucesso</p>';
                    ?><script>setTimeout(function(){location.reload();}, 3000);</script><?php
            }else{
                $saida ='<p class="Error">Falha no Registo</p>';
            }
            
        }
    
if(isset($erros['e'])){
    $saida ='<p class="alert alert-danger text-center">'.$erros['e'].'</p>';
}

echo $saida;
?>