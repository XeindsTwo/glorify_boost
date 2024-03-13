import {closeModal, handleModalClose, openModal} from '../components/modal-functions.js';

const cancelButtons = document.querySelectorAll('.panel-balance__btn.cancel-payment-btn');
const modal = document.getElementById('modalCancelPayment');
const modalClose = document.getElementById('modalCancel');
const modalConfirm = document.getElementById('modalConfirm');

let transactionIdToCancel;
cancelButtons.forEach(button => {
  button.addEventListener('click', () => {
    const transactionId = button.getAttribute('data-transaction-id');
    const userLogin = button.closest('tr').querySelector('td:nth-child(5)').textContent;
    transactionIdToCancel = transactionId;

    const loginUserSpan = modal.querySelector('#loginUser');
    loginUserSpan.textContent = userLogin;

    openModal(modal);
  });
});

modalClose.addEventListener('click', () => {
  closeModal(modal);
});

modalConfirm.addEventListener('click', async () => {
  console.log('transactionIdToCancel:', transactionIdToCancel);

  try {
    const url = `/admin/transactions/${transactionIdToCancel}/cancel`;
    console.log('URL:', url);

    const response = await fetch(url, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
    });

    if (response.ok) {
      const responseData = await response.json();
      closeModal(modal);

      const date = new Date(responseData.refundTransaction.created_at);
      const formattedDate = date.toLocaleDateString('en-US', {day: 'numeric', month: 'short', year: 'numeric'});

      const amount = Number(responseData.refundTransaction.amount);
      const formattedAmount = amount.toLocaleString('ru-RU', {style: 'currency', currency: 'RUB'});

      const newRow = document.createElement('tr');
      newRow.classList.add('panel-balance__head', 'panel-balance__item', 'admin', 'refund');
      newRow.innerHTML = `
        <td>${responseData.refundTransaction.id}</td>
        <td class="panel-balance__type refund">Возврат средств</td>
        <td>${formattedAmount}</td>
        <td>${formattedDate}</td>
        <td>${responseData.refundTransaction.user}</td>
        <td></td>
      `;

      const tbody = document.querySelector('.panel-balance__body');
      tbody.insertBefore(newRow, tbody.firstChild);
    } else {
      console.error('Ошибка при отмене платежа');
    }
  } catch (error) {
    console.error('Ошибка при отмене платежа:', error);
  }
});

handleModalClose(modal);