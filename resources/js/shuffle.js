import {genre, getSong} from "./get-song.js";

const shuffleBtn = document.querySelector('#shuffle-btn');

shuffleBtn.onclick = () => {
    genre.value === 'none'
        ? getSong()
        : getSong(genre.value);
}
