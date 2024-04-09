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
                <span></span> <i class="bi bi-music-note-beamed"></i>Cad. Artista
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

        <div class="cad_artist">
            <h1>Cadastro de Artistas</h1>
            <form action="php/cadastro.php?acao=artista" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome_musica">Nome do artista:</label>
                    <input type="text" id="nome_musica" name="nomeArtista" required>
                </div>

                <!-- <div class="form-group">
                    <label for="imagem">Upload de Imagem:</label>
                    <input type="file" id="imagem" name="imagem" accept="image/*">
                </div> -->

                <div class="form-group">
                    <label for="nome_artista">Descrição:</label>
                    <input type="text" id="nome_artista" name="descArtista" required>
                </div>



                <button type="submit">Enviar</button>
            </form>
        </div>

    </div>
</header>

<div class="right">
    <a href="php/logout.php" class="logout-button">Sair</a>
</div>

<!-- <script type="text/javascript" src="./Js/app.js"></script> -->
<!-- <script type="text/javascript" src="./Js/music.js"></script> -->
<!-- <script type="text/javascript" src="./Js/script.js"></script> -->
<!-- <script type="text/javascript" src="./Js/home.js"></script> -->


</body>

</html>
