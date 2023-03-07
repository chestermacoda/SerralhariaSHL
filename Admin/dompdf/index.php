<?php	
	include_once "../public/classes/db.php";
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	
    
    $cmd = $pdo->prepare("SELECT * FROM card_temporary ");
    $cmd->execute();
    $dados = $cmd->fetchAll();

    $resposta ='';
   $total = 0;
        foreach($dados as $cat){
			$total += $cat['preco'];
            $resposta .='
          
                <tr>
                    <td>'.$cat['id'].'</td>
                    <td>'.$cat['nome'].'</td>
                    <td>'.$cat['quantidade'].'</td>
                    <td class="price">'.number_format($cat['PrecoPorUnidade'],00.0).'</td>
					<td class="price">'.number_format($cat['preco'],00.0).'</td>
                    
                </tr>
               
            ';
			
        }
   

	 

	// Carrega seu HTML
	$dompdf->load_html('
			<!DOCTYPE html>
			<html lang="pt-br">
				<head>
					<meta charset="utf-8">
					<title>Ferragem Macoda </title>
					<link href="css/personalizado.css" rel="stylesheet">
				</head>
					
					<main>
            <section>
                <article>
                    <table>
                        <tr class="top">
                            <td>ID</td>
                            <td>Nome</td>
                            <td>Quantidade</td>
                            <td>Preco Por Unidade</td>
                            <td>Preco</td>
                        </tr>
                        <tbody>
						'.$resposta.'
                        </tbody>
                        <tfoot>
                            <tr class="bottom">
                                <td>Preço Total</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="total">'.number_format($total,00.0).'<td>                               
                            </tr>
                        </tfoot>
                    </table>
                </article>
                
            </section>
        	</main>
				<script src="../public/js/jquery.js"></script>
				<script>
						$(document).ready(function(){
							$.ajax({
								url: "public/classes/PriceTotal.php",
								method: "GET",
							}).done(function(data){
								$(".total").html(data)
								// alert(data)
							})
						})
				</script>
				<body>
			</html>
		');

	
	$dompdf->setPaper('A4', 'landscape');
	
	//Renderizar o html
	$dompdf->render();
	

	//Exibibir a página
	$dompdf->stream(
		"relatorio_celke.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>