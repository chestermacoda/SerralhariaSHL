<?php
include_once "../connect/config.php";
include_once "config/notificacao.php";
$dados = $con->material();
$funcio = $con->funcionarios();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerir Produtos</title>
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="stylesheet" href="../public/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="../public/css/tabelas.css">
    <!-- <link rel="stylesheet" href="../public/css/bootstrap.min.css"> -->
</head>
<body>
    <div class="container">
        <header>
        <?php
            require_once "views/nav.php";
        ?>
        </header>
        <main>
            <div class="head">
                 <div class="menu">
                    <!-- <button class="hmburguer"><img src="../public/images/drop.png" alt=""></button> -->
                    <button class="hmburguer"><i class="fa-solid fa-bars icon"></i></button>
                </div>
                 <div class="user1">
                    <div class="user notification ">
                        <button class="us notif"><i class="fa-solid fa-comment not"></i><p>0</p></button>
                        <div class="descricao">
                        
                        </div>
                    </div>
                    <div class="user notification ">
                        <button class="us notif"><i class="fa-solid fa-bell not"></i><p>2</p></button>
                        <div class="descricao">
                            
                        </div>
                    </div>
                    <div class="user out">
                        <button class="name"><p>Langa</p><i class="fa-solid fa-angle-down"></i></button>
                        <ul>
                            <li><a href="#">Sair</a></li>
                            <li><a href="#">Perfil</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <section>

                <h2>Entrada de Material</h2>
                <div id="menu">
                    <a href="Produtos.html">Voltar</i></a>
                </div>
                <div class="resp"></div>
                <form action="" id="addProduto" class="saida">
                        <div class="col">
                            <label for="" class="form-label">Nome do Material</label>
                            <select name="nome" id="">
                                <option value="">Nome do Material</option>
                                <?php foreach($dados as $d){?>
                                <option value="<?=$d['id']?>"><?=$d['NomeMaterial']?> <?=$d['tipo']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Quantidade do Material</label>
                            <input type="text" name="Quantidade" class="form-control" id="" placeholder="Insira o nome do produto">
                        </div>
                        <div class="col">
                            <input type="submit" name="enviar" value="registar" class="btn" id="" >
                            <input type="hidden" name="data"value="<?=date('d/m/y')?>" class="form-control" id="" placeholder="Insira o nome do produto">
                        </div>    
                </form>
            </section>

        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/admin.js"></script>
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
                    $('.resp').html(data);
                });
            })


            $('#modal-form').on('submit',function(e){
            // $("#agendar").click(function(e){
                e.preventDefault();
            var load = "<p class='text-center'><img src='public/images/load.gif' style='width:40px; height:30px'></p>";
            $('#resp').html(load);   
            $.ajax({ 
                    url: 'public/ajax/requisicao.php',
                    method: 'POST',
                    data: new FormData(this), 
                    contentType: false,
                    cache: false,
                    processData: false, 
                }).done(function(data){
                    $('#resp').html(data);
                    //alert(data)
                });
        }); 
        });
    </script>
</body>
</html>