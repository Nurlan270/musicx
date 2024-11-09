import {audio} from "./audio.js";

const repeatBtn = document.querySelector('#repeat-btn');
const repeatSvg = document.querySelector('#repeat-svg');
const repeatDot = document.querySelector('#repeat-dot');

if (repeatBtn) {
    repeatBtn.onclick = () => {
        const isRepeating = JSON.parse(localStorage.getItem('isRepeating'));
        if (!isRepeating) { //  Repeating is on
            localStorage.setItem('isRepeating', JSON.stringify(true));
            audio.loop = true;

            repeatBtn.title = 'Stop repeating'

            repeatSvg.classList.add('-translate-y-1');
            repeatSvg.classList.add('text-[#eab308]');

            repeatDot.classList.remove('hidden');
            repeatDot.classList.add('text-[#eab308]');
        } else {    //  Repeating is off
            localStorage.setItem('isRepeating', JSON.stringify(false));
            audio.loop = false;

            repeatBtn.title = 'Start repeating'

            repeatSvg.classList.remove('-translate-y-1');
            repeatSvg.classList.remove('text-[#eab308]');

            repeatDot.classList.add('hidden');
            repeatDot.classList.remove('text-[#eab308]');
        }
    }
}
