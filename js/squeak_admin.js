var principal = document.getElementById('cont');
var eliminar_informe = document.getElementById('lop');
function eliminar_informe_f() {
    eliminar_informe.style.display = "flex";
    principal.style.display = "none";
}
function salir() {
    principal.style.display = "flex";
    eliminar_informe.style.display = "none";
}