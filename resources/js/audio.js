import {columns, animateWave} from "./wave-animation.js";

const audio = document.getElementById('audio');
const disk = document.querySelector('.vinyl-disk');
let intervalID;

if (audio && disk) {
    function startAnimation() {
        if (!intervalID) {
            intervalID = setInterval(animateWave, 200);
        }
        disk.style.animation = 'rotate-disk 4s linear infinite';
    }

    function stopAnimation() {
        clearInterval(intervalID);
        intervalID = null;
        disk.style.removeProperty('animation');
    }

    if (!audio.paused) startAnimation()

// Attach event listeners for play, pause, and ended
    audio.onplay = startAnimation;
    audio.onplaying = startAnimation;
    audio.onpause = stopAnimation;
    audio.onended = () => {
        stopAnimation();
        columns.forEach(column => {
            column.style.transform = 'scaleY(1)'; // Reset to original scale
        });
    };
}

export {audio}
