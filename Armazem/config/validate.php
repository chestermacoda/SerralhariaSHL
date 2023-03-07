<?php
session_start();
if(!isset($_SESSION['armazem'])){
    header("location: ../index.html");
}

?>