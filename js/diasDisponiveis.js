
  const horarios = [];
for (let hora = 7; hora <= 20; hora++) {
  let hStr = hora < 10 ? `0${hora}:00` : `${hora}:00`;
  horarios.push(hStr);
}

const container = document.getElementById('horarios-container');

// Criação da lista de horários (aparece somente após a seleção de uma data)
horarios.forEach(horario => {
  const divHora = document.createElement('div');
  divHora.className = 'form-check';

  const inputHora = document.createElement('input');
  inputHora.setAttribute('data-horario', horario);
  inputHora.type = 'checkbox';
  inputHora.className = 'form-check-input horario-check';
  inputHora.id = `horario-${horario.replace(':', '')}`;

  const labelHora = document.createElement('label');
  labelHora.className = 'form-check-label';
  labelHora.htmlFor = inputHora.id;
  labelHora.innerText = horario;

  divHora.appendChild(inputHora);
  divHora.appendChild(labelHora);

  container.appendChild(divHora);
});

// Inicialmente oculta os horários
container.style.display = 'none';

document.getElementById('data-selecionada').addEventListener('change', function() {
  if (this.value) {
    container.style.display = 'block';
  } else {
    container.style.display = 'none';
    container.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
  }
});

document.getElementById('btn-confirmar').addEventListener('click', function() {
  const dataSelecionada = document.getElementById('data-selecionada').value;
  if (!dataSelecionada) {
    alert("Por favor, selecione uma data.");
    return;
  }

  let selecoes = [];

  const [ano, mes, dia] = dataSelecionada.split('-');
  const dataBR = `${dia}/${mes}/${ano}`;

  container.querySelectorAll('input[type="checkbox"]:checked').forEach(cb => {
  selecoes.push({ data: dataBR, horario: cb.dataset.horario });
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
    body: JSON.stringify(selecoes)
  })
  .then(response => response.text())
  .then(data => {
    alert("Disponibilidade salva com sucesso!");
    console.log(data);
    window.location.href = 'sistema.php?msg=sucesso';
  })
  .catch(error => {
    console.error("Erro ao salvar:", error);
    alert("Erro ao salvar disponibilidade.");
  });
});

function confirmarSaida() {
  return confirm("Tem certeza que deseja sair?");
}

// Excluir dias da agenda do médico
document.querySelectorAll('.btn-excluir').forEach(function(button) {
  button.addEventListener('click', function() {
    if (!confirm('Tem certeza que quer excluir?')) return;

    const id = this.getAttribute('data-id');
    const button = this;

    fetch('tratamentoBotaoExcluir.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: 'id=' + encodeURIComponent(id)
    })
    .then(response => response.text())
    .then(data => {
      console.log(data);
      button.closest('tr').remove();
    })
    .catch(error => {
      console.error('Erro:', error);
    });
  });
});

// Excluir tudo
document.querySelectorAll('.btn-excluirTudo').forEach(function(button) {
  button.addEventListener('click', function() {
    if (!confirm('Tem certeza que quer excluir?')) return;

    const id = 7777;
    const button = this;

    fetch('tratamentoBotaoExcluirTudo.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: 'id=' + encodeURIComponent(id)
    })
    .then(response => response.text())
    .then(data => {
      console.log(data);
      window.location.href='sistema.php';
    })
    .catch(error => {
      console.error('Erro:', error);
    });
  });
});
// botao marcar
document.querySelectorAll('.btn-marcar').forEach(function(button) {
  button.addEventListener('click', function() {
    if (!confirm('Tem certeza que quer marcar essa data?')) return;

    const id = this.getAttribute('data-id');
    const button = this;

    fetch('tratamentoBotaoExcluir.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: 'id=' + encodeURIComponent(id)
    })
    .then(response => response.text())
    .then(data => {
      console.log(data);
      button.closest('tr').remove();
    })
    .catch(error => {
      console.error('Erro:', error);
    });
  });
});