const nombre_v = document.getElementById('nombre');
const foto_v = document.getElementById('foto');
const valor = document.getElementById('valor');
const form_com = document.getElementById('form_com');
const nombre = nombre_v.value;
const foto = foto_v.value;

function lafuncion(){
	var comentario_v = document.getElementById('comentario');
	var comentario = comentario_v.value;
	var texto = "<div><span style='font-size: 26px; font-weight: bold;'><img src='../img/"+foto+"' style='width: 40px; height: 40px; border: solid;'> "+nombre+"</span></div><div style='background-color: #f8f8f8; border:solid; height: 100px; width: 50%;'>"+comentario+"</div><br>";
	valor.value = texto;
	form_com.submit();
}