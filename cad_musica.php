<?php require("php/valida_adm.php"); ?>
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
            <?php require("menu.php"); ?>
        </div>

        <div class="song_side">
            <div class="cad_music">
                <h1>Cadastro de Música</h1>
                <form action="php/cadastro.php?acao=musica" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nomeMusica">Nome da Música:</label>
                        <input type="text" id="nomeMusica" name="nomeMusica" required>
                    </div>

                    <div class="form-group">
                        <label for="musica">Upload de Música:</label>
                        <input type="file" id="musica" name="musica" accept="audio/*">
                    </div>

                    <div class="form-group">
                        <label for="selectArtistaMusica">Escolha o Artista:</label>
                        <select id="selectArtistaMusica" name="selectArtistaMusica" required>
                            <option value="" disabled selected>Selecione um Artista</option>

                            <?php
                            $artistaQuery = $conexao->prepare("SELECT * FROM artistas");
                            $artistaQuery->execute();
                            $dadosArt = $artistaQuery->fetchAll(PDO::FETCH_ASSOC);

                            for ($i = 0; $i < sizeof($dadosArt); $i++) {
                                $artista = $dadosArt[$i];
                            ?>
                            <option value="<?= $artista['id_artista']; ?>"><?= $artista['nome']; ?></option>
                            <?php } ?>
                        </select>
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