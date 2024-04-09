<?php
session_start();
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    if ($_SESSION["usuario"][2] < 0) {
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
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <link rel="stylesheet" href="./Css/style.css" />
    <title>Spotify</title>
</head>

<body>
<header>
    <div class="menu_side">
        <img src="Img/mkdg-girl-logo.png" class="image" alt="logo">
        <div class="playlist">
            <h4 class="active">
                <span></span> <i class="bi bi-music-note-beamed"></i>Contato
            </h4>
            <h4>
                <span></span>
                <a href="index.php">
                    <i class="bi bi-music-note-beamed"></i>Home
                </a>
            </h4>

        </div>
    </div>

    <div class="song_side">

    <div class="contato">
            <section class="contact" id="contact">
                <h2 class="heading">Entre em contato <span>Comigo</span></h2>
                <form action="#">
                    <div class="input-box">
                        <input type="text" placeholder="Nome Completo" />
                        <input type="email" placeholder="Endereço de E-mail" />
                    </div>

                    <div class="input-box">
                        <input type="number" placeholder="Telefone Celular" />
                        <input type="text" placeholder="Assunto" />
                    </div>
                    <textarea name="" id="" cols="30" rows="10" placeholder="Sua mensagem"></textarea>
                    <input type="submit" value="Envie sua mensagem" class="btn" onclick="alerta()" />
                </form>
            </section>
        </div>

    </div>
</header>

<div class="right">
    <a href="php/logout.php" class="logout-button">Sair</a>
</div>

<script>
    function alerta(){
        alert("Mensagem enviada com sucesso!");
    }
</script>

<!-- <script type="text/javascript" src="./Js/app.js"></script> -->
<!-- <script type="text/javascript" src="./Js/music.js"></script> -->
<!-- <script type="text/javascript" src="./Js/script.js"></script> -->
<!-- <script type="text/javascript" src="./Js/home.js"></script> -->


</body>

</html>
