// ----------Nome ----------//

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


// telefone

let userfoneInput = document.getElementById("telefone");
let userfoneLabel = document.querySelector('label[for="telefone"]');
let userfoneHelper = document.getElementById('telefone-helper');

// Bloqueia a digitação de caracteres não numéricos
userfoneInput.addEventListener("input", (e) => {
    e.target.value = e.target.value.replace(/\D/g, '');
});

userfoneInput.addEventListener("change", (e) => {
    let valor = e.target.value.trim();

    // Regex para telefone brasileiro: 10 ou 11 dígitos
    const telefoneRegex = /^\d{10,11}$/;

    if (telefoneRegex.test(valor)) {
        userfoneInput.classList.add('correct');
        userfoneInput.classList.remove('error');
        userfoneHelper.classList.remove('visible');
    } else {
        userfoneInput.classList.remove('correct');
        userfoneInput.classList.add('error');
        userfoneHelper.innerText = "Digite um telefone válido (ex: 81999999999)";
        userfoneHelper.classList.add('visible');
    }
});



//----------- Email ---------//

let useremailInput = document.getElementById("email")
let useremailLabel = document.querySelector('label[for="email"]')
let useremailHelper = document.getElementById('email-helper')

useremailInput.addEventListener("change", (e) => {
    let valor = e.target.value.trim();

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;



    if (emailRegex.test(valor)) {
        useremailInput.classList.add('correct');
        useremailInput.classList.remove('error');
        useremailHelper.classList.remove('visible');
    } else {
        useremailInput.classList.remove('correct');
        useremailInput.classList.add('error');
        useremailHelper.innerText = "Digite um e-mail válido (exemplo@dominio.com)";
        useremailHelper.classList.add('visible');
    }
});

//---------- Senha ----------//
let senhaInput = document.getElementById("senha");
let senhaLabel = document.querySelector('label[for="senha"]');
let senhaHelper = document.getElementById("senha-helper");

senhaInput.addEventListener('change', (e) => {
    let valor = e.target.value

    if (valor.length > 5) {
        senhaInput.classList.add('correct')
        senhaInput.classList.remove('error')
        senhaHelper.classList.remove('visible')
    } else {
        senhaInput.classList.add('error')
        senhaInput.classList.remove('correct')
        senhaHelper.classList.add('visible')
        senhaHelper.innerText = " A senha precisa ter pelo menos 6 caracteres"
    }
});

// ---------- Confirmação da Senha ---------//

let confirmaSenhaInput = document.getElementById("confirma-senha");
let confirmaSenhaLabel = document.querySelector('label[for="confirma-senha"]');
let confirmaSenhaHelper = document.getElementById("confirma-senha-helper");

confirmaSenhaInput.addEventListener('change', (e) => {
    let valor = e.target.value
    if (valor == senhaInput.value) {
        confirmaSenhaInput.classList.add('correct')
        confirmaSenhaInput.classList.remove('error')
        confirmaSenhaHelper.classList.remove('visible')
    } else {
        confirmaSenhaInput.classList.add('error')
        confirmaSenhaInput.classList.remove('correct')
        confirmaSenhaHelper.classList.add('visible')
        confirmaSenhaHelper.innerText = "As senhas precisam ser iguais"
    }
});

//--------Botão de revelar a senha ----------//

function togglePassword(btn, inputId) {
    var input = document.getElementById(inputId);
    if (input.type === "password") {
        input.type = "text";
        btn.innerText = "🚫"; // Altera o ícone para mostrar que a senha está visível
    } else {
        input.type = "password";
        btn.innerText = "👁️‍🗨️"; // Altera o ícone para mostrar que a senha está oculta
    }
}

// --------------- Tratamento em Js para permitir o envio do formulário para o backend------//

let form = document.getElementById("cadastro-form");

form.addEventListener("submit", (e) => {
    let senhaValida = senhaInput.classList.contains('correct');
    let confirmaSenhaValida = confirmaSenhaInput.classList.contains('correct');
    let userfoneValido = userfoneInput.classList.contains('correct');
    let usernameValido = usernameInput.classList.contains('correct');
    let userEmailValido = useremailInput.classList.contains('correct');

    if (!senhaValida || !confirmaSenhaValida || !userfoneValido || !usernameValido || !userEmailValido) {
        e.preventDefault();
        alert("Por favor, corrija os erros antes de enviar.");
    }
    // Aqui, nada mais! Se estiver válido, deixa enviar!
});
