


// telefone

let userfoneInput = document.getElementById("telefone");
let userfoneLabel = document.querySelector('label[for="telefone"]');


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
        
    } else {
        userfoneInput.classList.remove('correct');
        userfoneInput.classList.add('error');
        
    }
});

