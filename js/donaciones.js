var donacion = 100;
var valor = document.getElementById("valor");
var display = document.getElementById("si");

function insertar_valor(donacion) {
    valor.value = donacion;
    document.getElementById("donado").value = "";
    display.innerHTML = "El importe que selecciono: " + donacion;
}

function insertar_valor_personalizado() {
    if(parseInt(document.getElementById("donado").value) <= 1000){
    valor.value = parseInt(document.getElementById("donado").value);
    console.log(valor.value);
    display.innerHTML = "El importe que selecciono: " + valor.value;
    }
}