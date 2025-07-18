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
                <h2 class="h2">Folha de Salario Global</h2>
                <div class="menu">
                    <a href="addFuncionario.php" class="btn btn-primary">Adicionar Funcionarios</a>
                    <a href="PrintFolhaGlobal.php?data=<?= date('Y-m-d')?>" class="btn btn-primary"><i class="fa-solid fa-print"></i></a>
                    <!-- <button class="btn btn-primary bts"   type="button"  data-bs-toggle="modal" data-bs-target="#Presenca"><i class="fa-solid fa-print"></i></button> -->
                </div>
                <?php include_once "../print.php" ?>
                <div class="pesquisa row m-2 d-flex">
                    <!-- <select name="registo" id="registo" class="form-control me-2">
                        <option value="5">5 Registos</option>
                        <option value="15">15 Registos</option>
                        <option value="25">25 Registos</option>
                        <option value="255">Todos Registos</option>
                    </select> 
                    <input type="text" name="buscar" id="buscar" class="form-control me-2 pesquisar" placeholder="pesquisar Produto">-->
                    <input type="date" name="" id="busca1" class="form-control me-2 pesquisar" placeholder="pesquisar Produto">
                    
                    <input type="date" name="" id="busca2" class="form-control me-2 pesquisar" placeholder="pesquisar Produto">
                    <button class="btn btn-primary col-1 busca"><i class="fa-solid fa-search"></i></button>

                </div>
                <div class=" table-responsive text-nowrap">
                    <table class="table table-bordered table-striped table-hover text-center">
                        <thead class="top">
                            <td>ID</td>
                            <td>Nome Completo</td>
                            <td>Salario</td>
                            <td>Faltas</td>
                            <td>Atraso</td>
                            <td>Horas Extras</td>
                            <td>INSS</td>
                            <td>Bonus</td>
                            <td>Salario</td>
                        </thead>
                        <tbody class="tab">
                            
                        </tbody>                        
                    </table>
                </div>

                <?php

                    // $cmd = $pdo->prepare("SELECT  f.nome,f.apelido,f.Salario,f.id, p.id, p.data,p.Entrada,p.Saida,p.HorasExtras,COUNT(p.Status) as Falta FROM  presenca p INNER JOIN funcionarios f ON f.id = p.id_funcionario  where p.id=73 GROUP BY id_funcionario");
                    // $cmd->execute();
                    // $dados = $cmd->fetch();
                    // echo "<pre>";
                    // var_dump($dados);
                    // echo "</pre>";
                    
                    // $extras = explode(":",$dados['HorasExtras']);
                    // $horasnomal = 17;
                    // echo "<br>";
                    // echo $extras[0] - $horasnomal;
                    
                ?>
            </section>
        </main>
    </div> 
    <?php include("views/ModalSalario.php"); ?>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/bootstrap.bundle.js"></script>
    <script src="../public/js/admin.js"></script>
    <script>var url = "archives/TabelaSalarioMensal.php";</script>
    <script src="../public/js/funcionarios.js"></script>

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
                    url: "archives/TabelaSalarioMensal.php",
                    method: "POST",
                    data:{
                        data1 : data1,
                        data2 : data2
                    }
                }).done(function(data){
                    $(".tab").html(data)
                })
            })
           
            // $.ajax({
            //         url: "archives/ListaPresencas.php",
            //         method: "GET"
            //     }).done(function(data){
            //         $(".tab").html(data)
            // })



            // $(document).on("click",".bts",function(e){
            //     e.preventDefault();
            //     //  alert("bem vindo")
                
            //     $.ajax({
            //         url: "PrintFolhaGlobal.php",
            //         method: "POST",
            //     }).done(function(data){
            //         $(".valor").html(data)
            //     })
            // })
           
        })
    </script>
</body>
</html>