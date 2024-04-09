<?php
session_start();
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
  echo "ok";
}else {
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
        <h4>
          <span></span> <i class="bi bi-music-note-beamed"></i>Cad. Músicas
         
          
        </h4>
        <h4>
          <span></span> <i class="bi bi-music-note-beamed"></i>Recomendações          
        </h4>
        
      </div>
    </div>
    
      <div class="song_side">
       
        <div class="home-principal">
            <h1>ozdxvsxczvcxzvxzcvza</h1>

        </div>
        
          <div id="container_music"  class="container_music">
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

          <div class="cad_music">
            <h1>Cadastro de Artista</h1>
            <form action="php/cadastro.php?acao=artista" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="nome_artista">Nome do Artista:</label>
                <input type="text" id="nome_artista" name="nomeArtista" required>
              </div>
              <div class="form-group">
                <label for="descArtista">Descrição:</label>
                <input type="text" id="descArtista" name="descArtista" required>
              </div>
    
              <div class="form-group">
                <label for="imagem">Upload de Imagem:</label>
                <input type="file" id="imagem" name="imgArtista" accept="image/*">
              </div>
    
              <button type="submit">Enviar</button>
            </form>
          </div>
          
          <div class="recomendacao">
            <h1>fhfgh</h1>
          </div>

          
      </div>

  </header>

  <div class="right">
    <a href="php/logout.php" class="logout-button">Sair</a>
  </div>

  <script type="text/javascript" src="./Js/app.js"></script>
  <script type="text/javascript" src="./Js/music.js"></script>
  <script type="text/javascript" src="./Js/script.js"></script>

</body>
</html>
