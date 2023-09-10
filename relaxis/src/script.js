const soundNames = {
  categoria1: ["León", "Elefante", "Lobo"],
  categoria2: ["Guitarra", "Piano"],
  categoria3: ["Lluvia", "Aves", "Arroyo"],
  categoria4: ["Lluvia", "Aves", "Arroyo"],
  categoria5: ["Lluvia", "Aves", "Arroyo"],
};

const soundFiles = {
  categoria1: ["audio.mp3", "elefante.mp3", "lobo.mp3"],
  categoria2: ["audio2.mp3", "piano.mp3"],
  categoria3: ["lluvia.mp3", "aves.mp3", "arroyo.mp3"],
  categoria4: ["lluvia.mp3", "aves.mp3", "arroyo.mp3"],
  categoria5: ["lluvia.mp3", "aves.mp3", "arroyo.mp3"],
};

const imageFiles = {
  categoria1: ["img1.jpeg", "elefante.jpg", "lobo.jpg"],
  categoria2: ["img1.jpeg", "piano.jpg"],
  categoria3: ["lluvia.jpg", "aves.jpg", "arroyo.jpg"],
  categoria4: ["lluvia.jpg", "aves.jpg", "arroyo.jpg"],
  categoria5: ["lluvia.jpg", "aves.jpg", "arroyo.jpg"],
};

function loadSounds(category) {
  const soundList = soundNames[category];
  const soundElement = document.getElementById("sonidos");
  const imgPlayer = document.getElementById("imgPlayer");

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
      let soundCard = document.getElementById("soundCard");
      if (soundCard.classList.contains("invisible")) {
        soundCard.classList.remove("invisible");
      }

      if (imgPlayer.classList.contains("unlocked")) {
        console.log("src");
        imgPlayer.src = `img/${category}/${imageFiles[category][index]}`;
      }
    });
    anchor.addEventListener("click", () =>
      playSound(category, soundFiles[category][index])
    );
    listItem.appendChild(anchor);
    soundElement.appendChild(listItem);
  });
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

document.addEventListener("DOMContentLoaded", function () {
  const imgPlayer = document.getElementById("imgPlayer");
  const toggleButton = document.getElementById("ancla");
  const icon = document.getElementById("ancla");

  toggleButton.addEventListener("click", function () {
    imgPlayer.classList.toggle("unlocked");
    if (imgPlayer.classList.contains("unlocked")) {
      icon.classList.remove("ri-anchor-line");
      icon.classList.add("ri-anchor-fill");
    }else{
      icon.classList.remove("ri-anchor-fill");
      icon.classList.add("ri-anchor-line");
    }
  });
});
