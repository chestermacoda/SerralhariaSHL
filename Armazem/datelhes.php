<?php
include_once "../connect/config.php";
include_once "config/total.php";
include_once "config/notificacao.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dados = $con->materialInfo($id);
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
                    <a href="produtos.php" title="Adicionar Novo Produto" class="btn btn-primary">voltar</i></a>
                </div>
                
                <?php
                    include_once "views/modalEntrada.php";
                ?>
                
                <div  >
                    <div class="resp"></div>
                    
                    <table class="table table-bordered table-hover">
                        
                        <tbody class="text-center">
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">ID</td><td><?=$dados['id']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Nome Produto</td><td><?=$dados['NomeMaterial']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Tipo</td><td><?=$dados['tipo']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Medida</td><td><?=$dados['medida']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">cor</td><td><?=$dados['cor']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Quantidade</td><td><?=$dados['quantidade']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Data de Registo</td><td><?=$dados['registo']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Action</td>
                                <td><a href="EditarMaterial.php?id=<?=$dados['id']?>"  class="btn btn-outline-primary"><i class="fa-solid fa-edit"></i></a>
                                <button  class="btn btn-outline-danger delet" id="<?=$dados['id']?>"><i class="fa-solid fa-trash-can"></i></button></td>
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