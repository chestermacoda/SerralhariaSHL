<?php
include_once "../connect/config.php";
include_once "config/total.php";
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

                <h2>Mudar Senha </h2>
                <div id="menu">
                    <a href="perfil.php" class="btn btn-primary">Voltar</i></a>
                </div>
                <div class="col resp"></div>
                <form action="" id="addProduto" class="senhaNova">
                        
                        <div class="col">
                            <label for="">Senha Antiga</label>
                            <input type="text" name="SenhaAntiga" id="" class="form-control" value="" placeholder="Insira a senha antiga">
                            <input type="hidden" name="id" id="" class="form-control" value="<?=$user['id']?>">
                        </div>
                        <div class="col">
                            <label for="">Nova Senha</label>
                            <input type="password" name="NovaSenha" class="form-control" value="" id="" placeholder="Insira a nova senha">
                        </div>
                        <div class="col">
                            <label for="">Confirmar Senha</label>
                            <input type="password" name="Csenha" class="form-control" value="" id="" placeholder="Confirme a nova senha">
                        </div>
                        <div class="col">
                            <input type="submit" name="enviar" value="Actualizar" class="btn" id="" >
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
        $(document).on('submit','.senhaNova',function(e){
            e.preventDefault();
            // alert("bem vindo ao jquery");
            var load = "<p class='text-center'><img src='../public/images/load.gif' style='width:40px; height:30px'></p>";
            $('#resp').html(load);   
            $.ajax({
                url: senha,
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