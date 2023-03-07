<?php
include_once "../connect/config.php";
include_once "config/total.php";
include_once "config/notificacao.php";
$dados = $con->material();
$funcio = $con->funcionarios();
if(isset($_GET['id'])){
    $id =$_GET['id'];
    $out = $con->outMaterial($id);
}
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
            require_once "views/nav.php";
        ?>
        </header>
        <main>
            <?php
                include_once "views/header.php";
            ?>
            <section>

                <h2>Saida de Material</h2>
                <div id="menu">
                    <a href="produtos.php" class="btn btn-primary">Voltar</i></a>
                </div>
                <div class="resp"></div>
                <form action="" id="addProduto" class="saida">
                        <div class="col">
                            <label for="" class="form-label">Nome do Material</label>
                            <select name="nome" id="">
                            <?php if($_GET['id']){ ?>
                                    <option value=""><?=$out['NomeMaterial']; ?></option>
                                <?php
                                foreach($dados as $d){?>
                                        <option value="<?=$d['id']?>"><?=$d['NomeMaterial']?> </option>
                                        <?php }
                                }else{?>
                                <option value="">Nome do Material</option>
                                <?php foreach($dados as $d){?>
                                <option value="<?=$d['id']?>"><?=$d['NomeMaterial']?> <?=$d['tipo']?></option>
                                <?php } } ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Nome do Funcionario</label>
                            <select name="funcionario" id="">
                                <?php if($_GET['id']){ ?>
                                    <option value=""><?=$out['nome']; ?></option>
                                <?php
                                foreach($funcio as $f){?>
                                        <option value="<?=$f['id']?>"><?=$f['nome']?> <?=$f['apelido']?></option>
                                        <?php }
                                }else{?>
                                <option value="">Nome do Funcionario</option>
                                <?php foreach($funcio as $f){?>
                                <option value="<?=$f['id']?>"><?=$f['nome']?> <?=$f['apelido']?></option>
                                <?php } }?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Quantidade do Material</label>
                            <input type="text" name="Quantidade" class="form-control" id="" placeholder="Insira o nome do produto" value="<?php if(isset($_GET['id'])){ echo $out['quantidade'];} ?>">
                        </div>
                        <div class="col">
                        <?php  if(isset($_GET['id'])){ ?>    
                            <input type="submit" name="enviar" value="Actualizar" class="btn" id="" >
                        <?php }else{ ?>
                            <input type="submit" name="enviar" value="registar" class="btn" id="" >
                            <input type="hidden" name="data"value="<?=date('y/m/d')?>" class="form-control" id="" placeholder="Insira o nome do produto">
                        <?php } ?>
                            
                        </div>    
                </form>
            </section>

        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/admin.js"></script>
    <script>var url = "archives/saida.php"</script>
    <script src="../public/js/saida.js"></script>
</body>
</html>