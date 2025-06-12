

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
    
    if (!senhaValida || !confirmaSenhaValida ) {
        e.preventDefault();
        alert("Por favor, corrija os erros antes de enviar.");
    }
    // Aqui, nada mais! Se estiver válido, deixa enviar!
});
