const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll('#formulario input');




const expresiones = {
	//usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	apellidoPaterno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	apellidoMaterno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    telefono: /^\d{10}$/, // 10 numeros.
    //ciudad: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    //codigoPostal: /^.{5}$/, // 5 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	password: /^.{4,100}$/, // 4 a 12 digitos.
}

const campos = {
    nombre: false,
    apellidoPaterno: false,
    apellidoMaterno: false,
    telefono: false,
    correo: false,
    contrasena: false
}

const validarFormulario = (e) => {

    switch(e.target.name){

        case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
        break;
        case "apellidoPaterno":
            validarCampo(expresiones.apellidoPaterno, e.target, 'apellidoPaterno');
        break;
        case "apellidoMaterno":
            validarCampo(expresiones.apellidoMaterno, e.target, 'apellidoMaterno');
        break;
        case "telefono":
            validarCampo(expresiones.telefono, e.target, 'telefono'); 
        break;
        case "correo":
            validarCampo(expresiones.correo, e.target, 'correo'); 
        break;
        case "contrasena":
            validarCampo(expresiones.password, e.target, 'contrasena');     
        break;
    }
}

const validarCampo = (expresion, input, campo) => {

    if(expresion.test(input.value)){
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-circle-check');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-circle-xmark');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo] = true;
    }else{
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-circle-xmark');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-circle-check');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo] = false;
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);

});
    

formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    if(campos.nombre && campos.apellidoPaterno && campos.apellidoMaterno && campos.telefono && campos.correo && campos.contrasena){    
        
        var datos = new FormData(formulario);

        fetch('vista/modulos/usuarios_php/registro_usuario_bd.php', {
            method: 'POST',
            body: datos
        })
        .then( res => res.json())
        .then( data => {
                if(data == 'true'){
                    formulario.reset();
                }else{
                    console.log(data);
                }
            });

        document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
        setTimeout(() => {
            document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
        }, 3000);

        document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario__grupo-correcto');
        });
    }else{
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
        setTimeout(() => {
         document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
        }, 3000);
    }
});