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

            <section>
                <h2 class="h2">Gerir Horas Extras</h2>
                <div class="menu">
                    <a href="addFuncionario.php" class="btn btn-primary">Adicionar Funcionarios</a>
                </div>
                <div class="pesquisa row m-2 mr-2">
                    <input type="text" name="buscar" id="buscar" class="form-control" placeholder="pesquisar Produto">
                    <input type="date" name="buscar" id="registo" class="form-control mx-2" placeholder="pesquisar Produto">
                </div>
                <div class="resp"></div>
                <div class="table-responsive text-nowrap ">
                    <form action="" class="todos">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="top">
                                <td>Select</td>
                                <td>Nome</td>
                                <td>Data</td>
                                <td>Entrada</td>
                                <td colspan="2">Saida Horas Extras</td>
                            </thead>
                            <tbody class="tab"></tbody>
                            <tfoot>
                                <tr>
                                    <td colspan=""><input type="checkbox" name="all" id=""></td>
                                  	<td colspan="">Todos Selecionados</td>
                                    <td colspan="2"><input type="time" name="time" id="time" class="form-control" placeholder="pesquisar Produto"></td>
                                    <td><button type="submit" class="btn btn-outline-secondary "><i class="fa-solid fa-check"></i></button></td>
                                </tr>
                            </tfoot>
                        </table>

                    </form>
                     
                </div>
            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/admin.js"></script>
    <script>
        var url = "archives/HorasExtras.php";
        // var table = "archives/addPresenca.php";
    </script>
    <script src="../public/js/funcionarios.js"></script>
</body>

<script>

        document.querySelector("input[name=all]").onclick = function(e) {
            var marcar = e.target.checked;
            var lista = document.querySelectorAll("input");
            for (var i = 0; i < lista.length; i++) {
                lista[i].checked = marcar;
            }
        }
        $(document).ready(function() {
            $(document).on("click", ".lista", function(e) {
                e.preventDefault();
                var lista = $(this).attr("data-value");
                var data = $(this).attr("data-id");
                // alert(id)
                $.ajax({
                    url: listas,
                    method: "POST",
                    data: {
                        data: data,
                        lista: lista
                    }
                }).done(function(data) {
                    $(".resp").html(data)
                    // alert(data)
                })
            })

            $(document).on("submit",".todos",function(e){
                e.preventDefault();
                var load = "<p class='text-center'><img src='../public/images/load.gif' style='width:40px; height:30px'></p>";
                $('.tab').html(load); 
                $.ajax({
                    url:  "archives/AddHorasExtras.php",
                    method:"POST",
                    data: new FormData(this), 
                    contentType: false,
                    cache: false,
                    processData: false, 
                }).done(function(data){
                    $(".resp").html(data)
                })
            })
        })
    </script>
</html>