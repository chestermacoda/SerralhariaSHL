<?php
include_once "../connect/config.php";
include_once "config/total.php";
include_once "config/notificacao.php";
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
            require_once "views/nav.php";
        ?>
        </header>
        <main>
             <?php
                include_once "views/header.php";
             ?>
            <section>

                <h2>Requisições Diarias</h2>
                <div id="menu">
                    <a href="RequisitarTools.php" title="Adicionar Novo Produto" class="btn btn-primary">Requisitar Ferramenta</i></a>
                </div>
                
                <div class="pesquisa row m-2">
                    <input  type="text" name="busca" id="busca" placeholder="pesquisar Produto" class="form-control me-2">
                    <input type="date" name="buscar" id="buscar" value="" class="form-control">
                    
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered table-striped table-hover text-center">
                        <tr class="top">
                            <td>Selecionar</td>
                            <td>Nome</td>
                            <td>Ferramenta</td>
                            <td>Quantidade</td>
                            <td>Data Retorno</td>
                            <td>Status</td>
                            <td colspan="2">Action</td>
                        </tr>
                        <tbody class="tab">
                              
                        </tbody> 
                         
                    </table>
                </div>
                <?php
                include_once "views/modalSaida.php";
                ?>
            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/admin.js"></script>
    <script src="../public/js/bootstrap.bundle.js"></script>
    <script>
        var table = "archives/TabelaFerr.php";
        var buscar = "archives/BuscarRequisicao.php";
    </script>
    <script src="../public/js/modal.js"></script>
</body>
</html>