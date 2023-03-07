<?php 
include_once "../connect/config.php"; 
    
    $dados='' ; 
    $saida = '';
    if(isset($_GET['id'])){ 
        $id=$_GET['id']; 
        $dados = $se->FuncioInfo($id);

    }

            $saida .= '<td>'.$dados['nome'].'</td>';
            $saida .= '<td>'.$dados['bI'].'</td>';
            $saida .= '<td>'.$dados['EstadoCivil'].'</td>';
            $saida .= '<td>'.$dados['INSS'].'</td>';
            $saida .= '<td>'.$dados['Nuit'].'</td>';
            
        
    


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../public/css/salario.css">
        <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    </head>

    <body>
        <div class="content">
            <header>
                <nav>
                    <div class="top">
                        <img src="../public/images/1672901618319.jpg" style="height: 350px; margin-bottom:20px" alt="">
                    </div>
                    <div class="localizacao">
                        <p>Rua Marcelino dos Santos Q 11, N: 102-Liberdade</p>
                        <p>Email: HortencioLanga@gmail.com</p>
                    </div>
                </nav>

            </header>
            <main>
                <section class="User">


                    <div class="card">
                        <div class="card-header">
                            <div class="Titulo">
                                <h3>Dados Do Funcionario</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <td>Nome</td>
                                        <td>BI</td>
                                        <td>E.CIVIL</td>
                                        <td>INSS</td>
                                        <td>Nuit</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><?=$saida?></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <!--    funcao  -->
                <section class="pagamento">
                    <div class="card">

                        <div class="card-body">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <td>COD. FUNC</td>
                                        <td>FUNÇÃO</td>
                                        <td>SAL.HORAS</td>
                                        <td>P.PAGAMENTO</td>
                                        <td>PERIODO</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>45</td>
                                        <td>Fiel do Armazem</td>
                                        <td>54.4</td>
                                        <td></td>
                                        <td>2023-02-28</td>
                                    </tr>
                                </tbody>
                            </table>                          
                    </div>
                </section>
                <!--    funcao  -->
                <section class="pagamento">
                    <div class="card">
                        <div class="card-header">
                            <div class="Titulo">
                                <h3>GANHOS E CORTES</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <td>Bonus Horas Extras</td>
                                        <td>Salario</td>
                                        <td>Faltas Justificadas</td>
                                        <td>Faltas Não Justificadas</td>
                                        <td>Valor INSS ( 3% )</td>
                                        <td>Sub Total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>400.00</td>
                                        <td>8 000.00</td>
                                        <td>3</td>
                                        <td>6</td>
                                        <td>468.93</td>
                                        <td>7,300.00</td>
                                    </tr>
                                </tbody>
                                
                            </table>

                        </div>
                        <div class="card-footer">
                        <tfoot>
                            <div class="col-sm-6 mx-5">
                                <h5>Total</h5>
                                <p class="total">12,000.00</p> 
                            </div>    
                        </tfoot>
                        </div>
                    </div>
                    
                   
                </section>
            </main>
        </div>
    </body>

    </html>