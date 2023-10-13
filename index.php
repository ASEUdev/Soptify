<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relaxis Song</title>
  <link rel="stylesheet" href="login/dist/style.css" />
</head>

<body>
  <div class="background">
    <div class="account">
      <div class="movebox">
        <form id="registrationForm" method="post" action="login/src/register.php"">
          <div class=" signup">
            <h2>Registrar Usuario</h2>
            <p class="tarjeta">Username</p>
            <input type="text" name="username" required />
            <p class="tarjeta">Password</p>
            <input type="password" name="password" required />
            <p class="tarjeta">Password again</p>
            <input type="password" name="confirm_password" required />
            <div id="error-message" style="color: red;"></div>
            <br />
            <br />
            <button type="submit">Registrar</button>
          </div>
        </form>

        <form id="loginForm" method="post" action="login/src/login.php">
          <div class="login">
            <h2>Inicio de sesion</h2>
            <p class="tarjeta">Username</p>
            <input type="text" name="username" required />
            <p class="tarjeta">Password</p>
            <input type="password" name="password" required />
            <br />
            <br />
            <input type="submit" name="login" value="Login" />
          </div>
        </form>
      </div>

      <div class="content">
        <h2>¿No tienes cuenta?</h2>
        <a href="#" class="button to-left">Registrar usuario</a>
        <div class="center">
          <div class="photo-frame">
            <img src="login/img/lgwhite.png" alt="Foto" class="photo" />
          </div>
        </div>
      </div>

      <div class="content">
        <h2>¿Tienes Cuenta?</h2>
        <a href="#" class="button to-right">Iniciar sesion</a>
        <div class="center">
          <div class="photo-frame">
            <img src="login/img/lgwhite.png" alt="Foto" class="photo" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
  <script src="login/dist/script.js"></script>
  <script src="login/src/validatePassword.js"></script>
</body>
</html>
