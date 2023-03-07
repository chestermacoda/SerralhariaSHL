<?php
include_once "../connect/config.php";
include_once "config/total.php";
include_once "config/notificacao.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dados = $con->outMaterial($id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerir Produtos</title>
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="stylesheet" href="../public/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="../public/css/tabelas.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
</head>
<body>
    <div class="conteiner">
        <header>
            <?php
                include_once "views/nav.php";
            ?>
        </header>
        <main>
                <?php
                    include_once "views/header.php";
                ?>
            <section>
                <h2>Detalhes do <?=$dados['NomeMaterial']?></h2>
                <div id="menu">
                    <a href="ListaSaidas.php" title="Adicionar Novo Produto" class="btn btn-primary">voltar</i></a>
                </div>
                
                <?php
                    include_once "views/modalEntrada.php";
                ?>
                
                <div  >
                    <table class="table table-bordered table-hover">
                        
                        <tbody class="text-center">
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">ID</td><td><?=$dados['id']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Nome</td><td><?=$dados['NomeMaterial']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Material</td><td><?=$dados['NomeMaterial']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Quantidade</td><td><?=$dados['quantidade']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Data de Registo</td><td><?=$dados['registo']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Action</td>
                                <td><a href="addsaida.php?id=<?=$dados['id']?>"  class="btn btn-outline-primary"><i class="fa-solid fa-edit"></i></a>
                                <a  href="addsaida.php?id=<?=$dados['id']?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a></td>
                            </tr>
                        </tbody>                        
                    </table>
                </div>

            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/bootstrap.bundle.js"></script>
    <script src="../public/js/admin.js"></script>
    <script src="../public/js/material.js"></script>
    <script>var url = 'archives/entrada.php';</script>
    <script src="../public/js/modal.js"></script>
</body>
</html>