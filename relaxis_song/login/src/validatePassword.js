document.getElementById("registrationForm").onsubmit = function (event) {
    event.preventDefault(); 
    var password = document.getElementsByName("password")[0].value;
    var confirmPassword = document.getElementsByName("confirm_password")[0].value;
  
    if (password !== confirmPassword) {
      document.getElementById("error-message").innerHTML = "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
    } else {
      document.getElementById("registrationForm").submit();
    }
  };
  