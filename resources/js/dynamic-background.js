import ColorThief from "colorthief";
import {gif} from "./loader.js";

function changeBackground() {
    const colorThief = new ColorThief();

    setInterval(() => {
        // Check if the GIF is fully loaded
        if (gif.complete && gif.naturalHeight !== 0) {
            const palette = colorThief.getPalette(gif, 3);

            // Define the gradient using the palette colors
            document.body.style.transition = 'background 1s ease';
            document.body.style.background = `
                linear-gradient(
                    135deg,
                    rgb(${palette[0][0]}, ${palette[0][1]}, ${palette[0][2]}),
                    rgba(${palette[0][1] - 50}, ${palette[1][2] - 50}, ${palette[2][1] - 50}, 0.7)
                )
            `;
        }
    }, 500);
}

export {changeBackground}
