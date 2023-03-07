<?php
include_once "../../connect/config.php";
include_once "../dompdf/dompdf/autoload.inc.php";
$saida ='';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();

$cmd = $pdo->prepare("SELECT * FROM material where quantidade <= 6  LIMIT 5");
$cmd->execute();
$dados = $cmd->fetchAll();
foreach($dados as $k ){
    $saida .='
        <tr>
            <td>'.$k['id'].'</td>
            <td>'.$k['NomeMaterial'].'</td>
            <td>'.$k['tipo'].'</td>
            <td>'.$k['medida'].'</td>
            <td>'.$k['quantidade'].'</td>
        </tr>
    
    ';
}
$request = '';
$request .= '

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerir Estoque Baixo</title>
    <link rel="stylesheet" href="../public/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="../../public/css/dompdf.css">
</head>
<body> 
    <div class=" text-center">
    <section> 
                        <div class="print">
                            <img src="../../public/images/1672901618319.jpg" alt="">
                            <h2>SHL Metalomecanica, Lda</h2>
                            <p>Rua Marcelino dos Santos Q 11, N: 102-Liberdade Email: HortencioLanga@gmail.com</p>
                            <h3>Lista de Material com Estoque Baixo</h3>             
                        </div>
                        
                            <div class="tabela">
                                <table class="table table-bordered table-hover text-center">
                                        <tr class="top">
                                            <td>Codigo</td>
                                            <td>Nome Produto</td>
                                            <td>Tipo</td>
                                            <td>Medida</td>
                                            <td>Qt Stocke</td>
                                        </tr>
                                        <tbody>
                                        '.$saida.'
                                        </tbody>                   
                                </table>
                            </div>
            </section>
    </div> 
</body>
</html>
// <?php
';
$dompdf->load_html($request, 'UTF-8');

$dompdf->setPaper('A4', 'landscape');
	
	//Renderizar o html
	$dompdf->render();
	

	//Exibibir a página
	$dompdf->stream(
		"relatorio.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	); 
    
    ?>