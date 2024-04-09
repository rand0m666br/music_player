<?php
session_start();
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
    <div id="msg">
      <p style="position: absolute; z-index: 5; font-size: 35px; margin-left: 37%; color: white; margin-top: -450px;">
        <?php
        echo @$_SESSION["msg"];
        ?>
      </p>
    </div>
    <div class="menu_side">
      <img src="Img/mkdg-girl-logo.png" class="image" alt="logo">
      <div class="playlist">
        <h4 class="active">
          <span></span> <i class="bi bi-house"></i>Home
        </h4>
        </h4>
      </div>
    </div>
    <div class="song_side">
      <div class="song_side_int">
        <button class="button" id="form-open">Login</button>
      </div>

      <section class="home">
        <div class="form_container">
          <i class="bi bi-x form_close"></i>
          <div class="form login_form">
            <form action="php/cadastro.php?acao=login" method="post">
              <h2>Login</h2>
              <div class="input_box">
                <input type="email" placeholder="Email" required name="email">
                <i class="bi bi-envelope email"></i>
              </div>
              <div class="input_box">
                <input type="password" placeholder="Senha" required name="senha">
                <i class="bi bi-key password"></i>
                <i class="bi bi-eye-slash pw_hide"></i>

                <div class="option_field">
                  <span class="checkbox">
                    <input type="checkbox" id="check" />
                    <label for="check">Lembrar Login</label>
                  </span>
                  <a href="#" class="forgot_pw">Esqueci a senha?</a>
                </div>
                <button class="button">Logar Agora</button>
                <div class="login_singup">
                  Não é Cadastrado? <a href="#" id="singup">Cadastrar</a>
                </div>
              </div>
            </form>
          </div>


          <div class="form sigup_form">
            <form action="php/cadastro.php?acao=cadastro" method="post">
              <h2>Cadastro</h2>
              <div class="input_box">
                <i class="bi bi-person"></i>
                <input type="text" placeholder="Nome" required name="nomeCad">
              </div>
              <div class="input_box">
                <input type="email" placeholder="Email" required name="emailCad">
                <i class="bi bi-envelope email"></i>
              </div>
              <div class="input_box">
                <input type="password" placeholder="Crie sua Senha" required name="senhaCad">
                <i class="bi bi-key password"></i>
                <i class="bi bi-eye-slash pw_hide"></i>
              </div>
              <div class="input_box">
                <input type="password" placeholder="Confirme sua Senha" required name="senhaCadConfirma">
                <i class="bi bi-key password"></i>
                <i class="bi bi-eye-slash pw_hide"></i>
              </div>



              <button class="button">Cadastrar</button>
              <div class="login_singup">
                Já é Cadastrado? <a href="#" id="login">Login</a>
              </div>
          </div>
          </form>
        </div>

    </div>
    </section>
    </div>
    <div class="master_play"></div>
  </header>

  <script type="text/javascript" src="./Js/app.js"></script>
</body>
<script>
  setTimeout(function(){
    document.getElementById("msg").style.display = "none";
    <?php
    unset($_SESSION["msg"]);
    ?>
  }, 3000);
</script>

</html>