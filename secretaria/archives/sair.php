<?php
session_start();

if(isset($_SESSION['secretaria'])){
    session_destroy();
    header("location: ../../index.html");
}
?>