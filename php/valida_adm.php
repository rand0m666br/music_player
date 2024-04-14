<?php
session_start();
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    if ($_SESSION["usuario"][2] < 1) {
        header("location: login.php");
    } else {
        require("php/conexao.php");
        $conexaoClass = new Conexao();
        $conexao = $conexaoClass->conectar();
    }
} else {
    header("location: login.php");
}
?>