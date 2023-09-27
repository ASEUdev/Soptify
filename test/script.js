// Opciones de la tabla 2 para cada opción de la tabla 1
const options = {
  viento: [
    '<a href="#" class="audio-link" data-audio-src="audio1.mp3"><li class="list-group-item list-group-item-action list-group-item-dark">1</li></a>',
    '<a href="#" class="audio-link" data-audio-src="audio2.mp3"><li class="list-group-item list-group-item-action list-group-item-dark">2</li></a>',
    '<a href="#" class="audio-link" data-audio-src="audio3.mp3"><li class="list-group-item list-group-item-action list-group-item-dark">3</li></a>',
  ],
  naturaleza: [
    '<a href="#" class="audio-link" data-audio-src="audio1.mp3"><li class="list-group-item list-group-item-action list-group-item-dark">4</li></a>',
    '<a href="#" class="audio-link" data-audio-src="audio2.mp3"><li class="list-group-item list-group-item-action list-group-item-dark">5</li></a>',
    '<a href="#" class="audio-link" data-audio-src="audio3.mp3"><li class="list-group-item list-group-item-action list-group-item-dark">6</li></a>',
  ],
  mar: [
    '<a href="#" class="audio-link" data-audio-src="audio1.mp3"><li class="list-group-item list-group-item-action list-group-item-dark">7</li></a>',
    '<a href="#" class="audio-link" data-audio-src="audio2.mp3"><li class="list-group-item list-group-item-action list-group-item-dark">8</li></a>',
    '<a href="#" class="audio-link" data-audio-src="audio3.mp3"><li class="list-group-item list-group-item-action list-group-item-dark">9</li></a>',
  ],
  asmr: [
    '<a href="#" class="audio-link" data-audio-src="audio1.mp3"><li class="list-group-item list-group-item-action list-group-item-dark">10</li></a>',
    '<a href="#" class="audio-link" data-audio-src="audio2.mp3"><li class="list-group-item list-group-item-action list-group-item-dark">11</li></a>',
    '<a href="#" class="audio-link" data-audio-src="audio3.mp3"><li class="list-group-item list-group-item-action list-group-item-dark">12</li></a>',
  ],
};

// Función para actualizar las opciones de la tabla 2
function updateTable2(option) {
  const sonidosDiv = document.getElementById("sonidos");
  sonidosDiv.style.display = "block"; // Mostrar el div de sonidos

  // Restablecer opciones de sonidos
  sonidosDiv.innerHTML = `
      <ul class="list-group">
        ${options[option]
          .map(
            (item) => `
          <a href="#" class="audio-link" data-audio-src="${item.audioSrc}">
            <li class="list-group-item list-group-item-action list-group-item-dark">${item.label}</li>
          </a>`
          )
          .join("")}
      </ul>`;

  // Event listeners para las opciones de audio en la tabla 2
  document.querySelectorAll(".audio-link").forEach(function (link) {
    link.addEventListener("click", function (event) {
      event.preventDefault(); // Evitar que el enlace cambie la URL
      var audioSrc = link.getAttribute("data-audio-src");
      playAudio(audioSrc);
      const audioCardDiv = document.getElementById("audioCard");
      audioCardDiv.style.visibility = "visible"; // Mostrar la tarjeta de audio
    });
  });
}

// Event listeners para las opciones de la tabla 1
document.querySelectorAll(".option").forEach(function (optionLink) {
  optionLink.addEventListener("click", function (event) {
    event.preventDefault(); // Evitar que el enlace cambie la URL
    const selectedOption = optionLink.getAttribute("data-option");
    updateTable2(selectedOption);
  });
});

function playAudio(src) {
  var audioPlayer = document.getElementById("audioPlayer");
  audioPlayer.src = src;
  audioPlayer.play();
}
