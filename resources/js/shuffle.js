import {genre, getSong} from "./get-song.js";

const shuffleBtn = document.querySelector('#shuffle-btn');

if (shuffleBtn) {
    shuffleBtn.onclick = () => {
        genre.value === 'none'
            ? getSong()
            : getSong(genre.value);
    }
}
