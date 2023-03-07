<?php
include_once "../connect/config.php";
include_once "config/total.php";
include_once "config/notificacao.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dados = $con->materialInfo($id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar <?=$dados['NomeMaterial']?></title>
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="stylesheet" href="../public/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="../public/css/tabelas.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
</head>
<body>
    <div class="conteiner">
        <header>
        <?php
            require_once "views/nav.php";
        ?>
        </header>
        <main>
            <?php
                include_once "views/header.php";
            ?>
            <section>

                <h2>Dados do <?=$dados['NomeMaterial']?></h2>
                <div id="menu">
                    <a href="produtos.php" class="btn btn-primary">Voltar</i></a>
                </div>
                <div class="resp"></div>
                <form action="" id="addProduto" class="editar" class="saida">
                         <div class="col">
                            <label for="">Nome do Material</label>
                            <input type="text" name="nome" id="" class="form-control" value="<?=$dados['NomeMaterial']?>">
                         </div>
                        <div class="col">
                            <label for="">Tipo</label>
                            <input type="text" name="tipo" class="form-control" value="<?=$dados['tipo']?>" id="" placeholder="Insira o nome do produto">
                        </div>
                        <div class="col">
                            <label for="">Medida</label>
                            <input type="text" name="medida" class="form-control" value="<?=$dados['medida']?>" id="" placeholder="Insira o nome do produto">
                        </div>
                        <div class="col">
                            <label for="">Quantidade</label>
                            <input type="text"  name="Quantidade" class="form-control" value="<?=$dados['quantidade']?>" id="" placeholder="Insira o nome do produto">
                        </div>
                        <div class="col">
                            <label for="">Cor</label>
                            <input type="text" name="cor" class="form-control" value="<?=$dados['cor']?>" id="" placeholder="Insira o nome do produto">
                        </div>
                        <div class="col">
                            <label for="">Data de Entrada</label>
                            <input type="text" disabled name="nivel" class="form-control" id="" value="<?=$dados['registo']?>" placeholder="Insira o nome do produto">
                            <input type="hidden"  name="data" class="form-control" id="" value="<?=$dados['data']?>" placeholder="Insira o nome do produto">
                            <input type="hidden"  name="id" class="form-control" id="" value="<?=$dados['id']?>" placeholder="Insira o nome do produto">
                        </div>
                        <div class="col">
                            <input type="submit" name="update" value="Actualizar" class="btn" id="" >
                        </div>    
                </form>
            </section>

        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/admin.js"></script>
    <script>var edit = "archives/updateMaterial.php"
        $(document).ready(function(){
            $(document).on('submit','.editar',function(e){
                e.preventDefault();
                alert("bem vindo ao jquery");
                var load = "<p class='text-center'><img src='../public/images/load.gif' style='width:40px; height:30px'></p>";
                $('#resp').html(load);   
                $.ajax({
                    url: edit,
                    method: 'POST',
                    data: new FormData(this), 
                    contentType: false,
                    cache: false,
                    processData: false, 
                }).done(function(data){
                    $('.resp').html(data);
                });
            })
        })
    </script>
</body>
</html>