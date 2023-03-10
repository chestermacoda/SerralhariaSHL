<?php
include_once "../connect/config.php";
include_once "config/total.php"; 
if(isset($_GET['id'])){
    $id = $_GET['id'];
  
    $dados = $se->FuncioPre($id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Dados</title>
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
                <?php
                if(isset($_GET['id'])){ ?>
                    <h2>Actualizar Dados do Funcionarios</h2>
                <?php }else{ ?>
                    <h2>Registar Novo Funcionarios</h2>
                <?php } ?>
                <div id="menu">
                    <a href="presencas.php" class="btn btn-primary">Voltar</i></a>
                </div>
                <div class="resp"></div> 
                <form action=""  class="update"  id="addProduto">
                        <div class="col">
                            <label for="">Entrada</label>
                            <input type="time" name="Entrada" class="form-control" id="" value="<?php if(isset($_GET['id'])){ echo $dados['Entrada']; } ?>" placeholder="Insira o Apelido do funcionario">
                            <input type="hidden" name="id" class="form-control" id="" value="<?php if(isset($_GET['id'])){ echo $dados['id']; } ?>" >
                        </div>
                                            
                        <div class="col">
                            <input type="submit" name="add" value="Actualizar" class="btn" id="" >
                        </div>
                </form>
            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/admin.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on("submit",".update",function(e){
                e.preventDefault();
                // alert("presenca")
                $.ajax({
                    url:  'archives/UpdatePresenca.php',
                    method:"POST",
                    data: new FormData(this), 
                    contentType: false,
                    cache: false,
                    processData: false, 
                }).done(function(data){
                    $(".resp").html(data)
                })
            })
        })
    </script>
</body>
</html>