<?php
session_start();
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
  // var_dump($_SESSION["usuario"]);
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
  <link rel="stylesheet" href="./Css/style.css" />
  <title>Spotify</title>
</head>

<body>
  <header>
    <div class="menu_side">
      <img src="Img/mkdg-girl-logo.png" class="image" alt="logo">
      <div class="playlist">
        <h4 class="active">
          <span></span> <i class="bi bi-music-note-beamed"></i>Home

        </h4>

        <h4>
          <span></span> <i class="bi bi-music-note-beamed"></i>playlist

        </h4>
        <?php
        if ($_SESSION["usuario"][2] > 0) :
        ?>
          <h4>
            <span></span> <i class="bi bi-music-note-beamed"></i>Cad. Artistas
          </h4>

          <h4>
            <span></span> <i class="bi bi-music-note-beamed"></i>Cad. Albuns
          </h4>

          <h4>
            <span></span> <i class="bi bi-music-note-beamed"></i>Cad. Músicas
          </h4>
        <?php endif; ?>
        <h4>
          <span></span> <i class="bi bi-music-note-beamed"></i>Contato
        </h4>
        <h4>
          <span></span> <i class="bi bi-music-note-beamed"></i>Recomendações
        </h4>

      </div>
    </div>

    <div class="song_side">

      <div class="home-principal">
        <section class="home" id="home">
          <div class="home-content">
            <h3>Seja Bem-Vindo a MKDG</h3>
            <h1>Somos o melhor display </h1>
            <h3>De músicas do <span class="multiple-text"></span></h3>
          </div>
          <div class="home-img">
            <img src="Img/mkdg-logo-side.png" alt="logo" />
          </div>
        </section>
      </div>

      <div id="container_music" class="container_music">
        <div class="top">
          <i class="bi bi-list menu-btn"></i>
          <i class="bi bi-search"></i>
        </div>
        <div class="cover-image"></div>
        <div class="player-body"></div>


        <div class="list-wrapper">
          <table class="list" id="playlist">
            <tr class="song">
              <td class="no">
                <h5>1</h2>
              </td>
              <td class="title">
                <h6>Titulo Música</h2>
              </td>
              <td class="length">
                <h5>2:30</h2>
              </td>
              <td>
                <i class="bi bi-heart"></i>
              </td>
            </tr>

            <tr class="song">
              <td class="no">
                <h5>1</h2>
              </td>
              <td class="title">
                <h6>Titulo Música</h2>
              </td>
              <td class="length">
                <h5>2:30</h2>
              </td>
              <td>
                <i class="bi bi-heart"></i>
              </td>
            </tr>

          </table>
        </div>
        <div class="info">
          <h2>titulo musica</h2>
          <h3>artista</h3>
        </div>
        <div class="bar">
          <div class="dot"></div>
          <div class="time">
            <h5 class="current-time">0:00</h5>
            <h5 class="duration">0:00</h5>
          </div>
        </div>
        <div class="controls">
          <i class="bi bi-skip-backward" id="prev"></i>
          <i class="bi bi-play-fill" id="playpause"></i>
          <i class="bi bi-fast-forward" id="next"></i>
        </div>

        <div class="more-controls">
          <i class="bi bi-heart-fill" id="current-favourite"></i>
          <i class="bi bi-shuffle" id="shuffle"></i>
          <i class="bi bi-repeat" id="repeat"></i>
          <i class="bi bi-gear" id="options"></i>
        </div>

        <p class="current-song-title">
          titulo musica
        </p>

      </div>

      <div class="cad_artist">
        <h1>Cadastro de Artistas</h1>
        <form action="php/cadastro.php?acao=artista" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nome_musica">Nome do artista:</label>
            <input type="text" id="nome_musica" name="nomeArtista" required>
          </div>

          <div class="form-group">
            <label for="imagem">Upload de Imagem:</label>
            <input type="file" id="imagem" name="imagem" accept="image/*">
          </div>

          <div class="form-group">
            <label for="nome_artista">Descrição:</label>
            <input type="text" id="nome_artista" name="descArtista" required>
          </div>



          <button type="submit">Enviar</button>
        </form>
      </div>

      <div class="cad_album">
        <h1>Cadastro de Álbum</h1>
        <form action="php/cadastro.php?acao=album" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nomeAlbum">Nome do Álbum:</label>
            <input type="text" id="nomeAlbum" name="nomeAlbum" required>
          </div>

          <div class="form-group">
            <label for="imagem_album">Upload de Imagem:</label>
            <input type="file" id="imagem_album" name="imagem_album" accept="image/*">
          </div>

          <div class="form-group">
            <label for="selectArtista">Escolha o artista :</label>
            <select id="selectArtista" name="selectArtista" required>
              <option value="" disabled selected>Selecione um artista</option>

              <option value="1">At 1</option>
              <option value="2">At 2</option>
              <option value="3">At 3</option>
            </select>
          </div>

          <button type="submit">Enviar</button>
        </form>
      </div>

      <div class="cad_music">
        <h1>Cadastro de Música</h1>
        <form action="#" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nomeMusica">Nome da Música:</label>
            <input type="text" id="nomeMusica" name="nomeMusica" required>
          </div>

          <div class="form-group">
            <label for="musica">Upload de Música:</label>
            <input type="file" id="musica" name="musica" accept="audio/*" required>
          </div>

          <div class="form-group">
            <label for="selectAlbum">Escolha o Álbum:</label>
            <select id="selectAlbum" name="selectAlbum" required>
              <option value="" disabled selected>Selecione um álbum</option>

              <option value="<?= $dadosMusica["id_album"]; ?>"><?= $dadosMusica["id_album"]; ?></option>
            </select>
          </div>

          <div class="form-group">
            <label for="selectArtistaMusica">Escolha o Artista:</label>
            <select id="selectArtistaMusica" name="selectArtistaMusica" required>
              <option value="" disabled selected>Selecione um Artista</option>

              <option value="1">Artista 1</option>
              <option value="2">Artista 2</option>
              <option value="3">Artista 3</option>
            </select>
          </div>

          <button type="submit">Enviar</button>
        </form>
      </div>

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
            <input type="submit" value="Envie sua mensagem" class="btn" />
          </form>
        </section>
      </div>



      <div class="recomendacao">
        <h1>fhfgh</h1>
      </div>


    </div>

  </header>

  <div class="right">
    <a href="php/logout.php" class="logout-button">Logout-buttom</a>
  </div>

  <script type="text/javascript" src="./Js/app.js"></script>
  <script type="text/javascript" src="./Js/music.js"></script>
  <script type="text/javascript" src="./Js/script.js"></script>

</body>

</html>