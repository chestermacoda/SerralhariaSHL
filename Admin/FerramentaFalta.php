<?php
include_once "../connect/config.php";
include_once "config/total.php";
$dados = $con->listarSaidas();
$material = $con->material();
$funcio = $con->funcionarios();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferramenta Em Falta</title>
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="stylesheet" href="../public/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="../public/css/tabelas.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
</head>
<body>
    <div class="conteiner">
        <header class="bg-primary">
        <?php
            require_once "views/nav.php";
        ?>
        </header>
        <main>
             <?php
                include_once "views/header.php";
             ?>
            <section>
                <h2>Ferramentas Em Falta</h2>
                <div id="menu">
                    <a href="ferramentas.php" title="Adicionar Novo Produto" class="btn btn-primary">voltar</i></a>                    
                </div>
                <div class="pesquisa row m-2">
                    <input  type="text" name="buscar" id="busca" placeholder="pesquisar Produto" class="form-control me-2">                 
                </div>
                <div class="table-responsive text-nowrap ">
                    <table class="table table-bordered table-striped table-hover text-center">
                        <tr class="top">
                            <td>id</td>
                            <td>Nome</td>
                            <td>tipo</td>
                            <td>funcionario</td>
                            <td>Quantidade</td>
                            <td>Data Retorno</td>
                            <td colspan="2">Action</td>
                        </tr>
                        <tbody class="tab"></tbody> 
                    </table>
                </div>
            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/admin.js"></script>
    <script src="../public/js/bootstrap.bundle.js"></script>
    <script>var table = "archives/notification.php";</script>
    <script src="../public/js/modal.js"></script>
</body>
</html>