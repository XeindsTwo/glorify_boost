import {closeModal, handleModalClose, openModal} from '../../components/modal-functions.js';

const modalUpdateName = document.getElementById('modal-update-name');
const openModalUpdateName = document.getElementById('btn-name');
const closeModalUpdateName = document.getElementById('close-name');
const formUpdateName = document.getElementById('formUpdateName');
const nameInput = document.getElementById('name');
const accountName = document.getElementById('account-name');
const submitButton = document.getElementById('save-edit-name');

openModalUpdateName.addEventListener('click', () => {
  openModal(modalUpdateName);
  checkNameChange();
});

closeModalUpdateName.addEventListener('click', () => {
  closeModal(modalUpdateName);
});

handleModalClose(modalUpdateName);

formUpdateName.addEventListener('submit', function (event) {
  event.preventDefault();

  const formData = new FormData(this);

  fetch(this.action, {
    method: 'POST',
    body: formData
  })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        closeModal(modalUpdateName);
        updateAccountName();
        alert(data.success);
      } else if (data.error) {
        alert(data.error);
      }
    })
    .catch(error => {
      console.error('Ошибка:', error);
    });
});

function updateAccountName() {
  accountName.textContent = nameInput.value;
}

function checkNameChange() {
  const isNameChanged = nameInput.value !== accountName.textContent;
  submitButton.disabled = !isNameChanged;
}

nameInput.addEventListener('input', () => {
  const isNameChanged = nameInput.value !== accountName.textContent;
  submitButton.disabled = !isNameChanged;
})
