const waveContainer = document.getElementById("waveContainer");
let columns;

if (waveContainer) {
    const columnCount = 20;

    // Create the wave columns and add them to the container
    for (let i = 0; i < columnCount; i++) {
        const column = document.createElement("span");
        column.classList.add("wave-column");
        waveContainer.appendChild(column);
    }

    columns = document.querySelectorAll(".wave-column");
}

// Function to animate the columns
function animateWave() {
    columns.forEach(column => {
        const randomScale = Math.round(Math.random() * 2 + 1);
        column.style.transform = `scaleY(${randomScale})`;
    });
}

export { columns, animateWave }
