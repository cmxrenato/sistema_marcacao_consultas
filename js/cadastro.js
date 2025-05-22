let usernameInput = document.getElementById("nome")
let usernameLabel = document.querySelector('label[for="nome"]')
let  usernameHelper = document.getElementById("username-helper")

usernameInput.addEventListener("change",(e)=>{
    let valor = e.target.value.trim() //Captura o que foi escrito no input
    console.log(e.target)
     if(valor == ""){
        usernameInput.classList.remove('correct')
        usernameInput.classList.remove('error')
        usernameHelper.classList.remove('visible')
        return;  // Evita seguir a próxima validação desnecessariamente
    }

    if (valor.length < 3){
        usernameInput.classList.remove('correct')
        usernameInput.classList.add('error')
        usernameHelper.innerText = "O nome deve ter pelo menos 3 caracteres"
        usernameHelper.classList.add('visible')
    } else{
        usernameInput.classList.add('correct')
        usernameInput.classList.remove('error')
        usernameHelper.classList.remove('visible')
    }
})

let useremailInput = document.getElementById("email")
let useremailLabel = document.querySelector('label[for="email"]')
let useremailHelper = document.getElementById('email-helper')

useremailInput.addEventListener("change", (e) => {
    let valor = e.target.value.trim();

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (valor == "") {
        useremailInput.classList.remove('correct');
        useremailInput.classList.remove('error');
        useremailHelper.classList.remove('visible');
        return;
    }

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
