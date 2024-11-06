import {changeBtn, gif, loader} from './loader.js';
import {changeBackground} from "./dynamic-background.js";

if (changeBtn && gif && loader) {
    changeBtn.onclick = () => changeGif();

    function changeGif() {
        gif.classList.add('hidden');
        loader.classList.remove('hidden');

        const newGifNum = Math.floor(Math.random() * 11 + 1);
        const currentGifNum = Number(gif.src.match(/lofi-(\d+)\.gif/)[1]);
        const appUrl = document.querySelector('meta[name="url"]').getAttribute('content');

        newGifNum === currentGifNum
            ? changeGif()
            : gif.src = `${appUrl}/gifs/lofi-${newGifNum}.gif`;

        gif.onload = () => {
            loader.classList.add('hidden');
            gif.classList.remove('hidden');

            changeBackground();
        }

    }
}
