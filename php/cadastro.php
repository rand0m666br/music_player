<?php
require("acesso.php");

$usuario = new Usuario($conexao);

if (isset($_GET["acao"])) {
    $acao = $_GET["acao"];
    if ($acao == "cadastro") {
        $usuario->email = $_POST["emailCad"];
        $usuario->nome = $_POST["nomeCad"];
        $usuario->setSenha($_POST["senhaCad"], $_POST["senhaCadConfirma"]);
        $senha = $usuario->getSenha();
        $senha = $usuario->getConfirma();
        $usuario->cadastro();
    }
    if ($acao == "login") {
        $usuario->email = $_POST["email"];
        $usuario->setSenha($_POST["senha"], null);
        $senha = $usuario->getSenha();
        $usuario->login();
    }
    if ($acao == "artista") {
        $artista = new Artista($conexao);
        $artista->nome = $_POST["nomeArtista"];
        $artista->desc = $_POST["descArtista"];
        $artista->cadArtista();
    }
    // if ($acao == "album") {
    //     $album = new Album($conexao);
    //     $album->artista = $_POST["selectArtista"];
    //     $album->nome = $_POST["nomeAlbum"];
    //     $album->cadAlbum();
    // }
    if ($acao == "musica") {
        $musica = new Musica($conexao);
        $musica->nome = $_POST["nomeMusica"];
        // $musica->album = $_POST["selectAlbum"];
        $musica->artista = $_POST["selectArtistaMusica"];
        $musica->musica = $_FILES["musica"]["name"];
        $musica->tamanho = $_FILES["musica"]["size"];
        $musica->tmp_nome = $_FILES["musica"]["tmp_name"];
        $musica->cadMusica();
    }
}
?>
