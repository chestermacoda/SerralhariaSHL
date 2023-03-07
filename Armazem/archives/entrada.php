<?php
include_once "../../connect/config.php";
 
$dados = '';
$valor = '';
$quantity = '';

$id_material = addslashes($_POST['nome']);
$quantidade = addslashes($_POST['Quantidade']);
$data = addslashes($_POST['data']);
if(!empty($_POST['nome'])){
    $cmd = $pdo->query("SELECT quantidade FROM material WHERE id = $id_material");
    $dados = $cmd->fetch();
    $valor = $dados['quantidade'];
   
}
if($quantidade > 0){
    $quantity = $valor + $quantidade;
}



$erros = array();
$saida = '';

if(empty($id_material)){
    $erros['e'] = 'Escolha o Material ';
}elseif(empty($quantidade)){
    $erros['e'] = 'Preencha o Campo Quantidade do Material';
}elseif(empty($data)){
    $erros['e'] = 'Adiciona data entrada do Material';
}else{
    
        // $dados = $con->updateQuantity($id_material,$quantity);
        $cmd = $pdo->query("UPDATE material SET quantidade = '$quantity' WHERE `material`.`id` = '$id_material';");

    if($cmd->rowCount() > 0){
            $saida = '<p class="alert alert-success text-center border-success">Registado Com sucesso</p>';
            $con->EntradaInserir($id_material,$quantidade,$data);
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