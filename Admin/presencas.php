<?php
include_once "config/total.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Presenças dos Funcionarios</title>
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
                <h2 class="h2">Lista de Presenças dos Funcionarios</h2>
                <div class="menu">
                    <button class="btn btn-primary print"><i class="fa-solid fa-print"></i></button>
                </div>
                <div class="pesquisa m-2">
                    <input type="date" name="" id="busca1" class="form-control me-2 pesquisar" placeholder="pesquisar Produto">
                    <input type="date" name="" id="busca2" class="form-control me-2 pesquisar" placeholder="pesquisar Produto">
                    <button class="btn btn-primary  busca"><i class="fa-solid fa-search"></i></button>
                </div>
                <div class="resp"></div>
                <?php include_once "../print.php" ?>
                <div class="table-responsive text-nowrap ">
                    <form action="" class="all">
                    <table class="table table-bordered table-hover text-center">
                            <thead class="top">
                                <td>Select</td>
                                <td>Nome</td>                            
                                <td>Entrada</td>                            
                                <td>Saida</td>    
                                <td>Data</td>                        
                            </thead>
                            <tbody class="tab"></tbody>                       
                        </table>
                        </form>
                </div>
            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/admin.js"></script>
    <script>
        var url = "archives/Presenca.php";
        $(document).on("click",".busca",function(e){
                e.preventDefault();
                 
                var data1 = $("#busca1").val();
                var data2 = $("#busca2").val()
                // alert(data1 + data2)
                $.ajax({
                    url: "archives/ListaPresencas.php",
                    method: "POST",
                    data:{
                        data1 : data1,
                        data2 : data2
                    }
                }).done(function(data){
                    $(".tab").html(data)
                })
            })
    </script>
    <script src="../public/js/funcionarios.js"></script>
</body>
</html>