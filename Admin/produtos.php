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
    <title>Gerir Material</title>
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
                <h2 class="h2">Gerir Material</h2>
                <div class="detalhe justify-content-center">
                    <a href="MaterialAll.php" class="btn shadow-none my-4 "> 
                        <div class="card shadow border-0 ">
                            <div class="card-header text-center py-3 h5 bg-primary text-white">
                                Total Material
                            </div>
                            <div class="card-body text-center h1">
                                <?=$totalM?>
                            </div>
                            <div class="card-footer text-center p ">
                                Total de Material 
                            </div>
                        </div>
                    </a>
                    <a href="StockDown.php" class="btn shadow-none my-4"> 
                        <div class="card shadow border-0">
                            <div class="card-header text-center py-3 h5 bg-primary text-white">
                                Estoque Baixo
                            </div>
                            <div class="card-body text-center h1">
                            <?=$not?>
                            </div>
                            <div class="card-footer text-center p">
                                Material Estoque Baixo
                            </div>
                        </div>
                    </a>
                    <a href="entradas.php" class="btn shadow-none my-4"> 
                        <div class="card shadow border-0">
                            <div class="card-header text-center py-3 h5 bg-primary text-white">
                                Entradas Diarias 
                            </div>
                            <div class="card-body text-center h1 ">
                                <?=$entradas?>
                            </div>
                            <div class="card-footer text-center p">
                                Total Entradas Diarias
                            </div>
                        </div>
                    </a>
                    <a href="saidas.php" class="btn shadow-none my-4"> 
                        <div class="card shadow border-0">
                            <div class="card-header text-center py-3 h5 bg-primary text-white">
                                Saidas Diarias
                            </div>
                            <div class="card-body text-center h1">
                                <?=count($said);?>
                            </div>
                            <div class="card-footer text-center p">
                                Total de saidas Diarias
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                    include_once "views/modalEntrada.php";
                ?> 
            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/bootstrap.bundle.js"></script>
    <script src="../public/js/admin.js"></script>
    
    
</body>
</html>