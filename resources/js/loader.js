import {changeBackground} from "./dynamic-background.js";

const loader = document.querySelector('.loader');
const gif = document.querySelector('.gif');
const changeBtn = document.querySelector('.change-gif-btn');
const url = document.querySelector('meta[name="url"]');
const appUrl = url ? url.getAttribute('content') : null;
const randomGif = Math.floor(Math.random() * 11 + 1);

if (loader && gif && changeBtn) {
    loader.classList.remove('hidden')

    gif.src = `${appUrl}/gifs/lofi-${randomGif}.gif`;

    gif.onload = () => {
        loader.classList.add('hidden');
        gif.classList.remove('hidden');
        changeBtn.classList.add('group-hover:block');

        changeBackground();
    }
}

export {changeBtn, gif, loader, appUrl}
