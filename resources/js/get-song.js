import {appUrl} from "./loader.js";
import {audio} from "./audio.js";

const genre = document.querySelector('#genre');
const songName = document.querySelector('#song-name');
const songAuthor = document.querySelector('#song-author');

if (genre) {
    if (genre.value === 'none') {
        getRandomSong();
    }

    genre.onchange = () => {
        //
    }
}

function getRandomSong() {
    songName.style.animation = 'skeleton-loading 1s linear infinite alternate';
    songAuthor.style.animation = 'skeleton-loading 1s linear infinite alternate';

    fetch(appUrl + '/api/songs/random')
        .then(response => {
            if (!response.ok) {
                throw new Error("Couldn't get song, please try again.");
            }
            return response.json();
        })
        .then(data => {
            audio.src = 'songs/' + data.link
            songName.innerText = data.name || 'Unknown Song';
            songAuthor.innerText = 'by ' + data.author || 'Unknown Author';
        })
        .catch(e => console.error(e))
        .finally(() => {
            songName.style.removeProperty('animation');
            songAuthor.style.removeProperty('animation');
        })
}
