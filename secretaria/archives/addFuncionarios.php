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
        $status  = "on";
        // $  = addslashes($_POST[' ']);
        // $  = addslashes($_POST[' ']);
        // $  = addslashes($_POST[' ']);
        if(!empty($nome) && !empty($apelido) && !empty($email)){
            $row = $pdo->query("SELECT nome,email FROM funcionarios ");
            $linha = $row->fetch();
            $name  = $linha['nome'];
            $mail  = $linha['email'];
        }
        

        

        if(empty($nome)){
            $erros['e'] = 'Preencha o Campo nome do Funcionario';
        }elseif($name == $nome){
            $erros['e'] = 'Este Nome Ja Existe Na Base de Dados';
        }elseif(empty($apelido)){
            $erros['e'] = 'Preencha o Campo Apelido';
        }elseif(empty($email)){
            $erros['e'] = 'Preencha o Campo E-mail';
        }elseif($email == $mail){
            $erros['e'] = 'O Email ja existe';
        }elseif(empty($formacao)){
            $erros['e'] = 'Preencha o Campo Area de Formação';
        }elseif(empty($datanascimento)){
            $erros['e'] = 'Preencha o Campo Data de Nascimento';
        }elseif(empty($bi)){
            $erros['e'] = 'Preencha o Campo BI';
        }elseif(empty($bairro)){
            $erros['e'] = 'Preencha o Campo Bairro';
        }elseif(empty($EstadoCivil)){
            $erros['e'] = 'Escolha o Estado Civil';
        }elseif(empty($Nuit)){
            $erros['e'] = 'Preencha o Campo Nuit';
        }else{
            
            // $cmd = $con->AddMaterial($nome,$tipo,$medida,$cor,$quantidade);
            $cmd = $pdo->prepare("INSERT INTO funcionarios(nome,apelido,email,Area,dataNascimento,bI,Bairro,Nacionalidade,EstadoCivil,Salario,Nuit,INSS,status) values(:n,:a,:e,:ar,:d,:bi,:br,:nc,:ec,:sa,:in,:nui,:st)");
                $cmd->bindValue(":n",$nome);
                $cmd->bindValue(":a",$apelido);
                $cmd->bindValue(":e",$email);
                $cmd->bindValue(":ar",$formacao);
                $cmd->bindValue(":d",$datanascimento);
                $cmd->bindValue(":bi",$bi);
                $cmd->bindValue(":br",$bairro);
                $cmd->bindValue(":nc",$nacionalidade);
                $cmd->bindValue(":ec",$EstadoCivil);
                $cmd->bindValue(":sa",$salario);
                $cmd->bindValue(":in",$INSS);
                $cmd->bindValue(":nui",$Nuit);
                $cmd->bindValue(":st",$status);
                $cmd->execute();

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