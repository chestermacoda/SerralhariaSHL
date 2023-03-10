<?php
include_once "../../connect/config.php";

    $cor = '';
    $medida = '';
    $quantidade = "";
    $data = "";
    $erros = array();
    $saida = '';
    
        $Entrada = addslashes($_POST['Entrada']);
        $id = addslashes($_POST['id']);
 
  

        

        if(empty($Entrada)){
            $erros['e'] = 'Preencha o Campo nome do Funcionario';
        }else{
            
            $cmd = $pdo->query("UPDATE presenca SET Entrada = '$Entrada' WHERE id = '$id'");
        
            if($cmd->rowCount() > 0){
                    $saida = '<p class="alert alert-success text-center">Actualizado Com sucesso</p>';
                    ?><script>setTimeout(function(){location.reload();}, 3000);</script><?php
            }else{
                $saida ='<p class="Error">Falha no Registo</p>';
            }
            
        }
    
if(isset($erros['e'])){
    $saida ='<p class="alert alert-danger text-center">'.$erros['e'].'</p>';
}

echo $saida;
?>