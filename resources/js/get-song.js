import {appUrl} from "./change-gif.js";
import {audio, resetAnimations} from "./audio.js";

const genre = document.querySelector('#genre');
const songName = document.querySelector('#song-name');
const songAuthor = document.querySelector('#song-author');

if (genre) {
    genre.value === 'none'
        ? getSong()
        : getSong(genre.value);

    genre.onchange = () => getSong(genre.value);

    audio.oncanplay = () => audio.play();
}

function getSong(genreName = 'random') {
    resetAnimations();

    songName.innerText = '‎ ';
    songAuthor.innerText = '‎ ';
    songName.classList.add('w-72');
    songAuthor.classList.add('w-72');
    songName.style.animation = 'skeleton-loading 1s linear infinite alternate';
    songAuthor.style.animation = 'skeleton-loading 1s linear infinite alternate';

    fetchSong(genreName);

    resetAnimations();
}

function fetchSong(genreName, attempts = 3) {
    fetch(appUrl + `/api/songs/${genreName}`)
        .then(response => {
            if (!response.ok) throw new Error("Couldn't get song, please try again.");
            return response.json();
        })
        .then(data => {
            const newSong = 'songs/' + data.link;
            const lastPlayedSong = localStorage.getItem('lastPlayedSong');

            if (newSong === lastPlayedSong && attempts > 0) {
                fetchSong(genreName, attempts - 1);
            } else {
                audio.src = newSong;
                songName.innerText = data.name || 'Unknown Song';
                songAuthor.innerText = 'by ' + (data.author || 'Unknown Author');

                localStorage.setItem('lastPlayedSong', newSong);
            }

            songName.classList.remove('w-72');
            songAuthor.classList.remove('w-72');
            songName.style.removeProperty('animation');
            songAuthor.style.removeProperty('animation');
        })
        .catch(e => console.error(e))
}

export {genre, getSong}
