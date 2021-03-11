function validar(){

var nombre, empresa, telefono, email, mensaje, expresion;
nombre = document.getElementById("nombre").value;
empresa = document.getElementById("empresa").value;
telefono = document.getElementById("telefono").value;
email = document.getElementById("email").value;
mensaje = document.getElementById("mensaje").value;
asunto = document.getElementById("asunto").value;
expresion = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
	



if(nombre==""||empresa==""||telefono==""||email==""||mensaje==""||asunto==""){
	alert("Todos los campos son obligatorios");
	return false;
}
else if(asunto.length>30){
	alert("Asunto demasiado largo");
	return false;
}
else if(nombre.length>100){
	alert("El nombre es demasiado largo");
	return false;
}
else if(empresa.length>100){
	alert("El nombre de la empresa excede los caracteres permitidos");
}
else if(telefono.length>10){
	alert("El numero de teléfono es demasiado largo");
	return false;
}
else if(isNaN(telefono)){
	alert("Solo se permiten numeros en el campo  Teléfono")
	return false;
}
else if(!expresion.test(email)){
	alert("correo no valido")
	return false;

}
else if(email>100){
	alert("Correo electrónico demasiado largo");
	return false;
}
}