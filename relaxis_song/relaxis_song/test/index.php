<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sonidos por Categoría</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
  <style>
    #sonidos {
      padding-top: 15em;
    }

    #categorias {
      padding-top: 15em;
    }

    #soundcard {
      display: none;
      padding-top: 20em;
      width: 18rem;
    }
  </style>
</head>

<body>
  <div class="container text-center">
    <div class="row">
      <div class="col" id="sonidos">
        <ul class="list-group">
          <!-- Los elementos de esta lista se llenarán dinámicamente desde JavaScript -->
        </ul>
      </div>
      <div class="col" id="categorias">
        <ul class="list-group">
          <li class="list-group-item"><a href="#" class="category" data-category="audio1">Animales</a></li>
          <li class="list-group-item"><a href="#" class="category" data-category="audio2">Instrumentos</a></li>
          <li class="list-group-item"><a href="#" class="category" data-category="nature">Naturaleza</a></li>
        </ul>
      </div>
      <div class="col" >
        <div class="card w-100" style="width: 18rem;">
          <img src="https://th.bing.com/th/id/OIP.nJIEduVNAik6_tF3L5LI7AHaHH?pid=ImgDet&rs=1" class="card-img-top"
            alt="...">
          <div class="card-body">
            <audio id="audioPlayer" controls></audio>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Definir nombres de sonidos por categoría
    const soundNames = {
      audio1: ["León", "Elefante", "Lobo"],
      audio2: ["Guitarra", "Piano"],
      nature: ["Lluvia", "Aves", "Arroyo"],
    };

    // Definir los nombres de los archivos de sonido (reemplazar con las URLs reales)
    const soundFiles = {
      audio1: ["audio.mp3", "elefante.mp3", "lobo.mp3"],
      audio2: ["audio2.mp3", "piano.mp3"],
      nature: ["lluvia.mp3", "aves.mp3", "arroyo.mp3"],
    };

    // Cargar los sonidos al seleccionar una categoría
    function loadSounds(category) {
      const soundList = soundNames[category];
      const soundElement = document.getElementById('sonidos');
      soundElement.innerHTML = '';

      soundList.forEach((sound, index) => {
        const listItem = document.createElement('li');
        listItem.classList.add('list-group-item');
        const anchor = document.createElement('a');
        anchor.href = '#';
        anchor.classList.add('category-sound');
        anchor.textContent = sound;
        anchor.addEventListener('click', () => playSound(category, soundFiles[category][index]));
        listItem.appendChild(anchor);
        soundElement.appendChild(listItem);
      });
    }

    // Reproducir el sonido seleccionado
    function playSound(category, sound) {
      const audioPlayer = document.getElementById('audioPlayer');
      audioPlayer.src = `${category}/${sound}`; // Cambiar la URL real de los sonidos
      audioPlayer.load();
      audioPlayer.play();
    }

    // Manejar los clics en las categorías
    const categoryItems = document.querySelectorAll('.category');
    categoryItems.forEach(item => {
      item.addEventListener('click', () => {
        const selectedCategory = item.getAttribute('data-category');
        loadSounds(selectedCategory);
      });
    });
    // Mostrar la tarjeta de sonido
    function showSoundCard() {
      const soundCard = document.getElementById('soundCard');
      soundCard.style.display = 'block';
    }
    // Ocultar la tarjeta de sonido
    function hideSoundCard() {
      const soundCard = document.getElementById('soundCard');
      soundCard.style.display = 'none';
    }
  </script>
</body>

</html>