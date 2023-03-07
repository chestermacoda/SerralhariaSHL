 <?php
include_once "../../connect/config.php";

$id = addslashes($_POST['idRequi']);
$status = addslashes($_POST['status']);
$quantidade = addslashes($_POST['quantidade']);
$id_ferramenta = addslashes($_POST['id_ferramenta']);

if(!empty($_POST['id_ferramenta'])){
    $cmd = $pdo->query("SELECT nome,quantidade FROM ferramenta WHERE id = $id_ferramenta");
    $dados = $cmd->fetch();
    $valor = $dados['quantidade'];
    // $nome = $dados['nome'];
   
}
if($quantidade > 0){
    $quantity = $valor + $quantidade;
}

$erros = array();
$saida = '';
    $cmd = $pdo->prepare("UPDATE requisitartools SET status = '$status' WHERE `requisitartools`.`id` = '$id';");
    $cmd->execute();
    
    if($cmd->rowCount() > 0){
        $saida = '<p class="alert alert-success text-center border-success">Requisição da  Efectuado com sucesso </p>';
        $dados = $con->updateQuantityTools($id_ferramenta,$quantity);
            
}else{
    $saida ='<p class="alert alert-danger text-center border-danger">Falha no Registo</p>';
}


if(isset($erros['e'])){
    $saida ='<p class="alert alert-danger text-center border-danger">'.$erros['e'].'</p>';
}

echo $saida;
?>

 