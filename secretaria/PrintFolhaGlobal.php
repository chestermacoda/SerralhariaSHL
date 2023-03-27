<?php 
include_once "../connect/config.php"; 

// $data1 = $_GET['data']; 
// $data2 = $_GET['data1']; 

// echo $data1;
// echo $data2;
$saida = '';
    if(isset($_GET['data'])){
    $mes = date('m');
    $ano = date('Y');
    $dia = date('d');
    $data = $ano.'-'.$mes.'-01';
    $data1 = $_GET['data'];


    // $data = $_POST['data1'];
    $cmd = $pdo->prepare("SELECT  f.nome,f.apelido,f.Salario,f.id, p.data,p.Entrada,p.Saida FROM  presenca p INNER JOIN funcionarios f ON f.id = p.id_funcionario  GROUP BY id_funcionario");
    $cmd->execute();
    $dados = $cmd->fetchAll();
    foreach($dados as $k ){
        $id = $k['id'];
        // SCRIPT PARA CONTABILIZACAO DAS FALTAS POR ID
        $cmd = $pdo->query("SELECT COUNT(p.Status) as Falta FROM  presenca p INNER JOIN funcionarios f ON f.id = p.id_funcionario where p.Status = 0 and p.id_funcionario =  '$id' AND data BETWEEN '$data' and '$data1'  GROUP BY id_funcionario");
        $dads = $cmd->fetch();

        $cmd = $pdo->query("SELECT  COUNT(p.HorasExtras) AS conta, SUM(p.HorasExtras) as horas FROM  presenca p INNER JOIN funcionarios f ON f.id = p.id_funcionario where p.HorasExtras IS NOT NULL and p.id_funcionario =  '$id' AND data BETWEEN '$data' and '$data1' GROUP BY id_funcionario");
        $das = $cmd->fetch();

        $Hextras = '';
        $SalarioFinal = $k['Salario'];
        if(!empty($das['horas'])){

            $extras = explode(":",$das['horas']);
            $horasnomal = 17;
            $Hextras = $extras[0] - ($das['conta']*$horasnomal);
        }else{
            $Hextras = '0';
        }
        
        if(!empty($dads['Falta'])){
            $salario = $k['Salario'];
            $mes = 30;
            $falta = $dads['Falta'];
            $GanhoDiario = $salario / $mes;
            $MenosFaltas = $mes - $falta;
            $SalarioFinal = $GanhoDiario * $MenosFaltas;
        }
        $saida .='
            <tr>
                 
                <td>'.$k['nome']. ' '.$k['apelido'].'</td>
                <td>'.$k['Salario'].'</td>
                <td>'.$dads['Falta'].'</td>
                <td></td>
                <td></td>
                <td></td>
                <td>'.$Hextras.'h</td>
                <td></td>
                <td>'.number_format($SalarioFinal,2).'</td>
            </tr>
        
        ';

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
        <link rel="stylesheet" href="../public/css/salarioGloabal.css">
        <link rel="stylesheet" href="../public/fontawesome-free-6.2.1-web/css/all.min.css">
    </head>

    <body>
        <button class="btn" onclick="clicks()"><i class="fa-solid fa-print"></i></button>
        <div class="content">
            <header>
                <nav>
                    <div class="top">
                        <img src="../public/images/1672901618319.jpg" style="height: 140px; margin-bottom:20px" alt="">
                        <p>Rua Marcelino dos Santos Q 11, N: 102-Chamanculo</p>
                        <p>Email: HortencioLanga@gmail.com</p>
                        <h4>Folha Salarial da Empresa SHL Metalomecanica</h4>
                        <p>Periodo: <?php 
                         $datas = explode('-',$_GET['data']);
                        echo $datas[2]. '-' .$datas[1]. '-' .$datas[0]
                        ?></p>
                    </div>
                     
                </nav>

            </header>
            
            <main>
                 <table>
                    <thead>
                        <tr>
                             
                            <td>Nome Completo</td>
                            <td>Salario</td>
                            <td>Faltas</td>
                            <td>Faltas J</td>
                            <td>Faltas N J</td>
                            <td>Atraso</td>
                            <td>Horas Extras</td>
                            <td>INSS</td>
                            <td>Salario Liquido</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $saida ?>
                    </tbody>
                 </table>
            </main>
        </div>
    </body>

    </html>
    <script>
        var btn = document.querySelector('.btn');
        // btn.addEventListener('click',function(e){
        //     e.preventDefault()
            
        // })
        function clicks(){
            // alert("bem vindo");
            btn.style.display='none'
            window.print()
           
        }
        
        // btn.addEventListener('click','clicks');
        
    </script>