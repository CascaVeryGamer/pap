const barralado=document.querySelector(".barralado");
const barraladoToggler=document.querySelector(".barralado-toggler");

barraladoToggler.addEventListener("click", () => {
    barralado.classList.toggle("collapsed");
});
