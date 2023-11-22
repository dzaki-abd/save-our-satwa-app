const buttonRincianMasuk = document.getElementById("buttonRincianMasuk");
const buttonRincianKeluar = document.getElementById("buttonRincianKeluar");

buttonRincianKeluar.addEventListener("click", () => {
    buttonRincianKeluar.classList.remove("btn-outline-success");
    buttonRincianKeluar.classList.add("btn-success");
    buttonRincianMasuk.classList.remove("btn-success");
    buttonRincianMasuk.classList.add("btn-outline-success");
    const boxDonasiKeluar = document.getElementById("boxDonasiKeluar");
    const boxDonasiMasuk = document.getElementById("boxDonasiMasuk");
    boxDonasiKeluar.classList.remove("d-none");
    boxDonasiMasuk.classList.add("d-none");
});

buttonRincianMasuk.addEventListener("click", () => {
    buttonRincianKeluar.classList.remove("btn-success");
    buttonRincianKeluar.classList.add("btn-outline-success");
    buttonRincianMasuk.classList.remove("btn-outline-success");
    buttonRincianMasuk.classList.add("btn-success");
    const boxDonasiKeluar = document.getElementById("boxDonasiKeluar");
    const boxDonasiMasuk = document.getElementById("boxDonasiMasuk");
    boxDonasiKeluar.classList.add("d-none");
    boxDonasiMasuk.classList.remove("d-none");
});
