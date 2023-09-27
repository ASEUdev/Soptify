const soundNames = {
  naturaleza: ["León", "Elefante", "Lobo"],
  instrumental: ["Guitarra", "Piano"],
  ruido: ["Lluvia", "Aves", "Arroyo"],
  casero: ["Lluvia", "Aves", "Arroyo"],
};

const soundFiles = {
  naturaleza: ["audio.mp3", "elefante.mp3", "lobo.mp3"],
  instrumental: ["audio2.mp3", "piano.mp3"],
  ruido: ["lluvia.mp3", "aves.mp3", "arroyo.mp3"],
  casero: ["lluvia.mp3", "aves.mp3", "arroyo.mp3"],
};

const imageFiles = {
  naturaleza: ["img1.jpeg", "elefante.jpg", "lobo.jpg"],
  instrumental: ["img1.jpeg", "piano.jpg"],
  ruido: ["lluvia.jpg", "aves.jpg", "arroyo.jpg"],
  casero: ["lluvia.jpg", "aves.jpg", "arroyo.jpg"],
};
const favorites = [];

let img;
function loadSounds(category) {
  const soundList = soundNames[category];
  const soundElement = document.getElementById("sonidos");
  soundElement.innerHTML = "";

  soundList.forEach((sound, index) => {
    const listItem = document.createElement("li");
    listItem.classList.add("list-group-item");
    listItem.classList.add("list-group-item-dark");
    const anchor = document.createElement("a");
    anchor.href = "#";
    anchor.classList.add("category-sound");
    anchor.textContent = sound;
    anchor.addEventListener("click", function () {
      showPlayer(category, index);
    });
    anchor.addEventListener("click", () =>
      playSound(category, soundFiles[category][index])
    );
    const anchorIcon = document.createElement("a");
    anchorIcon.href = "#";
    anchorIcon.classList.add("favorite-icon");
    const icon = document.createElement("i");
    icon.classList.add("ri-star-line");
    icon.id = `${category}${sound}`;
    icon.style.float = "right";
    anchorIcon.appendChild(icon);

    verificarResultados(`${category}${sound}`);

    anchorIcon.addEventListener("click", function () {
      toggleFavorite(category, sound);
    });

    listItem.appendChild(anchor);
    listItem.appendChild(anchorIcon);
    soundElement.appendChild(listItem);
  });
}
function showPlayer(category, index) {
  let imgPlayer = document.getElementById("imgPlayer");
  img = `img/${category}/${imageFiles[category][index]}`;
  let soundCard = document.getElementById("soundCard");
  if (soundCard.classList.contains("invisible")) {
    soundCard.classList.remove("invisible");
  }

  if (imgPlayer.classList.contains("unlocked")) {
    imgPlayer.src = img;
  }
}
function loadFavorites() {
  let soundElement = document.getElementById("sonidos");
  soundElement.innerHTML = "";
  obtenerResultados().then((resultados) => {
    if(!resultados.length){
      let item = document.createElement("h3");
      item.style.paddingTop = "50px";
      item.textContent = "No tienes canciones favoritas.";
      soundElement.appendChild(item);
    }else{
      resultados.forEach((resultado) => {
        let listItem = document.createElement("li");
        listItem.classList.add("list-group-item");
        listItem.classList.add("list-group-item-dark");
        let anchor = document.createElement("a");
        anchor.href = "#";
        anchor.textContent = resultado.sound;
        anchor.addEventListener("click", () => {
          showPlayer(resultado.category, soundNames[resultado.category].indexOf(resultado.sound));
        });
        anchor.addEventListener("click", () => {
          let index = soundNames[resultado.category].indexOf(resultado.sound);
          let direccion = soundFiles[resultado.category]
          playSound(resultado.category, direccion[index])
        });
        let anchorIcon = document.createElement("a");
        anchorIcon.href = "#";
        anchorIcon.classList.add("favorite-icon");
        let icon = document.createElement("i");
        icon.classList.add("ri-star-line");
        icon.id = `${resultado.category}${resultado.sound}`;
        icon.style.float = "right";
        anchorIcon.appendChild(icon);
        verificarResultados(`${resultado.category}${resultado.sound}`);
        anchorIcon.addEventListener("click", () => {
          toggleFavorite(resultado.category, resultado.sound);
        });
        listItem.appendChild(anchor);
        listItem.appendChild(anchorIcon);
        soundElement.appendChild(listItem);
      });
    }
  }).catch((error) => {
    console.error("Ocurrió un error al obtener los resultados:", error);
  });
}

function obtenerResultados() {
  return new Promise((resolve, reject) => {
    $.ajax({
      type: "GET",
      url: "src/favorites/getFavorites.php",
      dataType: "json",
      success: function (data) {
        resolve(data);
      },
      error: function (_xhr, _textStatus, errorThrown) {
        reject(errorThrown);
      },
    });
  });
}

function verificarResultados(id) {
  obtenerResultados()
    .then((resultados) => {
      resultados.forEach(function (resultado) {
        if (id === `${resultado.category}${resultado.sound}`) {
          let icon = document.getElementById(id);
          icon.classList.remove("ri-star-line");
          icon.classList.add("ri-star-fill");
        }
      });
    })
    .catch((error) => {
      console.error("Error en la solicitud AJAX: " + error);
    });
}

function toggleFavorite(category, sound) {
  let icon = document.getElementById(`${category}${sound}`);

  const datosInsercion = {
    category: category,
    sound: sound,
  };
  $.ajax({
    type: "POST",
    url: "src/favorites/setFavorites.php",
    data: datosInsercion,
    error: function (errorThrown) {
      console.error("Error en la solicitud AJAX: " + errorThrown);
    },
  });
  if (icon.classList.contains("ri-star-line")) {
    icon.classList.remove("ri-star-line");
    icon.classList.add("ri-star-fill");
  } else {
    icon.classList.remove("ri-star-fill");
    icon.classList.add("ri-star-line");
  }
}

function playSound(category, sound) {
  const audioPlayer = document.getElementById("audioPlayer");
  audioPlayer.src = `sounds/${category}/${sound}`;
  audioPlayer.load();
  audioPlayer.play();
}

const categoryItems = document.querySelectorAll(".category");
categoryItems.forEach((item) => {
  item.addEventListener("click", () => {
    const selectedCategory = item.getAttribute("data-category");
    loadSounds(selectedCategory);
  });
});
const favoriteItems = document.getElementById("favoritos");
favoriteItems.addEventListener("click", () => {
  loadFavorites();
});
document.addEventListener("DOMContentLoaded", function () {
  const imgPlayer = document.getElementById("imgPlayer");
  const toggleButton = document.getElementById("btnAncla");
  const icon = document.getElementById("ancla");

  toggleButton.addEventListener("click", function () {
    if (imgPlayer.classList.contains("unlocked")) {
      icon.classList.remove("ri-pushpin-line");
      icon.classList.add("ri-pushpin-fill");
    } else {
      imgPlayer.src = img;
      icon.classList.remove("ri-pushpin-fill");
      icon.classList.add("ri-pushpin-line");
    }
    imgPlayer.classList.toggle("unlocked");
  });
});

function cambiarTamaño() {
  let contenedor = document.getElementById("soundCard");
  let objetoDesaparecer = document.getElementById("categorias");

  if (!contenedor.classList.contains("resize")) {
    contenedor.classList.toggle("resize");
    contenedor.style.width = "400px";
    objetoDesaparecer.style.display = "none";
  } else {
    contenedor.classList.toggle("resize");
    contenedor.style.width = "200px";
    objetoDesaparecer.style.display = "block";
  }
}
