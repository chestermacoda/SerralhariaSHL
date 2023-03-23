<?php
include_once "config/total.php";
$dados1 = $se->SaidaAutomatica();
$dados2 = $se->StatusFaltou();
$dados3 = $se->StatusPresenca();
$datsss = $se->FormatarDiaSemana();
$datsss = $se->SaidaAutomaticaFinalSemana();
$datsss = $se->Domingos();
$datsss = $se->CustodiaAuxilio();


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
                    <?php
                        echo $saida;
                    
                    ?>
                </div>
                    <article class="detalhes">
                        <!-- <a href="produtos.html">
                            <div class="top">
                                <div class="img">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                <div class="desc">
                                    <h4 class="title">Total Funcionarios</h4>
                                    <p><?=$totalM ?></p>
                                </div>
                            </div> 
                            <div class="bottom">
                                <p>Total de Material no Sistema</p>
                            </div>
                        </a>
                          -->
                          
                        <a href="Material.php">
                            <div class="top">
                                <div class="img">
                                    <i class="fa-solid fa-wrench"></i>
                                </div>
                                <div class="desc">
                                    <h4 class="title">Estoque Baixo</h4>
                                    <p><?=$not?></p>
                                </div>
                            </div> 
                            <div class="bottom">
                                <p>Notificação Estoque Acabando</p>
                            </div>
                        </a>
                        <a href="funcionarios.php">
                            <div class="top">
                                <div class="img">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                <div class="desc">
                                    <h4 class="title">Total Funcionarios</h4>
                                    <p><?=$AllFunc?></p>
                                </div>
                            </div> 
                            <div class="bottom">
                                <p>Total Funcionarios Activos</p>
                            </div>
                        </a>
                        <a href="presencas.php">
                            <div class="top">
                                <div class="img">
                                    <i class="fa-solid fa-book"></i>
                                </div>
                                <div class="desc">
                                    <h4 class="title">Funcionarios Presentes</h4>
                                    <p><?=$Presenca?></p>
                                </div>
                            </div> 
                            <div class="bottom">
                                <p>Total Presenças Diarias</p>
                            </div>
                        </a>
                        <a href="presencas.php">
                            <div class="top">
                                <div class="img">
                                    <i class="fa-solid fa-book-bookmark"></i>
                                </div>
                                <div class="desc">
                                    <h4 class="title">Funcionarios Ausentes</h4>
                                    <p><?=$Ausencia?></p>
                                </div>
                            </div> 
                            <div class="bottom">
                                <p>Total Ausentes Diarias</p>
                            </div>
                        </a>
                        <a href="Estagiarios.php">
                            <div class="top">
                                <div class="img">
                                    <i class="fa-solid fa-book"></i>
                                </div>
                                <div class="desc">
                                    <h4 class="title">Total Estagiarios</h4>
                                    <p><?=$Estagiarios?></p>
                                </div>
                            </div> 
                            <div class="bottom">
                                <p>Total Presenças Diarias</p>
                            </div>
                        </a>
                        <!-- <?php echo date('D'); ?> -->
                </article>
            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/admin.js"></script>
</body>
</html>