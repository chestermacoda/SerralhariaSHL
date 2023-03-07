<?php
include_once "../connect/config.php";
include_once "config/total.php";
include_once "config/notificacao.php";
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
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
</head>
<body>
    <div class="conteiner">
        <header>
            <?php
                    include_once "views/nav.php";
                ?>
            </header>
            <main>
                <?php
                    include_once "views/header.php";
                ?>
            <section>

                <h2>Adicionar Material</h2>
                <div id="menu">
                    <a href="Produtos.php" class="btn btn-primary">Voltar</i></a>
                </div>
                <div class="resp"></div>
                <form action="" id="addProduto">
                        
                        <div class="col">
                            <label for="" class="form-label">Nome do Material</label>
                            <input type="text" name="nome" class="form-control" id="" placeholder="Insira o nome do produto">
                        </div>
                        <div class="col">
                            <label for="">Tipo de Material</label>
                            <input type="text" name="tipo" class="form-control" id="" placeholder="Insira o nome do produto">
                        </div>
                        <div class="col">
                            <label for="">Medida do Material</label>
                            <input type="text" name="medida" class="form-control" id="" placeholder="Insira o nome do produto">
                        </div>
                        <div class="col">
                            <label for="">Cor do Material</label>
                            <input type="text" name="cor" class="form-control" id="" placeholder="Insira o nome do produto">
                        </div>
                        <div class="col">
                            <label for="">Quantidade do Material</label>
                            <input type="text" name="Quantidade" class="form-control" id="" placeholder="Insira o nome do produto">
                        </div>
                        <div class="col">
                            <label for="">Data de Entrada</label>
                            <input type="date" name="data" class="form-control" id="" placeholder="Insira o nome do produto">
                        </div>
                        <div class="col">
                            <input type="submit" name="add" value="registar" class="btn" id="" >
                        </div>
                </form>
            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/admin.js"></script>
    <script src="../public/js/produto.js"></script>
</body>
</html>