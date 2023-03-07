<?php
include_once "../../connect/config.php";

    $cor = '';
    $medida = '';
    $quantidade = "";
    $data = "";
    $erros = array();
    $saida = '';
    
        $Entrada = addslashes($_POST['Entrada']);
        $Saida = addslashes($_POST['Saida']);
        $id = addslashes($_POST['id']);
        $data = addslashes($_POST['data']);
  

        

        if(empty($Entrada)){
            $erros['e'] = 'Preencha o Campo nome do Funcionario';
        }elseif(isset($Saida) && empty($Entrada)){
            $erros['e'] = 'Campo Entrada Não Pode Estar Vazio';
        }else{
            
            $cmd = $pdo->query("UPDATE presenca SET Entrada = '$Entrada', Saida = '$Saida' WHERE id_funcionario = '$id' and data = '$data' ");
        
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