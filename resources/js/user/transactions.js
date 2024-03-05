import {openModal, closeModal, handleModalClose} from '../components/modal-functions.js';

const cancelButtons = document.querySelectorAll('.panel-balance__btn.cancel-payment-btn');
const modal = document.getElementById('modalCancelPayment');
const modalClose = document.getElementById('modalCancel');

cancelButtons.forEach(button => {
    button.addEventListener('click', () => {
        const transactionId = button.getAttribute('data-transaction-id');
        const userLogin = button.closest('tr').querySelector('td:nth-child(5)').textContent;
        const loginUserSpan = modal.querySelector('#loginUser');
        loginUserSpan.textContent = userLogin;

        openModal(modal);
    });
});

modalClose.addEventListener('click', () => {
    closeModal(modal);
})
handleModalClose(modal);
