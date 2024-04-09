const menuBtn = document.querySelector(".menu-btn"),
    container_music = document.querySelector(".container_music");

const progressBar = document.querySelector(".bar"),
    progressDot = document.querySelector(".dot"),
    currentTimeEl = document.querySelector(".current-time"),
    DurationEl = document.querySelector(".duration");

menuBtn.addEventListener("click", () => {
    container_music.classList.toggle("active");
})

let playing = false,
    currentSong = 0,
    shuffle = false,
    repeat = false,
    favourist = [],
    audio = new Audio();

const songs = [
    {
        title: "song 1",
        artist: "artist song 1",
        img_src: "1.jpg",
        src: "1.mp3",
    },
    {
        title: "song 2",
        artist: "artist song 2",
        img_src: "2.jpg",
        src: "2.mp3",
    },
];

const playlistContainer = document.querySelector("#playlist"),
    infoWrapper = document.querySelector(".info"),
    coverImage = document.querySelector(".cover-image"),
    currentSongTitle = document.querySelector(".current-song-title"),
    currentFavourite = document.querySelector("#current-favourite");

function init() {
    updatePlaylist(songs);
    loadSong(currentSong);

}

init();


function updatePlaylist(songs) {
    playlistContainer.innerHTML = "";

    songs.forEach((song, index) => {
        const { title, src } = song; // src deve ser definido aqui dentro

        const isFavourite = favourist.includes(index);

        const tr = document.createElement("tr");
        tr.classList.add("song");
        tr.innerHTML = `
            <td class="no">
                <h5>${index + 1}</h5>
            </td>
            <td class="title">
                <h6>${title}</h6>
            </td>
            <td class="length">
                <h5>2:30</h5>
            </td>
            <td>
                <i class="bi bi-heart-fill ${isFavourite ? "active" : ""}"></i>
            </td>
        `;

        playlistContainer.appendChild(tr);

        /*o erro esta aqui*/

        tr.addEventListener("click", (e) => {
            if (e.target.classList.contains("bi-heart-fill")) {
                addToFavourits(index);
                e.target.classList.toggle("active");
                return;
            }

            currentSong = index;
            loadSong(currentSong);
            audio.play();
            container_music.classList.remove("active");
            playPauseBtn.classList.replace("bi-play-fill", "bi-pause-fill");
            playing = true;
        });



        tr.querySelector(".bi-heart-fill").addEventListener("click", (e) => {
            addToFavourits(index);
            e.target.classList.toggle("active");
        });

        const audioForDuration = new Audio(`./data/${src}`);
        audioForDuration.addEventListener("loadedmetadata", () => {
            const duration = audioForDuration.duration;
            let songDuration = formatTime(duration);
            tr.querySelector(".length h5").innerHTML = songDuration;
        });
    });
}

function addToFavourits(index) {
    if (favourist.includes(index)) {
        favourist = favourist.filter((item) => item !== index);
    } else {
        favourist.push(index);
    }
}


function formatTime(time) {
    let minutes = Math.floor(time / 60);
    let seconds = Math.floor(time % 60);
    seconds = seconds < 10 ? `0${seconds}` : seconds;
    return `${minutes}:${seconds}`;
}

function loadSong(num) {
    infoWrapper.innerHTML = `
    <h2>${songs[num].title}</h2>
    <h3>${songs[num].artist}</h3>
    `;

    currentSongTitle.innerHTML = songs[num].title;

    coverImage.style.backgroundImage = `url(./data/${songs[num].img_src})`;

    audio.src = `./data/${songs[num].src}`;

    if (favourist.includes(num)) {
        currentFavourite.classList.add("active");

    } else {
        currentFavourite.classList.remove("active");
    }
}

const playPauseBtn = document.querySelector("#playpause"),
    nextBtn = document.querySelector("#next"),
    prevBtn = document.querySelector("#prev");

playPauseBtn.addEventListener("click", () => {
    if (playing) {
        playPauseBtn.classList.replace("bi-pause-fill", "bi-play-fill");
        playing = false;
        audio.pause();
    } else {
        playPauseBtn.classList.replace("bi-play-fill", "bi-pause-fill");
        playing = true;
        audio.play();
    }
});

function nextSong() {

    if (shuffle) {
        shuffleFunc();
        loadSong(currentSong);

    }

    else if (currentSong < songs.length - 1) {
        currentSong++;
    } else {
        currentSong = 0;
    }
    loadSong(currentSong);

    if (playing) {
        audio.play();
    }
}

nextBtn.addEventListener("click", nextSong);

function prevSong() {

    if (shuffle) {
        shuffleFunc();
        loadSong(currentSong);

    }

    else if (currentSong > 0) {
        currentSong--;
    } else {
        currentSong = songs.length - 1;
    }
    loadSong(currentSong);

    if (playing) {
        audio.play();
    }
}



prevBtn.addEventListener("click", prevSong);

function addToFavourits(index) {
    if (favourist.includes(index)) {
        favourist = favourist.filter((item) => item !== index);
        currentFavourite.classList.remove("active");
    } else {
        favourist.push(index);

        if (index === currentSong) {
            currentFavourite.classList.add("active");
        }
    }

    updatePlaylist(songs);
}

currentFavourite.addEventListener("click", () => {
    currentFavourite.classList.toggle("active");
    addToFavourits(currentSong);
});

const shuffleBtn = document.querySelector("#shuffle");

function shuffleSongs() {
    shuffle = !shuffle;
    shuffleBtn.classList.toggle("active");
}

shuffleBtn.addEventListener("click", shuffleSongs);

function shuffleFunc() {
    if (shuffle) {
        currentSong = Math.floor(Math.random() * songs.length);
    }
}

const repeatBtn = document.querySelector("#repeat");
function repeatSong() {
    if (repeat === 0) {
        repeat = 1;
        repeatBtn.classList.add("active");
    } else if (repeat === 1) {
        repeat = 2;
        repeatBtn.classList.add("active");
    } else {
        repeat = 0;
        repeatBtn.classList.remove("active");
    }
}

repeatBtn.addEventListener("click", repeatSong);

audio.addEventListener("ended", () => {
    if (repeat === 1) {
        loadSong(currentSong);
        audio.play();
    } else if (repeat === 2) {
        nextSong();
        audio.play();
    } else {
        if (currentSong === songs.length - 1) {
            audio.pause();
            playPauseBtn.classList.replace("bi-pause-fill", "bi-play-fill");
            playing = false;
        } else {
            nextSong();
            audio.play();
        }
    }
});

function progress() {
    let { duration, currentTime } = audio;

    isNaN(duration) ? (duration = 0) : duration;
    isNaN(currentTime) ? (currentTime = 0) : currentTime;

    currentTimeEl.innerHTML = formatTime(currentTime);
    DurationEl.innerHTML = formatTime(duration);

    let progressPercentage = (currentTime / duration) * 100;
    progressDot.style.left = `${progressPercentage}%`;
}

audio.addEventListener("timeupdate", progress);

function setProgress(e) {
    let width = this.clientWidth;
    let clickX = e.offsetX;
    let duration = audio.duration;
    audio.currentTime = (clickX / width) * duration;
}

progressBar.addEventListener("click", setProgress);
