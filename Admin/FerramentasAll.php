<?php
    include_once "config/total.php";
    $fe = $con->ferramentas()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas Ferramentas</title>
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="stylesheet" href="../public/css/tabelas.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/fontawesome-free-6.2.1-web/css/all.min.css">
</head>
<body>
    <div class="conteiner">
        <header class="bg-primary">
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
                    <a href="ferramentas.php"  class="btn btn-primary">voltar</i></a>                    
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
                <div class="table-responsive text-nowrap ">
                    <table class="table table-bordered table-hover table-striped text-center">
                        <tr class="top">
                            <td>ID</td>
                            <td>Nome Ferramenta</td>
                            <td>Quantidade</td>
                            <td>tipo</td>
                            <td>Ação</td>
                        </tr>
                        <tbody class="tab"></tbody>
                    </table>
                </div>
            </section>
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
        })
    </script>
     <script src="../public/js/modal.js"></script>
</body>
</html>