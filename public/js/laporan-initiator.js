// const buttonLaporanDiajukan = document.getElementById("buttonLaporanDiajukan");
const buttonLaporanDitinjau = document.getElementById("buttonLaporanDitinjau");
const buttonLaporanDisetujui = document.getElementById(
    "buttonLaporanDisetujui"
);
const buttonLaporanDitolak = document.getElementById("buttonLaporanDitolak");

// buttonLaporanDiajukan.addEventListener("click", () => {
//     buttonLaporanDiajukan.classList.remove("text-success");
//     buttonLaporanDiajukan.classList.add("btn-success");

//     buttonLaporanDitinjau.classList.remove("btn-success");
//     buttonLaporanDitinjau.classList.add("text-success");

//     buttonLaporanDisetujui.classList.remove("btn-success");
//     buttonLaporanDisetujui.classList.add("text-success");

//     buttonLaporanDitolak.classList.remove("btn-success");
//     buttonLaporanDitolak.classList.add("text-success");

//     const boxLaporanDitinjau = document.getElementById("boxLaporanDitinjau");
//     const boxLaporanDiajukan = document.getElementById("boxLaporanDiajukan");
//     const boxLaporanDisetujui = document.getElementById("boxLaporanDisetujui");
//     const boxLaporanDitolak = document.getElementById("boxLaporanDitolak");

//     boxLaporanDiajukan.classList.remove("d-none");
//     boxLaporanDitinjau.classList.add("d-none");
//     boxLaporanDisetujui.classList.add("d-none");
//     boxLaporanDitolak.classList.add("d-none");
// });

buttonLaporanDitinjau.addEventListener("click", () => {
    buttonLaporanDitinjau.classList.remove("text-success");
    buttonLaporanDitinjau.classList.add("btn-success");

    // buttonLaporanDiajukan.classList.remove("btn-success");
    // buttonLaporanDiajukan.classList.add("text-success");

    buttonLaporanDisetujui.classList.remove("btn-success");
    buttonLaporanDisetujui.classList.add("text-success");

    buttonLaporanDitolak.classList.remove("btn-success");
    buttonLaporanDitolak.classList.add("text-success");

    const boxLaporanDitinjau = document.getElementById("boxLaporanDitinjau");
    const boxLaporanDiajukan = document.getElementById("boxLaporanDiajukan");
    const boxLaporanDisetujui = document.getElementById("boxLaporanDisetujui");
    const boxLaporanDitolak = document.getElementById("boxLaporanDitolak");

    boxLaporanDitinjau.classList.remove("d-none");
    boxLaporanDiajukan.classList.add("d-none");
    boxLaporanDisetujui.classList.add("d-none");
    boxLaporanDitolak.classList.add("d-none");
});

buttonLaporanDisetujui.addEventListener("click", () => {
    buttonLaporanDisetujui.classList.remove("text-success");
    buttonLaporanDisetujui.classList.add("btn-success");

    // buttonLaporanDiajukan.classList.remove("btn-success");
    // buttonLaporanDiajukan.classList.add("text-success");

    buttonLaporanDitinjau.classList.remove("btn-success");
    buttonLaporanDitinjau.classList.add("text-success");

    buttonLaporanDitolak.classList.remove("btn-success");
    buttonLaporanDitolak.classList.add("text-success");

    const boxLaporanDitinjau = document.getElementById("boxLaporanDitinjau");
    const boxLaporanDiajukan = document.getElementById("boxLaporanDiajukan");
    const boxLaporanDisetujui = document.getElementById("boxLaporanDisetujui");
    const boxLaporanDitolak = document.getElementById("boxLaporanDitolak");

    boxLaporanDisetujui.classList.remove("d-none");
    boxLaporanDiajukan.classList.add("d-none");
    boxLaporanDitinjau.classList.add("d-none");
    boxLaporanDitolak.classList.add("d-none");
});

buttonLaporanDitolak.addEventListener("click", () => {
    buttonLaporanDitolak.classList.remove("text-success");
    buttonLaporanDitolak.classList.add("btn-success");

    // buttonLaporanDiajukan.classList.remove("btn-success");
    // buttonLaporanDiajukan.classList.add("text-success");

    buttonLaporanDisetujui.classList.remove("btn-success");
    buttonLaporanDisetujui.classList.add("text-success");

    buttonLaporanDitinjau.classList.remove("btn-success");
    buttonLaporanDitinjau.classList.add("text-success");

    const boxLaporanDitinjau = document.getElementById("boxLaporanDitinjau");
    const boxLaporanDiajukan = document.getElementById("boxLaporanDiajukan");
    const boxLaporanDisetujui = document.getElementById("boxLaporanDisetujui");
    const boxLaporanDitolak = document.getElementById("boxLaporanDitolak");

    boxLaporanDitolak.classList.remove("d-none");
    boxLaporanDiajukan.classList.add("d-none");
    boxLaporanDisetujui.classList.add("d-none");
    boxLaporanDitinjau.classList.add("d-none");
});
