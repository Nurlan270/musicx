import {changeBackground} from "./dynamic-background.js";

const gif = document.querySelector('.gif');
const loader = document.querySelector('.loader');
const changeBtn = document.querySelector('.change-gif-btn');
const url = document.querySelector('meta[name="url"]');
const appUrl = url ? url.getAttribute('content') : null;

if (changeBtn && gif && loader) {
    changeBtn.onclick = () => changeGif();
    changeBtn.onkeydown = (event) => {
        if (event.code !== 'ArrowLeft' || event.code !== 'ArrowRight') {
            event.preventDefault();
        }
    }
}

function changeGif() {
    gif.classList.add('hidden');
    loader.classList.remove('hidden');

    fetchGif();

    gif.onload = () => {
        loader.classList.add('hidden');
        gif.classList.remove('hidden');

        changeBackground();
    }
}

function fetchGif(attempts = 3) {
    fetch(appUrl + '/api/gifs/random')
        .then(response => {
            if (!response.ok) throw new Error("Couldn't get Gif, please try again.");
            return response.json();
        })
        .then(data => {
            const newGif = 'gifs/' + data.link;
            const lastPlayedGif = localStorage.getItem('lastPlayedGif');

            if (newGif === lastPlayedGif && attempts > 0) {
                fetchGif(attempts - 1);
            } else {
                gif.src = newGif;

                localStorage.setItem('lastPlayedGif', newGif);
            }
        })
        .catch(e => console.error(e))
}

export {appUrl, gif, changeBtn, loader, changeGif, fetchGif}
