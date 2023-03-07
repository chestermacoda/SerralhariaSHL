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
                    <a href="funcionarios.php" class="btn btn-primary">Voltar</i></a>
                </div>
                <div class="resp"></div> 
                <form action=""  class="update"  id="addProduto">
                        
                        <div class="col">
                            <label for="" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" id="" value="<?php if(isset($_GET['id'])){ echo $dados['nome']; } ?>" placeholder="Insira o nome do funcionario">
                            <input type="hidden" name="id" class="form-control" id="" value="<?php if(isset($_GET['id'])){ echo $dados['id']; } ?>" placeholder="Insira o nome do funcionario">
                        </div>
                        <div class="col">
                            <label for="">Apelido</label>
                            <input type="text" name="apelido" class="form-control" id="" value="<?php if(isset($_GET['id'])){ echo $dados['apelido']; } ?>" placeholder="Insira o Apelido do funcionario">
                        </div>
                        <div class="col">
                            <label for="">E-mail</label>
                            <input type="email" name="email" class="form-control" id="" value="<?php if(isset($_GET['id'])){ echo $dados['email']; } ?>" placeholder="Insira o E-maill do funcionario">
                        </div>
                        <div class="col">
                            <label for="">Area de Formação</label>
                            <input type="text" name="formacao" class="form-control" id="" value="<?php if(isset($_GET['id'])){ echo $dados['Area']; } ?>" placeholder="Insira a area de Formacao do funcionario">
                        </div>
                        <div class="col">
                            <label for="">Data de Nascimento</label>
                            <input type="date" name="datanascimento" class="form-control" id="" value="<?php if(isset($_GET['id'])){ echo $dados['dataNascimento']; } ?>" placeholder="Insira a Data de Nascimento do funcionario">
                        </div>
                        <div class="col">
                            <label for="">Numero BI</label>
                            <input type="text" name="bi" class="form-control" id="" value="<?php if(isset($_GET['id'])){ echo $dados['bI']; } ?>" placeholder="Insira o Numero de Bilhete de Identidade do funcionario">
                        </div>
                        <div class="col">
                            <label for="">Bairro</label>
                            <input type="text" name="bairro" class="form-control" id="" value="<?php if(isset($_GET['id'])){ echo $dados['Bairro']; } ?>" placeholder="Insira o Bairro do funcionario">
                        </div>
                        <div class="col">
                            <label for="">Nacionalidade</label>
                            <input type="text" name="nacionalidade" class="form-control" id="" value="<?php if(isset($_GET['id'])){ echo $dados['Nacionalidade']; } ?>" placeholder="Insira a Nacionalidade do funcionario">
                        </div>
                        <div class="col">
                            <label for="">Estado Civil</label>
                            <select name="EstadoCivil" id="" class="form-control">
                                <?php if(isset($_GET['id'])){ ?><option value=""><?=$dados['EstadoCivil'];?></option><?php } ?>
                                <option value="">Escolha Estado Civil</option>
                                <option value="Solteiro">Solteiro</option>
                                <option value="Casado">Casado</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Salario</label>
                            <input type="text" name="salario" class="form-control" id="" value="<?php if(isset($_GET['id'])){ echo $dados['Salario']; } ?>" placeholder="Insira o salario">
                        </div>
                        <div class="col">
                            <label for="">INSS</label>
                            <input type="text" name="INSS" class="form-control" id="" value="<?php if(isset($_GET['id'])){ echo $dados['INSS']; } ?>" placeholder="Insira o salario">
                        </div>
                        <div class="col">
                            <label for="">Nuit</label>
                            <input type="text" name="Nuit" class="form-control" id="" value="<?php if(isset($_GET['id'])){ echo $dados['Nuit']; } ?>" placeholder="Insira o salario">
                        </div>
                        <div class="col">
                            <?php if(isset($_GET['id'])){ ?>
                                <input type="submit" name="add" value="Actualizar" class="btn" id="" >
                            <?php }else{ ?>
                                <input type="submit" name="add" value="registar" class="btn" id="" >
                            <?php } ?>
                        </div>
                         
                </form>
            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/admin.js"></script>
    <?php if(isset($_GET['id'])){ ?>
        <script src="../public/js/updatefunc.js"></script>
    <?php }else{ ?>
        <script src="../public/js/funcionarios.js"></script>
    <?php } ?> 
</body>
</html>