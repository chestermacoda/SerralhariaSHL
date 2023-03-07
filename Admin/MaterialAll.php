<?php
include_once "../connect/config.php";
include_once "config/total.php";
$dados = $con->material();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Material</title>
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="stylesheet" href="../public/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="../public/css/tabelas.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
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
            <section> 
                <h2 class="h2">Todo Material</h2>
                <div class="menu">
                    <a href="produtos.php" class="btn btn-primary">voltar</a>
                </div>
                        <div class="pesquisa row m-2">
                            <select name="" id="" class="form-control me-2">
                                <option value="">5 Registos</option>
                                <option value="">15 Registos</option>
                                <option value="">25 Registos</option>
                                <option value="">Todos Registos</option>
                            </select>
                            <input type="text" name="buscar" id="buscar" class="form-control me-2 pesquisar" placeholder="pesquisar Produto">
                        </div>
                        <div class=" table-responsive text-nowrap">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="top">
                                    <td>ID</td>
                                    <td>Nome Produto</td>
                                    <td>Tipo</td>
                                    <td>Medida</td>
                                    <td>Qt Stocke</td>
                                    <td colspan="2">Action</td>
                                </thead>
                                <tbody class="tab">
                                    <tr>
                                        <td colspan="6">Sem Dados</td>
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
    <script>var url = 'archives/produtos.php';</script>
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
        })
    </script>
    <script src="../public/js/modal.js"></script>
    
</body>
</html>