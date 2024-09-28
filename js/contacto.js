const tele = document.getElementById('telefono');
const nav_tel = document.getElementById('nav_tel');
const corr = document.getElementById('correo');
const nav_corr = document.getElementById('nav_correo');
const another = document.getElementById('otro');
const nav_another = document.getElementById('nav_otro');

var id;

function tel_aparecer() {
    tele.style.display = "flex";
    corr.style.display = "none";
    another.style.display = "none";
}

function correo_aparecer() {
    tele.style.display = "none";
    corr.style.display = "flex";
    another.style.display = "none";
}

function otro_aparecer() {
    tele.style.display = "none";
    corr.style.display = "none";
    another.style.display = "flex";
}