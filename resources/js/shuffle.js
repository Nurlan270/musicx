import {genre, getSong} from "./get-song.js";

const shuffleBtn = document.querySelector('#shuffle-btn');

shuffleBtn.onclick = () => getSong(genre.value);
