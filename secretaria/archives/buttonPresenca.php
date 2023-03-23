<?php
session_start();
 
$saida = '';
// $expiracao = time()-365;
// setcookie('button','',$expiracao,'/');
$expiracao = time()+(60*60*24*6);
$_COOKIE['button'] = '';
 
if(isset($_SESSION['button'])){

    if(empty($_COOKIE['button'])){
        $dado1 = $_SESSION['button'];
        setcookie('button',$dado1,$expiracao,'/');
        $saida = '<button class="btn btn-primary"   type="button"  data-bs-toggle="modal" data-bs-target="#Presenca">Final Semana</button>';
        unset($_SESSION['button']);
    }else if($_COOKIE['button'] == 1){
        $dados2 = $_COOKIE['button'] + $_SESSION['button'];
        setcookie('button',$dados2,$expiracao,'/');
        $saida = '<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#Presenca">Final Semana</button>';
        
    }else{
        $saida = '';
    }
    
}else if($_COOKIE['button'] == 2){
    $saida = '';
}else{
    $saida = '<button class="btn btn-primary"   type="button"  data-bs-toggle="modal" data-bs-target="#Presenca">Final Semana</button>';
}

// echo $_COOKIE['button'];
echo $saida;

?>

