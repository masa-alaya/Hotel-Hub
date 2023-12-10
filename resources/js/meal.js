const quantityField = document.querySelector('#qty');
const plusSign = document.querySelector('#plus-sign');
const negativeSign = document.querySelector('#negative-sign');

if(quantityField != null) {
    quantityField.addEventListener('input', () => {
        if(quantityField.value.length > 2) {
            quantityField.value = quantityField.value.slice(0, 2);
        }

        if(quantityField.value == '' || quantityField.value == 0) {
            quantityField.value = 1;
        }

        if(quantityField.value > 20) {
            quantityField.value = 20;
        }
    })
}

if(plusSign != null) {
    plusSign.addEventListener('click', () => {
        if(quantityField.value < 20) {
            quantityField.value++;
        }
    })
}

if(negativeSign != null) {
    negativeSign.addEventListener('click', () => {
        if(quantityField.value > 1) {
            quantityField.value--;
        }
    })
}