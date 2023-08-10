$(document).ready(function () {
  // Manejador de eventos para los enlaces en el slidebar
  $(".menu-item a").click(function (event) {
    event.preventDefault(); // Evita la recarga de la página

    // Obtén el contenido de ejemplo basado en el título de la opción
    var pageTitle = $(this).find(".menu-title").text().trim();
    var content = getContent(pageTitle);

    // Actualiza el contenido principal con el contenido de ejemplo
    $(".content").html(content);

    // colapsar sidebar
    $("#sidebar").addClass("collapsed");
  });

  // Función para obtener el contenido de ejemplo según la opción seleccionada
  function getContent(pageTitle) {
    // definir dentro de variable el contenido de cada opcion
    var player = "player here";

    // Ahora puedes utilizar la variable playerHTML donde necesites el contenido del div con id "player-wrapper" en JavaScript.

    let naturaleza =
      '<div class="main-menu">' +
      "<table>" +
      "<thead>" +
      '<tr><th colspan="2">Double Column</th></tr>' +
      "</thead>" +
      "<tbody>" +
      '<tr><td>1.</td><td><a href="youtube.com" target="_blank">Viento</a></td></tr>' +
      '<tr><td>2.</td><td><a href="youtube.com" target="_blank">Naturaleza</a></td></tr>' +
      '<tr><td>3.</td><td><a href="youtube.com" target="_blank">Mar</a></td></tr>' +
      '<tr><td>4.</td><td><a href="youtube.com" target="_blank">ASMR</a></td></tr>' +
      "</tbody>" +
      "</table>" +
      "</div>";

    let inicio =
      "<h1>Bienvenido a la página de inicio</h1><p>Contenido de la página de inicio...</p>";

    let takeItChill =
      naturaleza +
      '<div class="main-menu">' +
      "<table>" +
      "<thead>" +
      '<tr><th colspan="2">Double Column</th></tr>' +
      "</thead>" +
      "<tbody>" +
      '<tr><td>1.</td><td><a href="youtube.com" target="_blank">Viento</a></td></tr>' +
      '<tr><td>2.</td><td><a href="youtube.com" target="_blank">Naturaleza</a></td></tr>' +
      '<tr><td>3.</td><td><a href="youtube.com" target="_blank">Mar</a></td></tr>' +
      '<tr><td>4.</td><td><a href="youtube.com" target="_blank">ASMR</a></td></tr>' +
      "</tbody>" +
      "</table>" +
      "</div>" +
      player;

    let muro =
      "<h1>Muro de publicaciones</h1><p>Publicaciones recientes...</p>";

    let perfil =
      "<h1>Tu perfil</h1>" +
      "<p>Tu información de perfil</p>" +
      '<form method="post" action="logout.php">' +
      '<input type="submit" value="Cerrar sesión">' +
      "</form>";

    // Definir contenido
    let contentMap = {
      Inicio: inicio,
      "Lets take it chill": takeItChill,
      Muro: muro,
      Perfil: perfil,
    };

    // Obtén el contenido de ejemplo correspondiente o un mensaje de error si no se encuentra
    return (
      contentMap[pageTitle] ||
      "<p>Contenido de ejemplo no encontrado para: " + pageTitle + "</p>"
    );
  }
});
