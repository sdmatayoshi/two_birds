var principal = document.getElementById('cont');
var subir_informe = document.getElementById('coal');
var eliminar_informe = document.getElementById('lop');

function aparecer() {
    subir_informe.style.display = "flex";
    principal.style.display = "none";
    eliminar_informe.style.display = "none";
    $(".tox-statusbar").css("display", "none");
}
function salir() {
    principal.style.display = "flex";
    subir_informe.style.display = "none";
    eliminar_informe.style.display = "none";
}
setInterval(eliminar, 50);
function eliminar() {
    $(".tox-notifications-container").css("display", "none");
}