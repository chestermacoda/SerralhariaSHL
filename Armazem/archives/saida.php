<?php
include_once "../../connect/config.php";
 
$dados = '';
$valor = '';
$quantity = '';

$id_material = addslashes($_POST['nome']);
$id_funcionario = addslashes($_POST['funcionario']);
$quantidade = addslashes($_POST['Quantidade']);
$data = addslashes($_POST['data']);
if(!empty($_POST['nome'])){
    $cmd = $pdo->query("SELECT quantidade FROM material WHERE id = $id_material");
    $dados = $cmd->fetch();
    $valor = $dados['quantidade'];
   
}
if($quantidade > 0){
    $quantity = $valor - $quantidade;
}



$erros = array();
$saida = '';

if(empty($id_material)){
    $erros['e'] = 'Escolha o Material ';
}elseif(empty($id_funcionario)){
    $erros['e'] = 'Escolha o Funcionario';
}elseif(empty($quantidade)){
    $erros['e'] = 'Preencha o Campo Quantidade do Material';
}elseif($valor == 0){
    $erros['e'] = 'Produto sem stock';
}elseif($quantity < 0){
    $erros['e'] = 'Produto Excedeu a stock';
}else{
    
    $cmd = $pdo->prepare("INSERT INTO saidamaterial(id_funcionario,id_material,quantidade,data) values(:f,:m,:q,:d)");
        $cmd->bindValue(":m",$id_material);
        $cmd->bindValue(":f",$id_funcionario);
        $cmd->bindValue(":q",$quantidade);
        $cmd->bindValue(":d",$data);       
        $cmd->execute();
 

    if($cmd->rowCount() > 0){
            $saida = '<p class="alert alert-success text-center border-success">Registado Com sucesso</p>';
            $dados = $con->updateQuantity($id_material,$quantity);
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