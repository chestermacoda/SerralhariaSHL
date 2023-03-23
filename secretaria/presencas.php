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
                <h2 class="h2">Gerir Presenças dos Funcionarios</h2>
                <div class="menu">
                    <a href="addFuncionario.php" class="btn btn-primary">Adicionar Funcionarios</a>
                    <button class="btn btn-primary lista" data-value="lista" data-id="<?= date("Y-m-d") ?>">Adicionar Lista Presença</button>
                    <span class="finalSemana"></span>
                </div>
                <div class="pesquisa row m-2 mr-2">
                    <select name="registo" id="registo" class="form-control me-2">
                        <option value="5">5 Registos</option>
                        <option value="15">15 Registos</option>
                        <option value="25">25 Registos</option>
                        <option value="255">Todos Registos</option>
                    </select>
                    <input type="text" name="buscar" id="buscar" class="form-control" placeholder="pesquisar Produto">
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
                                <td>Saida</td>
                                <td>Action</td>
                            </thead>
                            <tbody class="tab"></tbody>
                            <tfoot>
                                <tr>
                                    <td colspan=""><input type="checkbox" name="all" id=""></td>
                                    <td colspan="">Todos Selecionados</td>
                                    <td colspan="1"><input type="time" name="time" id="" class="form-control"></td>
                                    <td><button type="submit" class="btn btn-outline-secondary "><i class="fa-solid fa-check"></i></button></td>
                                    <td><button type="submit" class="btn btn-outline-secondary "><i class="fa-solid fa-check"></i></button></td>
                                </tr>
                            </tfoot>
                        </table>

                    </form>
                </div>
            </section>
        </main>
    </div>
    <?php include("views/ModalPresenca.php"); ?>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/admin.js"></script>
    <script src="../public/js/bootstrap.bundle.js"></script>
    <script>
        var url = "archives/Presenca.php";
        var table = "archives/addPresenca.php";
        var listas = "archives/AdicionarListaPresenca.php";

        // Adicionar Presenca 
        var entradas = 'archives/addPresenca.php';
    </script>
    <script src="../public/js/funcionarios.js"></script>

    <script>
        document.querySelector("input[name=all]").onclick = function(e) {
            var marcar = e.target.checked;
            var lista = document.querySelectorAll("input");
            for (var i = 0; i < lista.length; i++) {
                lista[i].checked = marcar;
            }
        }

      


        $(document).ready(function() {


            // script para a lista de novos usuarios
            function TabelaFinal(){
                $.ajax({
                    url: 'archives/ListaPresencaFinalsemana.php',
                    method:"GET",
                }).done(function(data){
                    $(".Final").html(data)
                    // alert(data)
                })
            }
            setTimeout(TabelaFinal, 100);


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

            // adicionar a lista dos finais de semana
            $(document).on("click", ".adicionar", function(e) {
                e.preventDefault();
                var data = $("#DataFinal").val();
                // var data = $(this).attr("data-id");
                // alert(data)
                $.ajax({
                    url: 'archives/ListaFinalSemana.php',
                    method: "POST",
                    data: {
                        data: data,
                    }
                }).done(function(data) {
                    // $(".resp").html(data)
                    alert(data)
                    setTimeout(TabelaFinal, 100);
                })
            })
            $(document).on("submit",".todos",function(e){
                e.preventDefault();
                // alert("presenca")
                $.ajax({
                    url:  entradas,
                    method:"POST",
                    data: new FormData(this), 
                    contentType: false,
                    cache: false,
                    processData: false, 
                }).done(function(data){
                    $(".resp").html(data)
                })
            })


            $(document).on("submit",".FinaldeSemana",function(e){
                e.preventDefault();
                // alert("presenca")
                $.ajax({
                    url:  'archives/addPresencaFinalSemana.php',
                    method:"POST",
                    data: new FormData(this), 
                    contentType: false,
                    cache: false,
                    processData: false, 
                }).done(function(data){
                    
                    if(data == 'Efectuado Com sucesso'){
                        $(".resps").html("<p class='alert alert-success text-center mx-2'>"+ data+ "</p>")
                        setTimeout(function(){location.reload();}, 1000)
                        setTimeout(FinalSemana,100)
                    }else{
                        alert(data)
                    }
                })
            })

             function FinalSemana(){
                $.ajax({
                    url:  "archives/buttonPresenca.php",
                    method:"GET"
                     
                }).done(function(data){
                    $(".finalSemana").html(data)
                })
             }
             setTimeout(FinalSemana,100)
        })
    </script>
</body>

</html>