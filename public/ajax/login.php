<?php 
 include_once "../../connect/config.php";
 session_start();

//  echo "bem vindo";
        
     $username=filter_input(INPUT_POST,'email');
     $password=filter_input(INPUT_POST,'senha');

     $error = array();
     $saida = "";
     if(empty($username)){
         $error['e'] = "Preencha o Campo E-mail";
     }elseif(empty($password)){
         $error['e'] = "Preencha o Campo Senha";
     }else{
         $query = $pdo->query("SELECT * FROM usuarios WHERE email='$username' AND senha=md5($password)");
        //  $query->bindValue(":e",$username);
        //  $query->bindValue(":s",$password);
        //  $query->execute();
         if ($query->rowCount() > 0){
             $row=$query->fetch();
              
             if($row['nivel'] == "admin"){
                 $_SESSION['admin']=$row['id'];
                 $saida .=  "<p class='alert alert-success text-center'>Bem vindo ".$row['nome']."</p>";
                 ?><script>setTimeout(function(){location.assign("Admin/index.php");}, 2000);</script><?php
             }elseif($row['nivel'] == "armazem"){
                 $_SESSION['armazem']=$row['id'];
                 $saida .=  "<p class='alert alert-success text-center'>Bem vindo ".$row['nome']."</p>";
                 ?><script>setTimeout(function(){location.assign("Armazem/index.php");}, 2000);</script><?php
             }elseif($row['nivel'] == "secretaria"){
                $_SESSION['secretaria']=$row['id'];
                 $saida .=  "<p class='alert alert-success text-center'>Bem vindo ".$row['nome']."</p>";
                 ?><script>setTimeout(function(){location.assign("secretaria/index.php");}, 2000);</script><?php
             }


         }
         else{
             $saida .= "<p class='alert alert-danger text-center'>Falha no Login, Verifique se tem conta.</p>";
             
         }
     }
     if(isset($error['e'])){
         $saida .=  "<p class='alert alert-danger text-center'>".$error['e']."</p>";
     }
     
     echo $saida;
?>