<?php
include_once "../connect/config.php";
include_once "config/total.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dados = $se->FuncioInfo($id);
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
                include_once "views/nav.php";
            ?>
        </header>
        <main>
                <?php
                    include_once "views/header.php";
                ?>
            <section>
                <h2>Dados do <?=$dados['nome']?> <?=$dados['apelido']?></h2>
                <div id="menu">
                    <a href="funcionarios.php" title="Adicionar Novo Produto" class="btn btn-primary">voltar</i></a>
                </div>
                
                <?php
                    include_once "views/modalEntrada.php";
                ?>
                
                <div  >
                    <div class="resp"></div>
                    <table class="table table-bordered table-hover">
                        
                        <tbody class="text-center">
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">ID</td><td><?=$dados['id']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Nome Produto</td><td><?=$dados['nome']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Apelido</td><td><?=$dados['apelido']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">E-mail</td><td><?=$dados['email']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Area de Formação</td><td><?=$dados['Area']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Data de Nascimento</td><td><?=$dados['dataNascimento']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Bilhete de Identidade</td><td><?=$dados['bI']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Bairro</td><td><?=$dados['Bairro']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Nacionalidade</td><td><?=$dados['Nacionalidade']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Data de Registo</td><td><?=$dados['registo']?></td>
                            </tr>
                            <tr>
                                <td class="text-white" style="background-color: rgb(0, 140, 255);">Action</td>
                                <td><a href="EditarMaterial.php?id=<?=$dados['id']?>"  class="btn btn-outline-primary"><i class="fa-solid fa-edit"></i></a>
                                <?php if($dados['status'] == "on"){ ?>
                                    <a href="#" title="Desabilitar o Funcionario" class="btn btn-outline-danger disable"  id="off" data-value="<?=$dados['id']?>"><i class="fa-solid fa-thumbs-down"></i></a></td>
                                <?php }else{ ?>
                                    <a href="#" title="Habilitar o Funcionario" class="btn btn-outline-danger disable" id="on" data-value="<?=$dados['id']?>"><i class="fa-solid fa-thumbs-up"></i></a></td>
                                <?php } ?>
                            </tr>
                        </tbody>                        
                    </table>
                </div>

            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/bootstrap.bundle.js"></script>
    <script src="../public/js/admin.js"></script>
    <script src="../public/js/material.js"></script>
    <script>
        $(document).ready(function(){
            $(".disable").click(function(e){
                e.preventDefault();
                var resposta = confirm("Tem a certeza que Deseja Habilitar/Desabilitar o Funcionario")
                if(resposta == true){
                    var status = $(this).attr("id");
                    var id = $(this).attr("data-value");
                    // alert(id)
                    $.ajax({
                        url: "archives/HabilitarFuncionario.php",
                        method:"POST",
                        data:{
                            status :status,
                            id:id
                        }
                    }).done(function(data){
                        $(".resp").html(data)
                        // alert(data)
                    })
                }
            })
        })

    </script>

</body>
</html>