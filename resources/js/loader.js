const loader = document.querySelector('.loader');
const video = document.querySelector('.video');
const changeBtn = document.querySelector('.change-video-btn');

loader.classList.remove('hidden')

let id = setInterval(() => {
    if (video.readyState >= 3) {
        loader.classList.add('hidden');
        video.classList.remove('hidden');
        changeBtn.classList.add('group-hover:block');

        clearInterval(id);
    }
}, 250);

export {changeBtn, video, loader}
