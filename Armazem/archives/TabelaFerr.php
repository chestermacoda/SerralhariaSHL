<?php
include_once "../../connect/config.php";

$saida = '';
$data = date('Y-m-d');
$cmd = $pdo->query("SELECT r.id,r.id_ferramenta,r.status, f.nome as ferramenta, fu.nome, r.quantidade, r.entregaData,r.retornoData, r.status FROM `requisitartools` r INNER JOIN ferramenta f ON r.id_ferramenta = f.id INNER JOIN funcionarios fu ON r.id_funcionario = fu.id where r.entregaData = '$data'");
$tools = $cmd->fetchAll();
$satus = '';
$valor = '';
$desabilotar = '';
if($cmd->rowCount() >0){
        foreach($tools as $t){
            // $valor = $t['status'];
            if($t['status'] == "Devolucao"){
                $satus = "bg-success text-white";
                $desabilotar = "disabled";
            }else{
                $satus = '';
                $desabilotar = '';
            }
            $saida .= '
            <tr class="'.$satus.'">
                <td><input '.$desabilotar.' type="checkbox" name="" id="" ></td>
                <td>'.$t['nome'].'</td>
                <td>'.$t['ferramenta'].'</td>
                <td>'.$t['quantidade'].'</td>
                <td>'.$t['retornoData'].'</td>
                <td>'.$t['status'].'</td>
                
                <td title="Editar o Produto"><a href="RequisitarTools.php?id='.$t['id'].'" class="btn btn-primary btn-sm"><i class="fa-solid fa-edit"></i></a></td>
                <td title="Editar o Produto"><button '.$desabilotar.' class="btn btn-success btn-sm retorno" id="'.$t['id'].'" data-value="Devolucao" data-id="'.$t['quantidade'].'" data-set="'.$t['id_ferramenta'].'"><i class="fa-solid fa-check"></i></button></td>
            </tr>
        ';
    }
}else{
    $saida .= '
            <tr>
                <td colspan="9">Sem Registos Diarios '.$data.'</td>
                 
            </tr>
        ';
}

echo $saida;

?>
