const buttonRincianMasuk = document.getElementById("buttonRincianMasuk");
const buttonRincianKeluar = document.getElementById("buttonRincianKeluar");

buttonRincianKeluar.addEventListener("click", () => {
    buttonRincianKeluar.classList.remove("text-success");
    buttonRincianKeluar.classList.add("btn-success");
    buttonRincianMasuk.classList.remove("btn-success");
    buttonRincianMasuk.classList.add("text-success");
    const boxDonasiKeluar = document.getElementById("boxDonasiKeluar");
    const boxDonasiMasuk = document.getElementById("boxDonasiMasuk");
    boxDonasiKeluar.classList.remove("d-none");
    boxDonasiMasuk.classList.add("d-none");
});

buttonRincianMasuk.addEventListener("click", () => {
    buttonRincianKeluar.classList.remove("btn-success");
    buttonRincianKeluar.classList.add("text-success");
    buttonRincianMasuk.classList.remove("text-success");
    buttonRincianMasuk.classList.add("btn-success");
    const boxDonasiKeluar = document.getElementById("boxDonasiKeluar");
    const boxDonasiMasuk = document.getElementById("boxDonasiMasuk");
    boxDonasiKeluar.classList.add("d-none");
    boxDonasiMasuk.classList.remove("d-none");
});
