import {audio} from "./audio.js";
import {genre, getSong} from "./get-song.js";
import {changeGif, gif} from "./change-gif.js";

const repeatBtn = document.querySelector('#repeat-btn');
const repeatSvg = document.querySelector('#repeat-svg');
const repeatDot = document.querySelector('#repeat-dot');

if (repeatBtn) {
    repeatBtn.onclick = () => repeat();
}

function repeat() {
    const isRepeating = JSON.parse(localStorage.getItem('isRepeating'));
    if (!isRepeating) { //  Repeating is on
        localStorage.setItem('isRepeating', JSON.stringify(true));
        audio.loop = true;

        repeatBtn.title = 'Repeat';

        repeatSvg.classList.add('-translate-y-1');
        repeatSvg.classList.add('text-[#eab308]');

        repeatDot.classList.remove('hidden');
        repeatDot.classList.add('text-[#eab308]');
    } else {    //  Repeating is off
        localStorage.setItem('isRepeating', JSON.stringify(false));
        audio.loop = false;

        repeatBtn.title = "Don't repeat";

        repeatSvg.classList.remove('-translate-y-1');
        repeatSvg.classList.remove('text-[#eab308]');

        repeatDot.classList.add('hidden');
        repeatDot.classList.remove('text-[#eab308]');
    }
}

//      Key Events
if (audio && gif && genre) {
    window.onkeydown = (event) => {
        if (event.code === 'Space') {
            audio.paused
                ? audio.play()
                : audio.pause()
        } else if (event.key === 'Enter') {
            genre.value === 'none'
                ? getSong()
                : getSong(genre.value);
        } else if (event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
            changeGif();
        } else if (event.key === 'r' || event.key === 'R') {
            repeat();
        }
    }
}
