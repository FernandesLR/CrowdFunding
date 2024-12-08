document.addEventListener('DOMContentLoaded', function () {
    const cadastroBtn = document.getElementById('cadastro-btn');
    const modal = document.getElementById('email-modal');
    const overlay = document.getElementById('modal-overlay');
    const closeModal = document.getElementById('close-modal');
    const form = document.querySelector('form');

    cadastroBtn.addEventListener('click', function () {
        const action = "<?php echo $_GET['action'] ?? ''; ?>";
        if (action === 'cadastro') {
            // Verifica se o formulário está válido
            if (form.checkValidity()) {
                // Exibe o modal
                modal.style.display = 'block';
                overlay.style.display = 'block';
            } else {
                // Se não estiver válido, exibe as mensagens de erro nativas do navegador
                form.reportValidity();
            }
        } else {
            // Submete o formulário normalmente
            form.submit();
        }
    });

    closeModal.addEventListener('click', function () {
        // Fecha o modal
        modal.style.display = 'none';
        overlay.style.display = 'none';
    });

    overlay.addEventListener('click', function () {
        // Fecha o modal ao clicar no overlay
        modal.style.display = 'none';
        overlay.style.display = 'none';
    });
});