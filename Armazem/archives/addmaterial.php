<?php
include_once "../../connect/config.php";

    $cor = '';
    $medida = '';
    $quantidade = "";
    $data = "";
    $erros = array();
    $saida = '';
    
        $nome = addslashes($_POST['nome']);
        $tipo = addslashes($_POST['tipo']);
        $medida = addslashes($_POST['medida']);
        $cor = addslashes($_POST['cor']);
        $quantidade = addslashes($_POST['Quantidade']);
        $data = addslashes($_POST['data']);
        

        

        if(empty($nome)){
            $erros['e'] = 'Preencha o Campo nome do Material';
        }elseif(empty($tipo)){
            $erros['e'] = 'Preencha o Campo tipo';
        }elseif(empty($data)){
            $erros['e'] = 'Preencha o Campo Data de Entrada';
        }elseif(empty($quantidade)){
            $erros['e'] = 'Preencha o Campo Quantidade';
        }else{
            
            // $cmd = $con->AddMaterial($nome,$tipo,$medida,$cor,$quantidade);
            $cmd = $pdo->prepare("INSERT INTO material(NomeMaterial,tipo,medida,cor,quantidade,data) values(:n,:t,:m,:c,:q,:d)");
                $cmd->bindValue(":n",$nome);
                $cmd->bindValue(":t",$tipo);
                $cmd->bindValue(":m",$medida);
                $cmd->bindValue(":c",$cor);
                $cmd->bindValue(":q",$quantidade);
                $cmd->bindValue(":d",$data);
                $cmd->execute();

            if($cmd->rowCount() > 0){
                    $saida = '<p class="Sucess">Registado Com sucesso</p>';
                    ?><script>setTimeout(function(){location.assign("produtos.php");}, 3000);</script><?php
            }else{
                $saida ='<p class="Error">Falha no Registo</p>';
            }
            
        }
    
if(isset($erros['e'])){
    $saida ='<p class="Error">'.$erros['e'].'</p>';
}

echo $saida;
?>