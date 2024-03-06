import {closeModal, handleModalClose, openModal} from './components/modal-functions.js';

const modalAdd = document.getElementById('modalAddService');
const modalDelete = document.getElementById('modalDeleteService');

const btnCreateService = document.getElementById('btnCreateService');
const btnCloseCreateService = document.getElementById('btnCloseCreateService');
const btnCloseDeleteService = document.getElementById('btnCloseDeleteService');

const modalFormCreate = document.getElementById('modalFormAddService');
const servicesList = document.querySelector('.admin-services__list');

btnCreateService.addEventListener('click', () => {
  openModal(modalAdd);
});
btnCloseCreateService.addEventListener('click', () => {
  closeModal(modalAdd);
});

btnCloseDeleteService.addEventListener('click', () => {
  closeModal(modalDelete);
});

modalFormCreate.addEventListener('submit', async (e) => {
  e.preventDefault();

  const formData = new FormData(modalFormCreate);
  const url = modalFormCreate.getAttribute('action');

  const logoInput = document.getElementById('logo');
  const maxSizeError = document.getElementById('maxSizeError');
  const formatImageError = document.getElementById('formatImageError');

  // очистка ошибки перед каждой отправкой формы
  maxSizeError.classList.remove('error--active');
  formatImageError.classList.remove('error--active');

  const allowedFormats = ['.svg', '.png', '.jpg', '.webp'];
  const fileExtension = logoInput.value.substring(logoInput.value.lastIndexOf('.')).toLowerCase();
  if (!allowedFormats.includes(fileExtension)) {
    formatImageError.classList.add('error--active');
    logoInput.value = '';
    setTimeout(() => {
      formatImageError.classList.remove('error--active');
    }, 2500);
    return;
  }

  if (logoInput.files[0].size > 2 * 1024 * 1024) {
    maxSizeError.classList.add('error--active');
    logoInput.value = '';
    setTimeout(() => {
      maxSizeError.classList.remove('error--active');
    }, 2500);
    return;
  }

  try {
    const response = await fetch(url, {
      method: 'POST',
      body: formData
    });

    if (!response.ok) {
      throw new Error('Ошибка при отправке формы');
    }

    const data = await response.json();
    modalFormCreate.reset();

    const newServiceItem = document.createElement('li');
    newServiceItem.classList.add('admin-services__item');
    newServiceItem.innerHTML = `
      <div class="admin-services__content">
        <div class="admin-services__logo">
          <img src="/storage/logos/${data.service.logo}" alt="Логотип сервиса">
        </div>
        <span>${data.service.name}</span>
      </div>
      <div class="admin-services__actions">
        <button class="admin-services__action edit" type="button">Редактировать</button>
        <button
          class="admin-services__action delete"
          type="button"
          data-service-id="${data.service.id}" // Добавляем атрибут с ID сервиса
          data-service-name="${data.service.name}" // Добавляем атрибут с именем сервиса
        >
          Удалить
        </button>
      </div>
    `;
    servicesList.appendChild(newServiceItem);

    closeModal(modalAdd);
  } catch (error) {
    console.error('Ошибка:', error);
  }
});

servicesList.addEventListener('click', async (e) => {
  if (e.target.classList.contains('delete')) {
    const serviceId = e.target.dataset.serviceId;
    document.getElementById('service').textContent = e.target.dataset.serviceName;
    openModal(modalDelete);

    document.getElementById('btnConfirmDeleteService').addEventListener('click', async () => {
      try {
        const response = await fetch(`/admin/services/${serviceId}`, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          }
        });

        if (!response.ok) {
          throw new Error('Ошибка при удалении сервиса');
        }

        await response.json();
        e.target.closest('.admin-services__item').remove();

        closeModal(modalDelete);
      } catch (error) {
        console.error('Ошибка:', error);
      }
    });
  }
});

handleModalClose(modalAdd);
handleModalClose(modalDelete);