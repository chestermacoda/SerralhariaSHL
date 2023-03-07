<?php
include_once "../../connect/config.php";
$notif = $pdo->query("SELECT * FROM notification ");
$svalues = $notif->fetchAll();
$saida = '';

foreach($svalues as $N){ 
    $material = $N['id_material'];
    $ferramenta = $N['id_ferramenta'];
    $stocke = "";
    if(empty($ferramenta)){
        $stocke = "Baixo Stocke ";
    }else{ 
        $stocke = "Em falta Para Devolucao ";
    }
    $saida .= '
    <a href="notificacoes.php?delet='.$N['id'].'">
        <div class="text">
            <p class="date">Date: '.$N['registo'].'</p>
            <p>'.$N['id_material'].''.$N['id_ferramenta'].' '.$stocke.'</p>
            <!-- <p>Quantity: '.$N['id_material'].'</p> -->
        </div>
    </a>
    ';
   } 

   echo $saida;
?>