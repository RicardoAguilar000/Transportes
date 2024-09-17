// Constantes 
const valorField = document.getElementById('valor');
const piezasField = document.getElementById('piezas');
const pesoField = document.getElementById('peso');
const largoField = document.getElementById('largo');
const anchoField = document.getElementById('ancho');
const altoField = document.getElementById('alto');

// Agregamos el eventp
valorField.addEventListener('input', validateNumericInput);
piezasField.addEventListener('input', validateNumericInput);
pesoField.addEventListener('input', validateNumericInput);
largoField.addEventListener('input', validateNumericInput);
anchoField.addEventListener('input', validateNumericInput);
altoField.addEventListener('input', validateNumericInput);

//Creamos la funcion que realice la validacion
function validateNumericInput(event) {
  const inputField = event.target;
  const inputValue = inputField.value;

  //Removemos los caracteres de texto
  const numericValue = inputValue.replace(/\D/g, '');

 
  inputField.value = numericValue;

  //Mensaje salida si no se cumple la condicion
  if (/[a-zA-Z]/.test(inputValue)) {
    showError(inputField, 'Solo se permiten números');
  } else {
    clearError(inputField);
  }
}


function showError(inputField, message) {
 
  let errorMessage = inputField.nextElementSibling;
  if (!errorMessage || !errorMessage.classList.contains('formulario__input-error')) {
    // Create a new error message element
    errorMessage = document.createElement('p');
    errorMessage.classList.add('formulario__input-error');
    inputField.parentNode.insertBefore(errorMessage, inputField.nextSibling);
  }

 
  errorMessage.textContent = message;
}


function clearError(inputField) {
  const errorMessage = inputField.nextElementSibling;
  if (errorMessage && errorMessage.classList.contains('formulario__input-error')) {
    errorMessage.remove();
  }
}