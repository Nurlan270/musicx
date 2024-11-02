import {changeBtn, video, loader} from './loader.js';

changeBtn.onclick = () => changeVideo();

function changeVideo() {
    video.classList.add('hidden');
    loader.classList.remove('hidden');

    const newVideoNum = Math.floor(Math.random() * 5 + 1);
    const currentVidNum = Number(video.src.match(/lofi-(\d+)\.mp4/)[1]);

    newVideoNum === currentVidNum
        ? changeVideo()
        : video.src = `${video.dataset.url}/background-videos/lofi-${newVideoNum}.mp4`;

    video.onloadeddata = () => {
        loader.classList.add('hidden');
        video.classList.remove('hidden');
    };
}
