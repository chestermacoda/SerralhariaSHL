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
    <title>Notificações do Sistema</title>
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

                <h2>Notificações do Sistema</h2>
                 
                
                <div class="pesquisa row m-2">
                    <select name="" id="" class="form-control me-2">
                        <option value="">5 Registos</option>
                        <option value="">15 Registos</option>
                        <option value="">25 Registos</option>
                        <option value="">Todos Registos</option>
                    </select>
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
                        </tr>
                        <tbody class="tab">
                              
                        </tbody> 
                        <!-- <tfoot>
                            <tr>
                                <td>Todos</td>
                                <td></td> 
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             
                                <td><button class="btn btn-outline-danger btn-sm" title="Remover todos"><i class="fa-solid fa-trash-can"></i></button></td>
                                <td><button class="btn btn-outline-primary btn-sm" title="Marcar todos como entregues"><i class="fa-solid fa-check"></i></button></td>
                            </tr>
                        </tfoot> -->
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
        var table = "archives/notification.php";
        // var buscar = "archives/BuscarRequisicao.php";
    </script>
    <script src="../public/js/modal.js"></script>
</body>
</html>