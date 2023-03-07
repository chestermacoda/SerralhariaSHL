<?php
session_start();
if(!isset($_SESSION['secretaria'])){
    header("location: ../index.html");
}

?>