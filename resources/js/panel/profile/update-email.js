import {closeModal, handleModalClose, openModal} from '../../components/modal-functions.js';

const modalUpdateEmail = document.getElementById('modal-update-email');
const openModalUpdateEmail = document.getElementById('btn-email');
const closeModalUpdateEmail = document.getElementById('close-email');
const formUpdateEmail = document.getElementById('formUpdateEmail');
const emailInput = document.getElementById('email');
const errorEmail = document.getElementById('error-email');
const accountEmail = document.getElementById('account-email');
const submitButton = document.getElementById('save-edit-email');

openModalUpdateEmail.addEventListener('click', () => {
    openModal(modalUpdateEmail);
    checkEmailChange();
});

closeModalUpdateEmail.addEventListener('click', () => {
    closeModal(modalUpdateEmail);
});

handleModalClose(modalUpdateEmail);

formUpdateEmail.addEventListener('submit', async function (event) {
    event.preventDefault();

    const formData = new FormData(this);
    try {
        const response = await fetch('/check-email-edit-profile', {
            method: 'POST',
            body: formData
        });
        const data = await response.json();

        if (data.exists) {
            errorEmail.classList.add('error--active');
            setTimeout(() => {
                errorEmail.classList.remove('error--active');
            }, 2000);
        } else {
            const updateResponse = await fetch(this.action, {
                method: 'POST',
                body: formData
            });
            const updateData = await updateResponse.json();

            if (updateData.success) {
                closeModal(modalUpdateEmail);
                updateAccountEmail();
                alert(updateData.success);
            } else if (updateData.error) {
                alert(updateData.error);
            }
        }
    } catch (error) {
        console.error('Ошибка:', error);
    }
});

function updateAccountEmail() {
    accountEmail.textContent = emailInput.value;
}

function checkEmailChange() {
    const isEmailChanged = emailInput.value !== accountEmail.textContent;
    submitButton.disabled = !isEmailChanged;
}

emailInput.addEventListener('input', () => {
    const isEmailChanged = emailInput.value !== accountEmail.textContent;
    submitButton.disabled = !isEmailChanged;
});
