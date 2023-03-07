<?php
include_once "../../connect/config.php";


$tipo = '';

$nome = addslashes($_POST['nome']);
$quantidade = addslashes($_POST['Quantidade']);

$tipo = addslashes($_POST['tipo']);
$cor = addslashes($_POST['cor']);

$descricao = addslashes($_POST['descricao']);
 

$erros = array();
$saida = '';

if(empty($nome)){
    $erros['e'] = 'Preencha o Campo nome do Material';
}elseif(empty($cor)){
    $erros['e'] = 'Preencha o Campo cor da Ferramenta';
}elseif(empty($quantidade)){
    $erros['e'] = 'Preencha o Campo Quantidade Ferramenta';
}else{
    
    // $cmd = $con->AddMaterial($nome,$tipo,$medida,$cor,$quantidade);
    $cmd = $pdo->prepare("INSERT INTO ferramenta(nome,tipo,cor,quantidade,descricao) values(:n,:t,:c,:q,:d)");
        $cmd->bindValue(":n",$nome);
        $cmd->bindValue(":t",$tipo);
        $cmd->bindValue(":c",$cor);
        $cmd->bindValue(":q",$quantidade);
        $cmd->bindValue(":d",$descricao);
        $cmd->execute();

    if($cmd->rowCount() > 0){
            $saida = '<p class="alert alert-success text-center ">Registado Com sucesso</p>';
            ?><script>setTimeout(function(){location.assign("Ferramentas.php");}, 3000);</script><?php
    }else{
        $saida ='<p class="alert alert-danger text-center border-danger">Falha no Registo</p>';
    }
    
}
if(isset($erros['e'])){
    $saida ='<p class="alert alert-danger text-center border-danger">'.$erros['e'].'</p>';
}

echo $saida;
?>