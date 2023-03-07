<?php
include_once "../connect/config.php";
include_once "config/total.php";
include_once "config/notificacao.php";
$dados = $con->material();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque de Material</title>
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
                <h2>Gerir Material</h2>
                <div id="menu">
                    <a href="addProdutos.php" title="Adicionar Novo Produto" class="btn btn-primary">Adicionar Novo Material</i></a>
                    <button  type="button"  data-bs-toggle="modal" data-bs-target="#janelamodal" class="btn btn-primary">Entrada Material</button>
                    <a href="addsaida.php" title="Adicionar Novo Produto" class="btn btn-primary">Saida Material</i></a>     
                    <a href="#"  class="btn btn-primary print"><i class="fa-solid fa-print"></i></a>
                </div>
                <?php
                    include_once "views/modalEntrada.php";
                ?>
                <div class="pesquisa row m-2">
                    <select name="registo" id="registo" class="form-control me-2">
                        <option value="5">5 Registos</option>
                        <option value="15">15 Registos</option>
                        <option value="25">25 Registos</option>
                        <option value="500">Todos Registos</option>
                    </select>
                    <input type="text" name="buscar" id="buscar" class="form-control me-2 pesquisar" placeholder="pesquisar Produto">
                </div>
                <?php include_once "../print.php" ?>
                <div class=" table-responsive text-nowrap ">
                    <table class="table table-bordered table-striped table-hover text-center">
                        <thead class="top">
                            <td>ID</td>
                            <td>Nome Produto</td>
                            <td>Tipo</td>
                            <td>Medida</td>
                            <td>Qt Stocke</td>
                            <td colspan="2">Action</td>
                        </thead>
                        <tbody class="tab"></tbody>                        
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
    <script>
        $(document).ready(function(){
            $('#buscar').keyup(function(e){
            e.preventDefault();
                // alert("bem vindo ao ajax")
            var valor = $(this).val().toLowerCase();

            $('.tab tr').filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1)
            })

            })
            $(document).on("click",".print",function(e){
                e.preventDefault();
                window.print()
            })
        })
    </script>
    <script src="../public/js/modal.js"></script>
    
</body>
</html>