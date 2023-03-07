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
    <title>Gerir Ferramentas</title>
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
                <h2 class="h2">Gerir Ferramentas</h2>
                <div class="detalhe">
                    <a href="ferramentasAll.php" class="btn shadow-none"> 
                        <div class="card shadow border-0">
                            <div class="card-header text-center py-3 h5 bg-primary text-white">
                                Total Ferramentas
                            </div>
                            <div class="card-body text-center h1">
                                <?=$totalF?>
                            </div>
                            <div class="card-footer text-center p">
                                Toda Ferramenta  
                            </div>
                        </div>
                    </a>
                    <a href="requisita.php" class="btn shadow-none"> 
                        <div class="card shadow border-0">
                            <div class="card-header text-center py-3 h5 bg-primary text-white">
                                Requisições Diarias
                            </div>
                            <div class="card-body text-center h1">
                            <?=$totalR ?>
                            </div>
                            <div class="card-footer text-center p">
                                Ferramenta Requis.. Hoje
                            </div>
                        </div>
                    </a>
                    <a href="FerramentaFalta.php" class="btn shadow-none"> 
                        <div class="card shadow border-0">
                            <div class="card-header text-center py-3 h5 bg-primary text-white">
                                Ferramenta Falta 
                            </div>
                            <div class="card-body text-center h1 ">
                                <?=$tfalta?>
                            </div>
                            <div class="card-footer text-center p">
                                Ferramenta Falta
                            </div>
                        </div>
                    </a>
                     
                </div>
            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/bootstrap.bundle.js"></script>
    <script src="../public/js/admin.js"></script>
</body>
</html>