const buttonSatwa = document.getElementById("buttonSatwa");
const buttonArtikel = document.getElementById("buttonArtikel");
const favoriteSatwaContanier = document.querySelector(".favorite-satwa-container");
const favoriteArtikelContanier = document.querySelector(".favorite-artikel-container");
const notFoundSatwaContanier = document.querySelector(".not-found-container-satwa");
const notFoundArtikelContanier = document.querySelector(".not-found-container-artikel");

buttonSatwa.addEventListener("click", () => {
    buttonSatwa.classList.remove("button-white");
    buttonSatwa.classList.add("button-teal-500");

    buttonArtikel.classList.remove("button-teal-500");
    buttonArtikel.classList.add("button-white");

    favoriteSatwaContanier.classList.remove("d-none");
    favoriteArtikelContanier.classList.add("d-none");

    notFoundSatwaContanier.classList.remove('d-none');
    notFoundArtikelContanier.classList.add('d-none')
});

buttonArtikel.addEventListener("click", () => {
    buttonArtikel.classList.remove("button-white");
    buttonArtikel.classList.add("button-teal-500");

    buttonSatwa.classList.remove("button-teal-500");
    buttonSatwa.classList.add("button-white");

    favoriteSatwaContanier.classList.add("d-none");
    favoriteArtikelContanier.classList.remove("d-none");

    notFoundSatwaContanier.classList.add('d-none');
    notFoundArtikelContanier.classList.remove('d-none')
});