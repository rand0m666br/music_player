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
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="Css/style2.css">

</head>
<body>

<section class="playlist">

   <h3 class="heading">music playlist</h3>

   <div class="box-container">

   <?php
      $select_songs = $conn->prepare("SELECT * FROM `musicas`");
      $select_songs->execute();
      if($select_songs->rowCount() > 0){
         while($fetch_song = $select_songs->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <div class="name"><?= $fetch_song['nome']; ?></div>
      <div class="artist"><?= $fetch_song['compositor']; ?></div>
      <div class="flex">
         <div class="play" data-src="data/<?= $fetch_song['link_arquivo']; ?>"><i class="fas fa-play"></i><span>play</span></div>
         <a href="data/<?= $fetch_song['link_arquivo']; ?>" download><i class="fas fa-download"></i><span>download</span></a>
      </div>
   </div>
   <?php
    }
   }
   ?>
   <div class="box more-btn">
      <a href="upload_music.php" class="btn">upload music</a>
   </div>
   
</div>

</section>












<div class="music-player">

   <i class="fas fa-times" id="close"></i>

   <div class="box">
      <img src="" class="album" alt="">
      <div class="name"></div>
      <div class="artist"></div>
      <audio src="" controls class="music"></audio>
   </div>

</div>

<!-- custom js file link  -->
<script src="Js/script2.js"></script>
   
</body>
</html>