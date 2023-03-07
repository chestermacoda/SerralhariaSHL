<?php
include_once "../connect/config.php";
include_once "config/total.php";
include_once "config/notificacao.php";
$dados = $con->ferramentas();
$funcio = $con->funcionarios();
if(isset($_GET['id'])){
$id = $_GET['id'];
$re = $con->requisition($id);

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

                <h2>Requisição de Ferramenta</h2>
                <div id="menu">
                    <a href="requisita.php" class="btn btn-primary">Voltar</i></a>
                </div>
                <div class="resp"></div>
                <form action="" id="addProduto" class="saida  editar" >
                        <div class="col">
                            <label for="" class="form-label">Nome do Ferramenta</label>
                            <select name="nome" id="" required>
                                <?php if(isset($_GET['id'])){ ?>
                                    <option valaue="<?=$re['id']?>"><?=$re['ferramenta']; ?></option>
                                    
                                    <?php foreach($dados as $d){?>
                                    <option value="<?=$d['id']?>"><?=$d['nome']?></option>
                                    <?php } ?>

                                <?php }else{ ?>
                                    <option value="">Nome do Ferramenta</option>
                                    <?php foreach($dados as $d){?>
                                    <option value="<?=$d['id']?>"><?=$d['nome']?></option>
                                    <?php } }?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Nome do Funcionario</label>
                            <select name="funcionario" id="" required>
                               
                                <?php if(isset($_GET['id'])){ ?>
                                    
                                    <option value="<?=$re['id']?>"><?=$re['nome']?></option>
                                    <?php foreach($funcio as $f){?>
                                    <option value="<?=$f['id']?>"><?=$f['nome']?> <?=$f['apelido']?></option>
                                    <?php } 

                                 }else{ ?>
                                <option value="">Nome do Funcionario</option>
                                <?php foreach($funcio as $f){?>
                                <option value="<?=$f['id']?>"><?=$f['nome']?> <?=$f['apelido']?></option>
                                <?php } }?>

                            </select>
                        </div>
                        <div class="col">
                            <label for="">Quantidade da Ferramenta</label>
                            <input type="number" name="Quantidade" class="form-control" value="<?php if(isset($_GET['id'])){ echo $re['quantidade'];}else{ echo 1;} ?>" id="" placeholder="Insira o nome do produto">
                        </div>
                        
                        <div class="col">
                            <label for="">Procedimento</label>
                            <select name="status" id="" >
                                <option value="">Procedimento</option>
                                <option value="Saida">Saida</option>
                                <option value="uso interno">Uso Interno</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Data de Retorno</label>
                            <input type="date" name="dataRetorno" class="form-control" id="" placeholder="Insira o nome do produto" value="<?php if(isset($_GET['id'])){ echo $re['retornoData'];}else{ echo 1;} ?>" >
                            <input type="hidden" name="id" class="form-control" id="" placeholder="Insira o nome do produto" value="<?php if(isset($_GET['id'])){ echo $re['id'];}else{ echo 1;} ?>" >
                        </div>
                        <div class="col">
                            <label for="">Descricao</label>
                            <textarea name="descricao" id="" cols="30"  rows="10" placeholder="Descreva a ferramenta"  ><?php if(isset($_GET['id'])){ echo $re['descricao'];}  ?></textarea>
                        </div> 
                        <div class="col">
                        <?php if(isset($_GET['id'])){ ?>
                                <input type="submit" name="Actualizar" value="Actualizar" class="btn" id="" >
                            <?php }else{ ?>
                                <input type="submit" name="enviar" value="registar" class="btn" id="" >
                                <input type="hidden" name="dataEntrega"value="<?=date('y/m/d')?>" class="form-control" id="" placeholder="Insira o nome do produto">
                            <?php } ?>
                            
                        </div>    
                </form>
            </section>

        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/admin.js"></script>
    <script>var url = "archives/addRequisicoes.php"</script>
    </script>
    <?php if(isset($_GET['id'])){ ?> 
        <script>
        var editar = "archives/UpdateRequisition.php";
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