import {closeModal, handleModalClose, openModal} from './components/modal-functions.js';

const btnCreate = document.getElementById('btnCreate');
const createServiceForm = document.getElementById('createService');
const modal = document.getElementById('modalEdit');
const btnCloseModal = document.getElementById('btnCloseModalEdit');
const editButtons = document.querySelectorAll('.list-item__edit');

btnCreate.addEventListener('click', () => {
  createServiceForm.style.display = 'block';
});

document.querySelectorAll('input[data-input-mask="price"]').forEach(function (input) {
  input.addEventListener('input', function () {
    this.value = this.value
      .replace(/[^\d.]/g, '')
      .replace(/,/g, '.');

    const decimalIndex = this.value.indexOf('.');
    if (decimalIndex !== -1) {
      const parts = this.value.split('.');
      if (parts[1].length > 2) {
        parts[1] = parts[1].slice(0, 2);
        this.value = parts.join('.');
      }
    }
  });

  input.addEventListener('keydown', function (event) {
    if (event.keyCode === 188) {
      event.preventDefault();
      this.value += '.';
    }

    const dotCount = (this.value.match(/\./g) || []).length;
    if (dotCount >= 1 && event.keyCode === 190) {
      event.preventDefault();
    }
  });
});

editButtons.forEach(button => {
  button.addEventListener('click', function () {
    const serviceItemId = button.dataset.serviceId;
    const name = button.dataset.name;
    const priceLow = button.dataset.priceLow;
    const priceMedium = button.dataset.priceMedium;
    const priceHigh = button.dataset.priceHigh;

    document.getElementById('serviceItemId').value = serviceItemId;
    document.getElementById('name_edit').value = name;
    document.getElementById('price_low_edit').value = priceLow;
    document.getElementById('price_medium_edit').value = priceMedium;
    document.getElementById('price_high_edit').value = priceHigh;

    openModal(modal);
  });
});

document.getElementById('modalForm').addEventListener('submit', function (event) {
  event.preventDefault();

  const serviceItemId = document.getElementById('serviceItemId').value;
  const formData = {
    name: document.getElementById('name_edit').value,
    price_low: document.getElementById('price_low_edit').value,
    price_medium: document.getElementById('price_medium_edit').value,
    price_high: document.getElementById('price_high_edit').value
  };

  fetch(`/admin/service-items/${serviceItemId}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify(formData)
  })
    .then(response => response.json())
    .then(data => {
      console.log(data);
      closeModal(modal);
      alert('Редактирование было успешно выполнено');
      location.reload();
    })
    .catch(error => {
      console.error('Ошибка при обновлении элемента:', error);
      alert('Произошла ошибка при обновлении элемента');
    });
});

btnCloseModal.addEventListener('click', () => {
  closeModal(modal);
});

handleModalClose(modal);