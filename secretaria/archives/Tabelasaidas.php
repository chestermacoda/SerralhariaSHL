<?php
include_once "../../connect/config.php";

        $saida = '';
        

           if(isset($_POST['registo'])){
                $data = $_POST['registo'];
                $cmd = $pdo->prepare("SELECT sa.id,sa.quantidade,sa.data,m.NomeMaterial,f.nome FROM saidamaterial sa INNER JOIN material m ON m.id = sa.id_material INNER JOIN funcionarios f ON f.id = sa.id_funcionario where sa.data = '$data'");
                $cmd->execute();
                $dados = $cmd->fetchAll();
                
                if($cmd->rowCount() > 0){
                    foreach($dados as $s){ 
                            $saida .= '
                            <tr>
                                <td>'.$s['id'].'</td>
                                <td>'.$s['nome'].'</td>
                                <td>'.$s['NomeMaterial'].'</td>
                                <td>'.$s['quantidade'].'</td>
                                <td>'.$s['data'].'</td>
                                 
                            </tr>
                            ';
                    }
                }else{
                        $saida .= '
                            <tr>
                                <td colspan="8">Sem Dados</td>
                            </tr>
                            ';
                }
           }else{
                    $data = date('Y-m-d');
                    $cmd = $pdo->prepare("SELECT sa.id,sa.quantidade,sa.data,m.NomeMaterial,f.nome FROM saidamaterial sa INNER JOIN material m ON m.id = sa.id_material INNER JOIN funcionarios f ON f.id = sa.id_funcionario where sa.data = '$data'");
                    $cmd->execute();
                    $dados = $cmd->fetchAll();

                    if($cmd->rowCount() > 0){
                        foreach($dados as $s){ 
                                $saida .= '
                                <tr>
                                    <td>'.$s['id'].'</td>
                                    <td>'.$s['nome'].'</td>
                                    <td>'.$s['NomeMaterial'].'</td>
                                    <td>'.$s['quantidade'].'</td>
                                    <td>'.$s['data'].'</td>
                                     
                                </tr>
                                ';
                        }

                    }else{
                        $saida .= '
                                    <tr>
                                        <td colspan="8">Sem Dados</td>
                                    </tr>
                                    ';
                }
        
           }
      echo $saida;
        