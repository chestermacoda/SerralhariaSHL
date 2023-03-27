<?php
include_once "../../connect/config.php";

$saida = '';

if(!empty($_POST['data1']) and empty($_POST['data2'])){
    $data = $_POST['data1'];
    $cmd = $pdo->prepare("SELECT  f.nome,f.apelido,f.Salario,f.id, p.data,p.Entrada,p.Saida FROM  presenca p INNER JOIN funcionarios f ON f.id = p.id_funcionario  GROUP BY id_funcionario");
    $cmd->execute();
    $dados = $cmd->fetchAll();
    foreach($dados as $k ){
        $id = $k['id'];
        // SCRIPT PARA CONTABILIZACAO DAS FALTAS POR ID
        $cmd = $pdo->query("SELECT COUNT(p.Status) as Falta FROM  presenca p INNER JOIN funcionarios f ON f.id = p.id_funcionario where p.Status = 0 and p.id_funcionario =  '$id'  AND data = '$data'  GROUP BY id_funcionario");
        $dads = $cmd->fetch();

        $cmd = $pdo->query("SELECT  COUNT(p.HorasExtras) AS conta, SUM(p.HorasExtras) as horas FROM  presenca p INNER JOIN funcionarios f ON f.id = p.id_funcionario where p.HorasExtras IS NOT NULL and p.id_funcionario =  '$id' AND data = '$data' GROUP BY id_funcionario");
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
                <td>'.$k['id'].'</td>
                <td>'.$k['nome']. ' '.$k['apelido'].'</td>
                <td>'.$k['Salario'].'</td>
                <td>'.$dads['Falta'].'</td>
                <td></td>
                <td></td>
                <td>'.$Hextras.'h</td>
                <td></td>
                <td>'.$SalarioFinal.'</td>
            </tr>
        
        ';
    }

}elseif(!empty($_POST['data1']) and !empty($_POST['data2'])){
    $data = $_POST['data1'];
    $data1 = $_POST['data2'];


    $data = $_POST['data1'];
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
                <td>'.$k['id'].'</td>
                <td>'.$k['nome']. ' '.$k['apelido'].'</td>
                <td>'.$k['Salario'].'</td>
                <td>'.$dads['Falta'].'</td>
                <td></td>
                <td></td>
                <td>'.$Hextras.'h</td>
                <td></td>
                <td>'.$SalarioFinal.'</td>
            </tr>
        
        ';
    }

}else{
    $cmd = $pdo->prepare("SELECT  f.nome,f.apelido,f.Salario,f.id, p.data,p.Entrada,p.Saida FROM  presenca p INNER JOIN funcionarios f ON f.id = p.id_funcionario  GROUP BY id_funcionario");
    $cmd->execute();
    $dados = $cmd->fetchAll();
    foreach($dados as $k ){
        $id = $k['id'];
        // SCRIPT PARA CONTABILIZACAO DAS FALTAS POR ID
        $cmd = $pdo->query("SELECT COUNT(p.Status) as Falta FROM  presenca p INNER JOIN funcionarios f ON f.id = p.id_funcionario where p.Status = 0 and p.id_funcionario =  '$id'   GROUP BY id_funcionario");
        $dads = $cmd->fetch();

        $cmd = $pdo->query("SELECT  COUNT(p.HorasExtras) AS conta, SUM(p.HorasExtras) as horas FROM  presenca p INNER JOIN funcionarios f ON f.id = p.id_funcionario where p.HorasExtras IS NOT NULL and p.id_funcionario =  '$id' GROUP BY id_funcionario");
        $das = $cmd->fetch();

        $Hextras = '';
        $SalarioFinal = $k['Salario'];
        $valorHoraExtra = '';
        $valor = '';
        $Corte = '';

        if(!empty($das['horas'])){

            $extras = explode(":",$das['horas']);
            $horasnomal = 17;
            $Hextras = $extras[0] - ($das['conta']*$horasnomal);

            $mes = 30;
            
            $GanhoDiario = $SalarioFinal / $mes;
            $ValorPorHora = $GanhoDiario / 9;
            $valorHoraExtra = ($ValorPorHora +0.5*100) * $Hextras;
            

            $valor = number_format($valorHoraExtra,2);
            
        }else{
            $Hextras = '0';
            $valor = '0';
        }




        if(!empty($k['Salario'])){
            $entrada = 7;
            $extras = explode(":",$k['Entrada']);
            $Corte = $extras[0];
        }



        
        if(!empty($dads['Falta'])){
            $salario = $k['Salario'];
            $mes = 30;
            $falta = $dads['Falta'];
            $GanhoDiario = $salario / $mes;
            $MenosFaltas = $mes - $falta;
            $SalarioFinal = $GanhoDiario * $MenosFaltas;


            // $HorasTrabalho = 9;
            
            //  salario / 30 dias = valor diario
            //valor diario / 9 de trabalho por dia = Valor Por Hora  
            // $ValorPorHora = $GanhoDiario / $HorasExtras;



            // Final de semana

            // Sabado

            // Domingo

            // Feriado

        }

        

        $saida .='
            <tr>
                <td>'.$k['id'].'</td>
                <td>'.$k['nome']. ' '.$k['apelido'].'</td>
                <td>'.$k['Salario'].'</td>
                <td>'.$dads['Falta'].'</td>
                <td>'.$Corte.'</td>
                <td>'.$Hextras.'h</td>
                <td></td>
                <td>'.$valor.'</td>
                <td>'.number_format($SalarioFinal,2).'</td>
            </tr>
        
        ';
    }
}
// SELECT  f.nome,f.apelido,f.Salario,f.id, p.data,p.Entrada,p.Saida,COUNT(p.Status) as Falta FROM  presenca p INNER JOIN funcionarios f ON f.id = p.id_funcionario  where p.Status = 0 GROUP BY id_funcionario
echo $saida;
?>

