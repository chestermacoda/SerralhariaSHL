<?php
include_once "../connect/config.php";
include_once "config/total.php";
//$dados = $con->listarSaidas();
$material = $con->material();
$funcio = $con->funcionarios();

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerir Saida de Material</title>
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="stylesheet" href="../public/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="../public/css/tabelas.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
</head>
<body>
    <div class="conteiner">
        <header class="bg-primary">
        <?php
            require_once "views/nav.php";
        ?>
        </header>
        <main>
             <?php
                include_once "views/header.php";
             ?>
            <section>

                <h2>Saidas Diarias</h2>
                <div id="menu">
                    <a href="produtos.php" class="btn btn-primary">Voltar</i></a>
                    <button class="btn btn-primary entradas"><i class="fa-solid fa-print"></i></button>
                </div>
                <div class="pesquisa row m-2">
                    <input type="text" name="busca" id="busca" placeholder="pesquisar Produto" class="form-control me-2">
                    <input type="date" name="buscar" id="buscar" value="" class="form-control"> 
                </div>
                <?php include_once "../print.php" ?>
                <div class=" ">
                    <table class="table table-bordered table-hover text-center">
                        <tr class="top">
                            <td>ID</td>
                            <td>Nome</td>
                            <td>Material</td>
                            <td>Quantidade</td>
                            <td>Data</td>
                            
                        </tr>
                        <tbody class="tab"></tbody>
                    </table>
                </div>                
            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/admin.js"></script>
    <script src="../public/js/bootstrap.bundle.js"></script>
    <script>
        $(document).ready(function(){
            $(document).on('submit','#modal-form',function(e){
                e.preventDefault();
                //alert("bem vindo ao jquery");
                var load = "<p class='text-center'><img src='../public/images/load.gif' style='width:40px; height:30px'></p>";
                $('#resp').html(load);   
                $.ajax({
                    url: 'archives/saida.php',
                    method: 'POST',
                    data: new FormData(this), 
                    contentType: false,
                    cache: false,
                    processData: false, 
                }).done(function(data){
                    $('#resp').html(data);
                });
            })
            
                $.ajax({
                    url: "archives/Tabelasaidas.php",
                    method:"GET",
                }).done(function(data){
                    $(".tab").html(data)
                    // alert(data)
                })
           
            

        $('#buscar').change(function(e){
            e.preventDefault();
            var registo = $(this).val();
            //  alert(registo)
            $.ajax({
                url: "archives/Tabelasaidas.php",
                method:"POST",
                data:{
                    registo: registo
                }
            }).done(function(data){
                $(".tab").html(data)
            })
        });


        $('#busca').keyup(function(e){
            e.preventDefault();
                // alert("bem vindo ao ajax")
            var valor = $(this).val().toLowerCase();

            $('.tab tr').filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1)
            })

            })

        $(document).on("click",".entradas", function(){
            window.print();
        })
        $(document).on("click",".text", function(){
            
            var data = $("#buscar").val();
            if(data == ''){
                $("input #data").html("required")
            }else{
                window.print();
            }
        })
    });
    </script>
</body>
</html>