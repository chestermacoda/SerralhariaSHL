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
    <title>Gerir Entradas</title>
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
                        <h2 class="h2">Entrada Material</h2>
                        <div class="menu">
                            <a href="produtos.php" class="btn btn-primary">voltar</a>
                            <button class="btn btn-primary entradas"><i class="fa-solid fa-print"></i></button>
                        </div>
                        <div class="pesquisa row m-2">
                            <input type="text" name="buscar" id="buscar" class="form-control me-2 pesquisar" placeholder="pesquisar Produto">
                            <input type="date" name="buscar" id="buscar" class="form-control me-2 pesquisar" placeholder="pesquisar Produto">
                        </div>
                        <?php include_once "../print.php" ?>
                        <div class=" table-responsive text-nowrap">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="top">
                                    <td>ID</td>
                                    <td>Nome Produto</td>
                                    <td>Tipo</td>
                                    <td>Medida</td>
                                    <td>Qt Stocke</td>
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
    <script>var url = 'archives/entradas.php';</script>
    <script>
        $(document).ready(function(){
            
            $.ajax({
                url: url,
                method:"GET",
            }).done(function(data){
                $(".tab").html(data)
                // alert(data)
            })

            $('#buscar').keyup(function(e){
            e.preventDefault();
                // alert("bem vindo ao ajax")
                
                
            var valor = $(this).val().toLowerCase();

            $('.tab tr').filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1)
            })

            })

            $(document).on("change","#registo",function(e){
                e.preventDefault();
                var registo = $(this).val();
                // alert(registo)
                $.ajax({
                    url: url,
                    method:"POST",
                    data:{
                        registo :registo
                    }
                }).done(function(data){
                    $(".tab").html(data)
                    // alert(data)
                })
            })
            $(document).on("change","#buscar",function(e){
                e.preventDefault();
                var data = $(this).val();
                // alert(registo)
                $.ajax({
                    url: url,
                    method:"POST",
                    data:{
                        data :data
                    }
                }).done(function(data){
                    $(".tab").html(data)
                    // alert(data)
                })
            })
        })

        $(document).on("click",".entradas", function(){
            window.print();
        })
    </script>
     
    
</body>
</html>