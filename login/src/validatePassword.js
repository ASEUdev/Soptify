document.getElementById("registrationForm").onsubmit = function (event) {
    event.preventDefault(); // Detener el envío del formulario por defecto
  
    var password = document.getElementsByName("password")[0].value;
    var confirmPassword = document.getElementsByName("confirm_password")[0].value;
  
    // Verificar si las contraseñas son iguales
    if (password !== confirmPassword) {
      // Mostrar mensaje de error en el div "error-message"
      document.getElementById("error-message").innerHTML = "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
    } else {
      // Enviar el formulario al archivo "register.php" para su procesamiento
      document.getElementById("registrationForm").submit();
    }
  };
  