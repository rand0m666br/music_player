<div class="playlist">
    <a href="index.php">
    <h4 class="active">
        <span></span> <i class="bi bi-music-note-beamed"></i>Home

    </h4>
    </a>

    <a href="playlist3.php">
        <h4>
            <span></span> <i class="bi bi-music-note-beamed"></i>Playlist

        </h4>
    </a>
    <?php
    if($_SESSION["usuario"][2] > 0):
        ?>
        <a href="cad_artista.php">
            <h4>
                <span></span> <i class="bi bi-music-note-beamed"></i>Cad. Artistas
            </h4>
        </a>

        <a href="cad_musica.php">
            <h4>
                <span></span> <i class="bi bi-music-note-beamed"></i>Cad. Músicas
            </h4>
        </a>
    <?php endif; ?>

</div>