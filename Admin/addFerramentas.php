<?php
    include_once "config/total.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $dados = $con->UpdateTools($id);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrador</title>
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="stylesheet" href="../public/css/tabelas.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/fontawesome-free-6.2.1-web/css/all.min.css">
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
                <?php if(isset($_GET['id'])){ 
                    ?><h2>Dados da <?php echo $dados['nome']; ?> </h2><?php }else{ ?> <h2>Adicionar Ferramenta</h2> <?php } ?>

                <div id="menu">
                    <a href="ferramentasAll.php" class="btn btn-primary">Voltar</i></a>
                </div>
                <div class="resp"></div>
                <form action="" id="addProduto" <?php if(isset($_GET['id'])){ ?>class="editar" <?php }else{ ?> id="addProduto" <?php } ?> >
                        <div class="col">
                            <label for="" class="form-label">Nome da Ferramenta</label>
                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Insira o nome do produto" value="<?php if(isset($_GET['id'])){ echo $dados['nome']; } ?>">
                            <input type="hidden" name="id" class="form-control" id="nome" placeholder="Insira o nome do produto" value="<?php if(isset($_GET['id'])){ echo $dados['id']; } ?>">
                        </div>
                        <div class="col">
                            <label for="">Quantidade</label>
                            <input type="text" name="Quantidade" class="form-control" id="Quantidade" placeholder="Insira a quantidade do produto" value="<?php if(isset($_GET['id'])){ echo $dados['quantidade']; } ?>">
                        </div>
                        <div class="col">
                            <label for="">Tipo</label>
                            <input type="text" name="tipo" class="form-control" id="tipo" placeholder="Insira o tipo de Produto" value="<?php if(isset($_GET['id'])){ echo $dados['tipo']; } ?>">
                        </div>
                        <div class="col">
                            <label for="">Cor</label>
                            <input type="text" name="cor" class="form-control" id="cor" placeholder="Insira a cor da Ferramenta" value="<?php if(isset($_GET['id'])){ echo $dados['cor']; } ?>">
                        </div>
                        <div class="col">
                            <label for="">Descricao</label>
                            <textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Descreva a ferramenta"><?php if(isset($_GET['id'])){ echo $dados['descricao']; } ?>></textarea>
                        </div>
                        <div class="col">
                            <?php if(isset($_GET['id'])){ ?>
                                <input type="submit" name="Actualizar" value="Actualizar" class="btn" id="" >
                            <?php }else{ ?>
                                <input type="submit" name="enviar" value="registar" class="btn" id="" >
                            <?php } ?>
                        </div>
                </form>
            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/admin.js"></script>
    <script>
        var url = "archives/addferramenta.php";
    </script>
    <?php if(isset($_GET['id'])){ ?> 
        <script>
        var editar = "archives/updateferramenta.php";
        $(document).ready(function(){
            $(document).on('submit','.editar',function(e){
                e.preventDefault();
                // alert("bem vindo ao jquery");
                var load = "<p class='text-center'><img src='../public/images/load.gif' style='width:40px; height:30px'></p>";
                $('#resp').html(load);   
                $.ajax({
                    url: editar,
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
    <?php }else{ ?>   
        <script src="../public/js/saida.js"></script>
    <?php } ?>
</body>
</html>