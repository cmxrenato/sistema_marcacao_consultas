function confirmarSaida() {
  return confirm("Tem certeza que deseja sair?");
}
// botao marcar
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

