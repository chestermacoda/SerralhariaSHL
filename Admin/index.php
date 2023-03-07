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
    <link rel="stylesheet" href="../public/fontawesome-free-6.2.1-web/css/all.min.css">
</head>
<body>
    <div class="container">
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
                <div class="welcome">
                    <p>Data: <?=date('d')." de ". date('M') . " de ". date('Y') ?></p>
                    <h2>Bem vindo (a) <?=$user['nome']?></h2>
                </div>
                    <article class="detalhes">
                        <a href="produtos.php">
                            <div class="top">
                                <div class="img">
                                    <i class="fa-solid fa-toolbox"></i>
                                </div>
                                <div class="desc">
                                    <h4 class="title">Total Material</h4>
                                    <p><?=$totalM ?></p>
                                </div>
                            </div> 
                            <div class="bottom">
                                <p>Total de Material no Sistema</p>
                            </div>
                        </a>
                        <a href="Funcionarios.php">
                            <div class="top">
                                <div class="img">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                <div class="desc">
                                    <h4 class="title">Total Funcionarios</h4>
                                    <p><?=$totalF?></p>
                                </div>
                            </div> 
                            <div class="bottom">
                                <p>Todos Funcionarios Activos</p>
                            </div>
                        </a>
                        <a href="ferramentas.php">
                            <div class="top">
                                <div class="img">
                                    <i class="fa-solid fa-tools"></i>
                                </div>
                                <div class="desc">
                                    <h4 class="title">Total Ferramentas</h4>
                                    <p><?=$totalF?></p>
                                </div>
                            </div> 
                            <div class="bottom">
                                <p>Total Ferramentas no Sistema</p>
                            </div>
                        </a>
                        
                        <a href="StockDown.php">
                            <div class="top">
                                <div class="img">
                                    <i class="fa-regular fa-bell"></i>
                                </div>
                                <div class="desc">
                                    <h4 class="title">Estoque Material Baixo</h4>
                                    <p><?=$not ?></p>
                                </div>
                            </div> 
                            <div class="bottom">
                                <p>Notificações  Stocke Acabando</p>
                            </div>
                        </a>
                        <a href="saidas.php">
                            <div class="top">
                                <div class="img">
                                    <i class="fa-solid fa-wrench"></i>
                                </div>
                                <div class="desc">
                                    <h4 class="title">Requisições Material</h4>
                                    <p><?=$totalR?></p>
                                </div>
                            </div> 
                            <div class="bottom">
                                <p>Total Requisições Diarias</p>
                            </div>
                        </a>
                        <a href="FerramentaFalta.php">
                            <div class="top">
                                <div class="img">
                                    <i class="fa-solid fa-bell"></i>
                                </div>
                                <div class="desc">
                                    <h4 class="title">Notificações Ferramentas</h4>
                                    <p><?=$tfalta?></p>
                                </div>
                            </div> 
                            <div class="bottom">
                                <p>Notificações Ferramenta Falta</p>
                            </div>
                        </a>
                </article>
            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/admin.js"></script>
</body>
</html>