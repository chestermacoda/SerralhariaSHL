<?php
    include_once "config/total.php";
    include_once "config/notificacao.php";
    $fe = $con->ferramentas()
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
        <header>
            <?php
                include_once "views/nav.php"
            ?>
        </header>
        <main>
             <?php
                include_once "views/header.php"
             ?>
            <section> 
                <h2>Ferramentas</h2>
                <div id="menu">
                    <a href="addFerramentas.php" title="Adicionar Novo Produto" class="btn btn-primary">Adicionar Nova Ferramenta</i></a>
                    <button type="button"  data-bs-toggle="modal" data-bs-target="#janelamodal" class="btn btn-primary">Entrada Ferramenta</button>
                    <a href="RequisitarTools.php" title="Adicionar Novo Produto" class="btn btn-primary">Requisitar Ferramenta</i></a>
                    <a href="#"  class="btn btn-primary"><i class="fa-solid fa-print"></i></a>
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
                    <table class="table table-bordered table-hover table-striped text-center">
                        <tr class="top">
                            <td>ID</td>
                            <td>Nome Ferramenta</td>
                            <td>Quantidade</td>
                            <td>tipo</td>
                            <td colspan="2">Action</td>
                        </tr>
                        <tbody class="tab">

                        </tbody>
                    </table>
                </div>

            </section>
            <?php
                include_once "views/modalFerrament.php";
            ?>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/bootstrap.bundle.js"></script>
    <script src="../public/js/admin.js"></script>
    <script>
    var url = "archives/entradatools.php";
    var table = "archives/TabelaTools.php";
    var registo = "archives/TabelaTools.php";
    $(document).ready(function(){
            $('#buscar').keyup(function(e){
            e.preventDefault();
                // alert("bem vindo ao ajax")
            var valor = $(this).val().toLowerCase();

            $('.tab tr').filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1)
            })

            })

            
            $(document).on("click",".delet",function(e){
                e.preventDefault();
                var response = confirm("Tem a certeza que Deseja Efectuar Esta Ação?");
                var id = $(this).attr("id")
                if(response == true){
                    // alert("bem vindo ao confirm")
                    $.ajax({
                        url: "archives/DeletFerr.php",
                        method:"POST",
                        data:{
                            id: id
                        }
                    }).done(function(data){
                        $(".resp").html(data)
                        
                    }) 
                }
            })

             
        })
    </script>
     <script src="../public/js/modal.js"></script>
</body>
</html>