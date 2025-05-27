
  const dias = [
    { id: 'segunda', nome: 'Segunda-feira' },
    { id: 'terca', nome: 'Terça-feira' },
    { id: 'quarta', nome: 'Quarta-feira' },
    { id: 'quinta', nome: 'Quinta-feira' },
    { id: 'sexta', nome: 'Sexta-feira' }
  ];

  const horarios = [];
  for (let hora = 7; hora <= 20; hora++) {
    let hStr = hora < 10 ? `0${hora}:00` : `${hora}:00`;
    horarios.push(hStr);
  }

  const container = document.getElementById('dias-semana');

  dias.forEach(dia => {
    // Criação do checkbox do dia
    const divDia = document.createElement('div');
    divDia.className = 'form-check mt-3';

    const inputDia = document.createElement('input');
    inputDia.type = 'checkbox';
    inputDia.className = 'form-check-input day-check';
    inputDia.id = dia.id;

    const labelDia = document.createElement('label');
    labelDia.className = 'form-check-label';
    labelDia.htmlFor = dia.id;
    labelDia.innerText = dia.nome;

    divDia.appendChild(inputDia);
    divDia.appendChild(labelDia);

    // Criação da div de horários oculta
    const divHorarios = document.createElement('div');
    divHorarios.className = 'ms-4 mt-2 horarios';
    divHorarios.id = `horarios-${dia.id}`;
    divHorarios.style.display = 'none';

    horarios.forEach(horario => {
      const divHora = document.createElement('div');
      divHora.className = 'form-check';

      const inputHora = document.createElement('input');
      inputHora.setAttribute('data-horario', horario);
      inputHora.type = 'checkbox';
      inputHora.className = 'form-check-input';
      inputHora.id = `${dia.id}-${horario.replace(':', '')}`;

      const labelHora = document.createElement('label');
      labelHora.className = 'form-check-label';
      labelHora.htmlFor = inputHora.id;
      labelHora.innerText = horario;

      divHora.appendChild(inputHora);
      divHora.appendChild(labelHora);
      divHorarios.appendChild(divHora);
    });

    container.appendChild(divDia);
    container.appendChild(divHorarios);
  });

  // Lógica de mostrar/ocultar os horários
  document.querySelectorAll('.day-check').forEach(function(dayCheckbox) {
    dayCheckbox.addEventListener('change', function() {
      const horarios = document.getElementById('horarios-' + this.id);
      if (this.checked) {
        horarios.style.display = 'block';
      } else {
        horarios.style.display = 'none';
        horarios.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
      }
    });
  });

document.getElementById('btn-confirmar').addEventListener('click', function() {
  let selecoes = [];

  dias.forEach(dia => {
    const diaCheckbox = document.getElementById(dia.id);
    if (diaCheckbox.checked) {
      const horariosDiv = document.getElementById('horarios-' + dia.id);
      horariosDiv.querySelectorAll('input[type="checkbox"]:checked').forEach(cb => {
        selecoes.push({ dia: dia.nome, horario: cb.dataset.horario });
      });
    }
  });

  if (selecoes.length === 0) {
    alert("Nenhum horário foi selecionado.");
    return;
  }
   // Enviar para o backend com fetch
  fetch('salvarselecoes.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(selecoes) //convertendo para uma string json
  })

  //Bloco que recebe do PHP a resposta se tudo deu certo.
  .then(response => response.text())
  .then(data => {
    alert("Disponibilidade salva com sucesso!");
    console.log(data);
  })
  .catch(error => {
    console.error("Erro ao salvar:", error);
    alert("Erro ao salvar disponibilidade.");
  });


});


function confirmarSaida() {
  return confirm("Tem certeza que deseja sair?");
}
