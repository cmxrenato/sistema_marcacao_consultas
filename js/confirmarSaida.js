function confirmarSaida() {
  return confirm("Tem certeza que deseja sair?");
}
// botão marcar
document.querySelectorAll('.btn-marcar').forEach(function(button) {
  button.addEventListener('click', function() {
    if (!confirm('Tem certeza que quer marcar essa data?')) return;

    const id = this.getAttribute('data-id');
    const button = this;

    fetch('tratamentoBotaoMarcar.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: 'id=' + encodeURIComponent(id)
    })
    .then(response => {
      if (!response.ok) throw new Error('Erro na rede');
      return response.text();
    })
    .then(data => {
      console.log(data);
      button.closest('tr').remove();
      // Redireciona após 1 segundo (opcional)
      setTimeout(() => {
        window.location.href = 'sistemacliente.php';
      }, 1000);
    })
    .catch(error => {
      console.error('Erro:', error);
      alert('Ocorreu um erro ao marcar a consulta');
    });
  });
});
