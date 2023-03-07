<?php
include_once "../../connect/config.php";

$saida = '';
$data = date('Y-m-d');
$cmd = $pdo->query("SELECT * FROM `notification` where id_funcionario != '' ");
$tools = $cmd->fetchAll();
$stocke  = '';
$satus  = '';
$valor = '';
$desabilotar = '';
if($cmd->rowCount() > 0){
    foreach($tools as $t){
        
        $ferramenta = $t['id_ferramenta'];
        if(empty($ferramenta)){
            $stocke = " stock baixo ";
        }else{
            $stocke = " Em falta ";
        }
        $saida .= '
        <tr class="'.$satus.'">
            <td>'.$t['id'].'</td>
            <td>'.$t['id_ferramenta']. '' .$stocke.'</td>
            <td>'.$t['tipo'].'</td>
            <td>'.$t['id_funcionario'].'</td>
            <td>'.$t['quantidade'].'</td>
            <td>'.$t['dataRetorno'].'</td>
           
        </tr>
    ';
}
}else{
    $saida = '
        <tr>
            <td  colspan="7">Não Tem Nenhuma notificação no Sistema</td>
        </tr>
    ';
}

echo $saida;

?>
