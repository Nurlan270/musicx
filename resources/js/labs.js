const openModalBtn = document.getElementById("labs-btn");
const closeModalBtn = document.getElementById("closeModal");
const modal = document.getElementById("labs-modal");
const overlay = document.getElementById("overlay");

if (openModalBtn && closeModalBtn && modal && overlay) {
    // Open modal
    openModalBtn.addEventListener("click", () => {
        modal.classList.remove("hidden");
    });

// Close modal
    closeModalBtn.addEventListener("click", () => {
        modal.classList.add("hidden");
    });

// Close modal when clicking outside
    overlay.addEventListener("click", () => {
        modal.classList.add("hidden");
    });
}
