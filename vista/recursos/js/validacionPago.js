
    

document.querySelector('.card-number-input').oninput = () => {
    document.querySelector('.card-number-box').innerText 
    = document.querySelector('.card-number-input').value;
}

document.querySelector('.card-holder-input').oninput = () => {
    document.querySelector('.card-holder-name').innerText
     = document.querySelector('.card-holder-input').value;
}

document.querySelector('.month-input').oninput = () => {
    document.querySelector('.exp-month').innerText 
    = document.querySelector('.month-input').value;
}

document.querySelector('.year-input').oninput = () => {
    document.querySelector('.exp-year').innerText 
    = document.querySelector('.year-input').value;
}

document.querySelector('.cvv-input').onmouseenter
 = () => {
    document.querySelector('.front').style.transform 
    = 'perspective(1000px) rotateY(-180deg)';
    document.querySelector('.back').style.transform 
    = 'perspective(1000px) rotateY(0deg)';
}

document.querySelector('.cvv-input').onmouseleave = () => {
    document.querySelector('.front').style.transform 
    = 'perspective(1000px) rotateY(0deg)';
    document.querySelector('.back').style.transform 
    = 'perspective(1000px) rotateY(180deg)';
}

document.querySelector('.cvv-input').oninput = () => {
    document.querySelector('.cvv-box').innerText 
    = document.querySelector('.cvv-input').value;
}

    
    
    //Validaciones del formulario

  
    var numeroInput = document.getElementById('numero');
    var numeroError = document.getElementById('numeroError');
    numeroInput.addEventListener('input', function(event) {
        var inputValue = event.target.value;
        event.target.value = inputValue.replace(/\D/g, '');
        numeroInput.classList.remove('invalid');
        numeroError.textContent = '';
        if (!/^\d{16}$/.test(event.target.value)) {
            numeroInput.classList.add('invalid');
          
        }
    });

    var nombreInput = document.getElementById('nombre');
    var nombreError = document.getElementById('nombreError');
    nombreInput.addEventListener('input', function(event) {
        var inputValue = event.target.value;
        event.target.value = inputValue.replace(/\d/g, '');
        nombreInput.classList.remove('invalid');
        nombreError.textContent = '';
        if (/^\d+$/.test(event.target.value)) {
            nombreInput.classList.add('invalid');
            
        }
    });

    var cvvInput = document.getElementById('cvv');
    var cvvError = document.getElementById('cvvError');
    cvvInput.addEventListener('input', function(event) {
        var inputValue = event.target.value;
        event.target.value = inputValue.replace(/\D/g, '');
        cvvInput.classList.remove('invalid');
        cvvError.textContent = '';
        if (!/^\d{3,4}$/.test(event.target.value)) {
            cvvInput.classList.add('invalid');
           
        }
    });