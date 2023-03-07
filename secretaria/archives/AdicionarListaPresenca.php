<?php
include_once "../../connect/config.php";

$data = date("Y-m-d");
$saida = '';
$cmd = $pdo->query("SELECT * FROM presenca where data = '$data'");
$dados = $cmd->fetchAll();

if($cmd->rowCount() > 0){
    $saida ='<p class="alert alert-info text-center">A Lista de Presença Ja Foi Criada</p>';
}else{
    $dds = '';
    $satus = 'on';
    $cmd = $pdo->query("SELECT id FROM funcionarios where status = '$satus'");
    $dados = $cmd->fetchAll();  
    foreach($dados as $d){
        $id = $d['id'];
        $dds = $pdo->prepare("INSERT INTO presenca(id_funcionario,data) values(:id,:data)");
        $dds->bindValue(":id",$id);
        $dds->bindValue(":data",$data);
        $dds->execute();
    }
    if($dds->rowCount() > 0){
        $saida = '<p class="alert alert-success text-center">Lista Criada Com sucesso</p>';
        ?><script>setTimeout(function(){location.reload();}, 3000);</script><?php
    }else{
        $saida ='<p class="alert alert-danger text-center">Error Na Criação da Lista</p>';
    }
}

echo $saida;
?>