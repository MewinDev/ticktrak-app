export default function applyDynamicHeight() {
    const div = document.querySelector(".resize-div");
    const offsetTop = div.getBoundingClientRect().top + window.scrollY;
    div.style.minHeight = `calc(100vh - ${offsetTop+20}px)`;
}

window.addEventListener('DOMContentLoaded', applyDynamicHeight);
window.addEventListener('resize', applyDynamicHeight);
