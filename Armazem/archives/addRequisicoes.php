<?php

 
include_once "../../connect/config.php";
 
$dados = '';
$valor = '';
$nome = '';
$quantity = '';
$descricao = '';
$retorno = '';

$id_ferramenta = addslashes($_POST['nome']);
$id_funcionario = addslashes($_POST['funcionario']);
$quantidade = addslashes($_POST['Quantidade']);
$status = addslashes($_POST['status']);
$entrega = addslashes($_POST['dataEntrega']);
if(empty($retorno)){
    $retorno = $entrega;
}else{
    $retorno = addslashes($_POST['dataRetorno']);
}
$descricao = addslashes($_POST['descricao']);
if(!empty($_POST['nome'])){
    $cmd = $pdo->query("SELECT nome,quantidade FROM ferramenta WHERE id = $id_ferramenta");
    $dados = $cmd->fetch();
    $valor = $dados['quantidade'];
    $nome = $dados['nome'];
    
}
if($quantidade > 0 AND !empty($_POST['nome'])){
    $quantity = $valor - $quantidade;
}



$erros = array();
$saida = '';

if(empty($id_ferramenta)){
    $erros['e'] = 'Escolha a Ferramenta a ser Requisitado ';
}elseif(empty($id_funcionario)){
    $erros['e'] = 'Escolha o Funcionario que Deseja Requisitar a Ferramenta';
}elseif(empty($quantidade)){
    $erros['e'] = 'Preencha o Campo Quantidade do Material';
}elseif(empty($status)){
    $erros['e'] = 'Escolha o Procedimento ';
}elseif($status == "Saida"){
    $erros['e'] = 'Introduz a data de Retorno da Ferramenta ';
}elseif($valor == 0){
    $erros['e'] = 'Ferramenta Sem Stock';
}elseif($quantity < 0){
    $erros['e'] = 'Ferramenta Requisitada Excedeu o Stock Existente';
}else{
    
    $cmd = $pdo->prepare("INSERT INTO requisitartools(id_ferramenta,id_funcionario,quantidade,entregaData,retornoData,descricao, status) values(:fe,:f,:q,:e,:r,:d,:s)");
        $cmd->bindValue(":fe",$id_ferramenta);
        $cmd->bindValue(":f",$id_funcionario);
        $cmd->bindValue(":q",$quantidade);
        $cmd->bindValue(":e",$entrega);       
        $cmd->bindValue(":r",$retorno);       
        $cmd->bindValue(":d",$descricao);       
        $cmd->bindValue(":s",$status);       
        $cmd->execute();
 

    if($cmd->rowCount() > 0){
            $saida = '<p class="alert alert-success text-center border-success">Requisição da '.$nome.' Efectuado com sucesso </p>';
            $dados = $con->updateQuantityTools($id_ferramenta,$quantity);
            ?><script>setTimeout(function(){location.reload();}, 100);</script><?php     
    }else{
        $saida ='<p class="alert alert-danger text-center border-danger">Falha no Registo</p>';
    }
    
}
if(isset($erros['e'])){
    $saida ='<p class="alert alert-danger text-center border-danger">'.$erros['e'].'</p>';
}

echo $saida;
?>

 