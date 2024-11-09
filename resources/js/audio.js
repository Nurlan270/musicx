import {columns, animateWave} from "./wave-animation.js";
import {updateButton} from "./action-btn.js";
import {genre, getSong} from "./get-song.js";
import {audio} from "./wave-animation.js";

const disk = document.querySelector('.vinyl-disk');
let intervalID;

if (audio && disk) {
    if (!audio.paused) startAnimation()

// Attach event listeners for play, pause
    audio.onplay = startAnimation;
    audio.onplaying = startAnimation;
    audio.onpause = stopAnimation;
    audio.onended = () => {
        genre.value === 'none'
            ? getSong()
            : getSong(genre.value);

        audio.oncanplay = () => audio.play();
    }
}

function resetAnimations() {
    stopAnimation();
    columns.forEach(column => {
        column.style.transform = 'scaleY(1)'; // Reset to original scale
    });
}

function startAnimation() {
    updateButton();
    if (audio.src && audio.src !== 'about:blank') {
        if (!intervalID) {
            intervalID = setInterval(animateWave, 200);
        }
        disk.style.animation = 'rotate-disk 4s linear infinite';
    }
}

function stopAnimation() {
    updateButton();
    if (audio.src && audio.src !== 'about:blank') {
        clearInterval(intervalID);
        intervalID = null;
        disk.style.removeProperty('animation');
    }
}

export {audio, resetAnimations}
