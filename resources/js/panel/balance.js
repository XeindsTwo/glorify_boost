document.addEventListener('DOMContentLoaded', async function () {
    const depositForm = document.querySelector('#deposit-form');
    depositForm.addEventListener('submit', async function (event) {
        event.preventDefault();
        const formData = new FormData(depositForm);

        try {
            const response = await fetch(depositForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            const data = await response.json();
            alert('Баланс успешно пополнен на ' + data.amount + ' ₽');
            location.reload();
        } catch (error) {
            console.error('Ошибка:', error);
        }
    });
});
