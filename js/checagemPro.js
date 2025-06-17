// ----------Nome ----------//
/*
let usernameInput = document.getElementById("nome")
let usernameLabel = document.querySelector('label[for="nome"]')
let usernameHelper = document.getElementById("username-helper")

usernameInput.addEventListener("change", (e) => {
    let valor = e.target.value.trim() //Captura o que foi escrito no input
    console.log(e.target)


    if (valor.length < 3) {
        usernameInput.classList.remove('correct')
        usernameInput.classList.add('error')
        usernameHelper.innerText = "O nome deve ter pelo menos 3 caracteres"
        usernameHelper.classList.add('visible')
    } else {
        usernameInput.classList.add('correct')
        usernameInput.classList.remove('error')
        usernameHelper.classList.remove('visible')
    }
})
*/




//---------------CPF-----------------//
let cpfInput = document.getElementById("cpf");
let cpfLabel = document.querySelector('label[for="cpf"]');
let cpfHelper = document.getElementById('cpf-helper');

// Bloqueia a digitação de caracteres não numéricos
cpfInput.addEventListener("input", (e) => {
    e.target.value = e.target.value.replace(/\D/g, '');
});

cpfInput.addEventListener("input", (e) => {
    let valor = e.target.value.trim();

    // Regex para cpf brasileiro: 11 dígitos.
    const cpfRegex = /^\d{11}$/;

    if (cpfRegex.test(valor)) {
        cpfInput.classList.add('correct');
        cpfInput.classList.remove('error');
        cpfHelper.classList.remove('visible');
    } else {
        cpfInput.classList.remove('correct');
        cpfInput.classList.add('error');
        cpfHelper.innerText = "Digite um cpf válido (Número com 11 dígitos)";
        cpfHelper.classList.add('visible');
    }
});

// --------------- Tratamento em Js para permitir o envio do formulário para o backend------//

let form = document.getElementById("cadastro-form");

form.addEventListener("submit", (e) => {
    
   //let usernameValido = usernameInput.classList.contains('correct');
    const cpfValido = cpfInput.classList.contains('correct');

    if (!cpfValido) {
        e.preventDefault();
        alert("Por favor, corrija os erros antes de enviar.");
    }
    // Aqui, nada mais! Se estiver válido, deixa enviar!
});