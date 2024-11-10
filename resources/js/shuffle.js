import {genre, getSong} from "./get-song.js";

const shuffleBtn = document.querySelector('#shuffle-btn');

if (shuffleBtn) {
    shuffleBtn.onclick = (event) => {
        genre.value === 'none'
            ? getSong()
            : getSong(genre.value);
    }

    shuffleBtn.onkeydown = (event) => {
        if (event.code !== 'Enter') {
            event.preventDefault();
        }
    }
}
