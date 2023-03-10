<?php
include_once "config/total.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrador</title>
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="stylesheet" href="../public/css/tabelas.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/fontawesome-free-6.2.1-web/css/all.min.css">
</head>
<body>
    <div class="conteiner">
            <header class="bg-primary">
                 <?php
                    include_once "views/nav.php";
                 ?>
            </header>
            <main>
                <?php
                    include_once "views/header.php";
                ?>
            
            <section >
                <h2 class="h2">Gerir Estagiarios</h2>
                <div class="menu">
                    <a href="addFuncionario.php" class="btn btn-primary">Adicionar Funcionarios</a>
                    <button class="btn btn-primary print"><i class="fa-solid fa-print"></i></button>
                </div>
                <?php include_once "../print.php" ?>
                <div class="pesquisa row m-2">
                    <select name="registo" id="registo" class="form-control me-2">
                        <option value="5">5 Registos</option>
                        <option value="15">15 Registos</option>
                        <option value="25">25 Registos</option>
                        <option value="255">Todos Registos</option>
                    </select>
                    <input type="text" name="buscar" id="buscar" class="form-control me-2 pesquisar" placeholder="pesquisar Produto">
                </div>
                <div class=" table-responsive text-nowrap">
                    <table class="table table-bordered table-striped table-hover text-center">
                        <thead class="top">
                            <td>ID</td>
                            <td>Nome Completo</td>
                            <td>E-mail</td>
                            <td>Area de Formação</td>
                            <td>Data Inicio</td>
                            <td>Data Fim</td>
                            <td>status</td>
                            <td colspan="2">Action</td>
                        </thead>
                        <tbody class="tab">
                            
                        </tbody>                        
                    </table>
                </div>
            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/admin.js"></script>
    <script>var url = "archives/TabelaEstagiar.php";</script>
    <script src="../public/js/funcionarios.js"></script>
</body>
</html>