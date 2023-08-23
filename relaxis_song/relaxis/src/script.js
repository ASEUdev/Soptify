const soundNames = {
  audio1: ["León", "Elefante", "Lobo"],
  audio2: ["Guitarra", "Piano"],
  nature: ["Lluvia", "Aves", "Arroyo"],
};


const soundFiles = {
  audio1: ["audio.mp3", "elefante.mp3", "lobo.mp3"],
  audio2: ["audio2.mp3", "piano.mp3"],
  nature: ["lluvia.mp3", "aves.mp3", "arroyo.mp3"],
};

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
      let soundCard = document.getElementById("soundCard");
      if (soundCard.classList.contains("invisible")) {
        soundCard.classList.remove("invisible");
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


