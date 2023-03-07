<?php
include_once "../connect/config.php";
include_once "config/total.php";
include_once "config/notificacao.php";
$dados = $con->ferramentas();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Administrador</title>
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

                <h2>Dados do Administrador</h2>
                <div id="menu">
                    <a href="index.php" class="btn btn-primary">Voltar</i></a>
                </div>
                <div class="resp"></div>
                <form action="" id="addProduto" class="saida">
                         <div class="col">
                            <label for="">Nome</label>
                            <input type="hidden" name="id" id="" class="form-control" value="<?=$user['id']?>">
                            <input type="text" name="nome" id="" class="form-control" value="<?=$user['nome']?>">
                         </div>
                        <div class="col">
                            <label for="">Apelido</label>
                            <input type="text" name="apelido" class="form-control" value="<?=$user['apelido']?>" id="" placeholder="Insira o nome do produto">
                        </div>
                        <div class="col">
                            <label for="">E-mail</label>
                            <input type="email" name="email" class="form-control" value="<?=$user['email']?>" id="" placeholder="Insira o nome do produto">
                        </div>
                        
                        <div class="col">
                            <label for="">Nivel de Acesso</label>
                            <input type="text" disabled name="nivel" class="form-control" id="" value="<?=$user['nivel']?>" placeholder="Insira o nome do produto">
                        </div>
                        <div class="col">
                            <input type="submit" name="enviar" value="Actualizar" class="btn" id="" >
                        </div>    
                        <div class="col text-center">
                            <a href="NovaSenha.php" class="btn text-decoration-underline">Mudar Senha</a>
                        </div>
                </form>
            </section>

        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/admin.js"></script>

    <script>
        $(document).ready(function(){
            var senha = "archives/UpdateSenha.php"
            $(document).on('submit','#addProduto',function(e){
                e.preventDefault();
                // alert("bem vindo ao jquery");
                var load = "<p class='text-center'><img src='../public/images/load.gif' style='width:40px; height:30px'></p>";
                $('#resp').html(load);   
                $.ajax({
                    url: "archives/UpdatePerfil.php",
                    method: 'POST',
                    data: new FormData(this), 
                    contentType: false,
                    cache: false,
                    processData: false, 
                }).done(function(data){
                    $('.resp').html(data);
                });
            })
        
        });
    </script>
  
     
</body>
</html>