import {changeBackground} from "./dynamic-background.js";
import {appUrl, gif, changeBtn, loader, changeGif, fetchGif} from "./change-gif.js";

if (loader && gif && changeBtn && window.innerWidth > 1065) {
    loader.classList.remove('hidden');

    changeGif();

    gif.onload = () => {
        loader.classList.add('hidden');
        gif.classList.remove('hidden');
        changeBtn.classList.add('group-hover:block');

        changeBackground();
    }
}
