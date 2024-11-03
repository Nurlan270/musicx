import {changeBtn, video, loader} from './loader.js';

if (changeBtn && video && loader) {
    changeBtn.onclick = () => changeVideo();

    function changeVideo() {
        video.classList.add('hidden');
        loader.classList.remove('hidden');

        const newVideoNum = Math.floor(Math.random() * 5 + 1);
        const currentVidNum = Number(video.src.match(/lofi-(\d+)\.mp4/)[1]);
        const appUrl = document.querySelector('meta[name="url"]').getAttribute('content');

        newVideoNum === currentVidNum
            ? changeVideo()
            : video.src = `${appUrl}/background-videos/lofi-${newVideoNum}.mp4`;

        let id = setInterval(() => {
            if (video.readyState >= 3) {
                loader.classList.add('hidden');
                video.classList.remove('hidden');

                clearInterval(id);
            }
        }, 250);
    }
}
