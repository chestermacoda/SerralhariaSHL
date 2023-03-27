<?php 
include_once "../connect/config.php"; 
    
    $dados='' ; 
    $saida = '';
    if(isset($_GET['id'])){ 
        $id=$_GET['id']; 
        $dados = $se->FuncioInfo($id);



        $cmd = $pdo->query("SELECT COUNT(p.Status) as Falta FROM  presenca p INNER JOIN funcionarios f ON f.id = p.id_funcionario where p.Status = 0 and p.id_funcionario =  '$id'  GROUP BY id_funcionario");
        $dads = $cmd->fetch();

        $cmd = $pdo->query("SELECT  COUNT(p.HorasExtras) AS conta, SUM(p.HorasExtras) as horas FROM  presenca p INNER JOIN funcionarios f ON f.id = p.id_funcionario where p.HorasExtras IS NOT NULL and p.id_funcionario =  '$id'  GROUP BY id_funcionario");
        $das = $cmd->fetch();

        $Hextras = '';
        if(!empty($das['horas'])){

            $extras = explode(":",$das['horas']);
            $horasnomal = 17;
            $Hextras = $extras[0] - ($das['conta']*$horasnomal);
        }else{
            $Hextras = '0';
        }

        $SalarioFinal = 0;
        $descontos = 0;
        $falta = 0;
        if(!empty($dads['Falta'])){
            $salario = $dados['Salario'];
            $mes = 30;
            
            $falta = $dads['Falta'];

            $GanhoDiario = $salario / $mes;

            $MenosFaltas = $mes - $falta;

            $SalarioFinal = $GanhoDiario * $MenosFaltas;

            $descontos = $GanhoDiario *  $falta;

            //valor diario / 9 de trabalho por dia = Valor Por Hora  
            $ValorPorHora = $GanhoDiario / 9;
        }

        if(!empty($dados['Salario']) && empty($dads['Falta'])){
            $mes = 30;
            $salario = $dados['Salario'];
            $GanhoDiario = $salario / $mes;
            $ValorPorHora = $GanhoDiario / 9;
        }
    }
 
        
    


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../public/css/salario.css">
        <link rel="stylesheet" href="../public/fontawesome-free-6.2.1-web/css/all.min.css">
    </head>

    <body>
    <button class="btn" onclick="clicks()"><i class="fa-solid fa-print"></i></button>
    <div class="content">
            <header>
                <nav>
                    <div class="top">
                        <img src="../public/images/1672901618319.jpg" style="height: 140px; margin-bottom:20px" alt="">
                        <p>Rua Marcelino dos Santos Q 11, N: 102-Liberdade</p>
                        <p>Email: HortencioLanga@gmail.com</p>
                    </div>
                     
                </nav>

            </header>
            <main>
                <div class="title">
                    <h3>DADOS DO FUNCIONARIO </h3>
                </div>
                <section class="DadosPessoas">
                     <div class="Nomes">
                        <p><span>Nome:</span><?=ucfirst($dados['nome'])?></p>
                        <p><span>Bi:</span><?=$dados['bI']?></p>
                        <p><span>E.Civil:</span><?=$dados['EstadoCivil']?></p>
                        <p><span>INSS:</span><?=$dados['INSS']?></p>
                        <p><span>NUIT:</span><?=$dados['Nuit']?></p>
                     </div>
                     <div class="Funcoes">
                        <p>Periodo</p>
                        <p><?=date('Y-m-d')?></p>
                     </div>
                </section>
                <section class="section2">
                    <div class="funcionario border">
                        <p><span>Cod Func</span></p>
                        <p><span>Funcao</span></p>
                        <p><span>Valor Diario</span></p>
                        <p><span>Valor Por Hora</span></p>
                        <p><span>INSS</span></p>
                        <p><span>P.Pagamento</span></p>
                    </div>
                    <div class="funcionario">
                        <p><?=$dados['id']?></p>
                        <p><?=$dados['Area']?></p>
                        <p><?=number_format($GanhoDiario,2)?></p>
                        <p><?=number_format($ValorPorHora,2)?></p>
                        <p></p>
                        <p><?=date('Y-m-d')?></p>
                    </div>
                </section>
                <section class="section3">
                    <div class="ganhos">
                        <div class="ganhos1">
                            <h3>Ganhos</h3>
                            <div class="ganhos-down bordered">
                                <p><span>Bonus Horas Extras</span> </p>
                                <p><span>Valor</span> </p>
                            </div>
                            <div class="ganhos-down">
                                <p><?=$Hextras?></p>
                                <p><?=number_format($Hextras,2)?></p>
                            </div>
                        </div>
    
                        <div class="ganhos2">
                            <h3>Descontos</h3>
                            <div class="ganhos-top bordereds">
                                <p><span>Faltas</span> </p>
                                <p><span>Atrasos</span> </p>
                                <p><span>Faltas N Just.</span> </p>
                            </div>
                            <div class="ganhos-top">
                                <p><?=$falta?></p>
                                <p>0</p>
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                   <div class="subtotal">
                        <div class="total">
                            <p><span>Ganhos Totais : </span></p>
                            <p><?=number_format($Hextras,2)?></p>
                    </div>
                    <div class="total">
                            <p><span>Descontos Totais : </span></p>
                            <p><?=number_format($descontos,2)?> mt</p>
                    </div>
                   </div>
                       

                </section>
                <section class="Salarios">
                    <article class="salario">
                        <p><span>Salario Liquido : </span> <?=number_format($dados['Salario'],2)?> mt</p>
                    </article>
                    <article class="salario1">
                        <p><span>Salario Descontado : </span> <?=number_format($SalarioFinal,2)?> mt</p>
                    </article>
                </section>

            </main>
        </div>
    </body>

    </html>
    <script>
    var btn = document.querySelector('.btn');

    function clicks() {
        // alert("bem vindo");
        btn.style.display = 'none'
        window.print()

    }
</script>