<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Spotify</title>
  <link rel="stylesheet" href="dist/indexStyle.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
  <script src="src/indexScript.js"></script>
</head>

<body>
  <div class="background">
    <div class="account">
      <div class="movebox">
        <div class="signup">
          <h2>Registro</h2>
          <p>Username</p>
          <input></input>
          <p>Password</p>
          <input></input>
          <p>Password again </p>
          <input></input>
          <br />
          <br />
          <a href="#">
            <p>Registrar</p>
          </a>
        </div>
        <div class="login">
          <h2>Login here</h2>
          <p>Username</p>
          <input></input>
          <p>Password</p>
          <input></input>
          <br />
          <br />
          <a href="#">
            <p>Login</p>
          </a>
        </div>
      </div>
      <div class="content">
        <h2>No tienes una cuenta?</h2>
        <p>Text Here</p>
        <p>
          <a href="#" class="button to-left">Register here</a>
      </div>
      <div class="content">
        <h2>Tienes una Cuenta?</h2>
        <p>text here.</p>
        <a href="#" class="button to-right">Login here</a>
      </div>
    </div>
  </div>
  

</body>

</html>
