const loader = document.querySelector('.loader');
const video = document.querySelector('.video');
const changeBtn = document.querySelector('.change-video-btn');

loader.classList.remove('hidden')

setTimeout(() => {
    if (video.readyState === 4) {
        loader.classList.add('hidden');
        video.classList.remove('hidden');
        changeBtn.classList.add('group-hover:block');
    }
}, 500)

export { changeBtn, video, loader }
