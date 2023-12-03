const buttonLaporanDitinjau = document.getElementById("buttonLaporanDitinjau");
const buttonLaporanDisetujui = document.getElementById("buttonLaporanDisetujui");
const buttonLaporanDitolak = document.getElementById("buttonLaporanDitolak");

buttonLaporanDitinjau.addEventListener("click", () => {
    buttonLaporanDitinjau.classList.remove("button-white");
    buttonLaporanDitinjau.classList.add("button-teal-500");

    buttonLaporanDisetujui.classList.remove("button-teal-500");
    buttonLaporanDisetujui.classList.add("button-white");

    buttonLaporanDitolak.classList.remove("button-teal-500");
    buttonLaporanDitolak.classList.add("button-white");
});

buttonLaporanDisetujui.addEventListener("click", () => {
    buttonLaporanDisetujui.classList.remove("button-white");
    buttonLaporanDisetujui.classList.add("button-teal-500");

    buttonLaporanDitinjau.classList.remove("button-teal-500");
    buttonLaporanDitinjau.classList.add("button-white");

    buttonLaporanDitolak.classList.remove("button-teal-500");
    buttonLaporanDitolak.classList.add("button-white");
});

buttonLaporanDitolak.addEventListener("click", () => {
    buttonLaporanDitolak.classList.remove("button-white");
    buttonLaporanDitolak.classList.add("button-teal-500");

    buttonLaporanDisetujui.classList.remove("button-teal-500");
    buttonLaporanDisetujui.classList.add("button-white");

    buttonLaporanDitinjau.classList.remove("button-teal-500");
    buttonLaporanDitinjau.classList.add("button-white");
});
