<?php
session_start();
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    if ($_SESSION["usuario"][2] < 0) {
        header("location: login.php");
    } else {
        require("php/conexao.php");
        $conexaoClass = new Conexao();
        $conn = $conexaoClass->conectar();
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
    <link rel="stylesheet" href="./Css/playlist.css" />
    <title>Spotify</title>
</head>

<body>
    <header>
        <div class="menu_side">
            <img src="Img/mkdg-girl-logo.png" class="image" alt="logo">
            <div class="playlist">
                <h4 class="active">
                    <span></span> <i class="bi bi-music-note-beamed"></i>Playlist
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

            <div id="play">

                <?php
                $select_songs = $conn->prepare("SELECT * FROM `artistas`");
                $select_songs->execute();
                if($select_songs->rowCount() > 0){
                while($fetch_song = $select_songs->fetch(PDO::FETCH_ASSOC)){
                ?>
                <div id="musicas">
                    <div id="titulos">
                        id artista:
                        <?= $fetch_song["id_artista"]; ?>
                    </div>
                    <div id="titulos">
                        nome artista:
                        <a href="musicas.php?idArt=<?= $fetch_song['id_artista']; ?>">
                            <?= $fetch_song["nome"]; ?>
                        </a>
                    </div>
                    <div id="titulos">
                        descrição:
                        <?= $fetch_song["descricao"]; ?>
                    </div>
                </div>
                <?php }} ?>
            </div>
            <br> <br> <br>
            <div id="play">

                <?php
                $select_album = $conn->prepare("SELECT * FROM `albuns`");
                $select_album->execute();
                if($select_album->rowCount() > 0){
                while($fetch_album = $select_album->fetch(PDO::FETCH_ASSOC)){
                ?>
                <div id="musicas">
                    <div id="titulos">
                        id album:
                        <?= $fetch_album["id_album"]; ?>
                    </div>
                    <div id="titulos">
                        id artista:
                        <?= $fetch_album["id_artista"]; ?>
                    </div>
                    <div id="titulos">
                        nome:
                        <?= $fetch_album["nome"]; ?>
                    </div>
                    <div id="titulos">
                        ano de lançamento:
                        <?= $fetch_album["ano_lancamento"]; ?>
                    </div>
                </div>
                <?php } ?>
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
<?php } ?>
