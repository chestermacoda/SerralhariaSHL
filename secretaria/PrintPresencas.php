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
    <title>Lista de Presenças</title>
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
                <h2>Lista de Presenças</h2>
                <div id="menu">
                    <button  class="btn btn-primary btn-lg print"><i class="fa-solid fa-print"></i></button>
                </div>
                <?php
                    include_once "views/modalEntrada.php";
                ?>
                <div class="pesquisa row m-2 ">
                    <!-- <select name="registo" id="registo" class="form-control me-2">
                        <option value="5">5 Registos</option>
                        <option value="15">15 Registos</option>
                        <option value="25">25 Registos</option>
                        <option value="500">Todos Registos</option>
                    </select> -->
                    <input type="date" name="" id="busca1" class="form-control me-2 pesquisar" placeholder="pesquisar Produto">
                    
                    <input type="date" name="" id="busca2" class="form-control me-2 pesquisar" placeholder="pesquisar Produto">
                    <button class="btn btn-primary col-1 busca"><i class="fa-solid fa-search"></i></button>
                </div>
                <?php include_once "../print.php" ?>
                <div class=" table-responsive text-nowrap">
                    <table class="table table-bordered table-hover text-center table-striped">
                        <thead class="top">
                            <td>ID</td>
                            <td>Nome</td>
                            <td>Entrada</td>
                            <td>Saida</td>
                            <td>Horas Extras</td>
                            <td>Data e Hora</td>
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
           
            $.ajax({
                    url: "archives/ListaPresencas.php",
                    method: "GET"
                }).done(function(data){
                    $(".tab").html(data)
            })
        })
    </script>
    <script src="../public/js/modal.js"></script>
    
</body>
</html>