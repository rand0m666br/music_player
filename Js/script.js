document.addEventListener('DOMContentLoaded', function () {

  const h4Elements = document.querySelectorAll('.menu_side .playlist h4');
  const containerMusic = document.querySelector('.container_music');
  const homePrincipal = document.querySelector('.home-principal');
  const cadMusic = document.querySelector('.cad_music'); 
  const cadArtist = document.querySelector('.cad_artist'); 
  const cadAlbum = document.querySelector('.cad_album'); 
  const contato = document.querySelector('.contato');


  h4Elements.forEach(function (h4) {
    h4.addEventListener('click', function () {

      h4Elements.forEach(function (el) {
        el.classList.remove('active');
      });

      h4.classList.add('active');

      if (h4.textContent.trim() === 'playlist') {
        containerMusic.classList.add('show');
        homePrincipal.classList.remove('show');
        cadMusic.classList.remove('show');
        cadArtist.classList.remove('show');
        cadAlbum.classList.remove('show');
       contato.classList.remove('show');
      } else if (h4.textContent.trim() === 'Home') {
        containerMusic.classList.remove('show');
        homePrincipal.classList.add('show');
        cadMusic.classList.remove('show');
        cadArtist.classList.remove('show');
        cadAlbum.classList.remove('show');
        contato.classList.remove('show');
      } else if (h4.textContent.trim() === 'Cad. Músicas') {
        containerMusic.classList.remove('show');
        homePrincipal.classList.remove('show');
        cadMusic.classList.add('show');
        cadArtist.classList.remove('show');
        cadAlbum.classList.remove('show');
        contato.classList.remove('show');
      } else if (h4.textContent.trim() === 'Cad. Artistas') {
        containerMusic.classList.remove('show');
        homePrincipal.classList.remove('show');
        cadMusic.classList.remove('show');
        cadArtist.classList.add('show');
        cadAlbum.classList.remove('show');
        recomendacao.classList.remove('show');
      } else if (h4.textContent.trim() === 'Cad. Albuns') {
        containerMusic.classList.remove('show');
        homePrincipal.classList.remove('show');
        cadMusic.classList.remove('show');
        cadArtist.classList.remove('show');
        cadAlbum.classList.add('show');
        contato.classList.remove('show');
      }
       else if (h4.textContent.trim() === 'Contatos') {
        containerMusic.classList.remove('show');
        homePrincipal.classList.remove('show');
        cadMusic.classList.remove('show');
        cadArtist.classList.remove('show');
        cadAlbum.classList.remove('show');
        contato.classList.add('show');
      }
    });
  });
});
