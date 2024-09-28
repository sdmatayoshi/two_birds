const principal = document.getElementById('principal');
const nav_principal = document.getElementById('nav_principal');
const informes = document.getElementById('informes');
const nav_informes = document.getElementById('nav_informes');
const chat = document.getElementById('chat');
const nav_chat = document.getElementById('nav_chat');

function principal_aparecer() {
    informes.style.display = "none";
    if (chat) {
        chat.style.display = "none";
    }
    principal.style.display = "flex";
    nav_informes.style.textDecoration = "none";
    if (nav_chat) {
        nav_chat.style.textDecoration = "none";
    }
    nav_principal.style.textDecoration = "underline";
}
function informes_aparecer() {
    principal.style.display = "none";
    if (chat) {
        chat.style.display = "none";
    }
    informes.style.display = "flex";
    nav_principal.style.textDecoration = "none";
    if (nav_chat) {
        nav_chat.style.textDecoration = "none";
    }
    nav_informes.style.textDecoration = "underline";
}

function abrir_chat() {
    principal.style.display = "none";
    informes.style.display = "none";
    if (chat) {
        chat.style.display = "flex";
    }
    nav_principal.style.textDecoration = "none";
    nav_informes.style.textDecoration = "none";
    if (nav_chat) {
        nav_chat.style.textDecoration = "underline";
    }
}