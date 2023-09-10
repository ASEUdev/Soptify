<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Spotify</title>
  <link rel="stylesheet" href="login/dist/style.css" />
</head>

<body>
  <div class="background">
    <div class="account">
      <div class="movebox">
        <!-- Formulario de registro -->
        <form id="registrationForm" method="post" action="login/src/register.php"">
          <div class=" signup">
            <h2>Register here</h2>
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

        <!-- Formulario de inicio de sesión -->
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

      <!-- Contenido de "¿No tienes cuenta?" -->
      <div class="content">
        <h2>¿No tienes cuenta?</h2>
        <p>Texto aqui</p>
        <a href="#" class="button to-left">Registrar usuario</a>
        <div class="center">
          <div class="photo-frame">
            <img src="login/img/cody.jpg" alt="Foto" class="photo" />
          </div>
        </div>
      </div>

      <!-- Contenido de "¿Tienes Cuenta?" -->
      <div class="content">
        <h2>¿Tienes Cuenta?</h2>
        <p>Texto aqui</p>
        <a href="#" class="button to-right">Iniciar sesion</a>
        <div class="center">
          <div class="photo-frame">
            <img src="login/img/cody.jpg" alt="Foto" class="photo" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
  <script src="login/dist/script.js"></script>
  <script src="login/src/validatePassword.js"></script>
  <script src="login/src/register.js"></script>
</body>
</html>
