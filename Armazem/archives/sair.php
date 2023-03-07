<?php
session_start();

if(isset($_SESSION['armazem'])){
    session_destroy();
    header("location: ../../index.html");
}
?>