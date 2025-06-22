document.addEventListener("DOMContentLoaded", function () {
    const burger = document.getElementById("burger");
    const menu = document.getElementById("menu");
    const overlay = document.getElementById("overlay");

    burger.addEventListener("click", function () {
        menu.classList.add("show");
        overlay.classList.add("show");
    });

    overlay.addEventListener("click", function () {
        menu.classList.remove("show");
        overlay.classList.remove("show");
    });
});
