const orderItems = document.querySelectorAll('.order__item');
const serviceButtons = document.querySelectorAll('.order__services-btn');
const variantSelect = document.querySelector('.order__variants-select');
const quantityInput = document.getElementById('quantity');
const totalPriceInput = document.getElementById('total_price');
const orderButton = document.querySelector('.order__btn');

function updatePricesInSelect(serviceId) {
  const servicePrices = document.querySelector(`.order__variants-items[data-service-id="${serviceId}"]`);
  if (servicePrices) {
    const prices = servicePrices.querySelectorAll('.order__variants-btn');
    variantSelect.innerHTML = '';
    prices.forEach(priceBtn => {
      const option = document.createElement('option');
      option.value = priceBtn.getAttribute('data-price');
      option.textContent = priceBtn.textContent.trim();
      variantSelect.appendChild(option);
    });
  }
}

function updateTotalPrice() {
  const activeServiceList = document.querySelector('.order__services-list[style*="display: flex"]');
  if (!activeServiceList) return;

  const selectedServiceId = activeServiceList.getAttribute('data-service-id');
  const activeServiceButton = activeServiceList.querySelector('.order__services-btn.active');
  if (!activeServiceButton) return;

  const selectedServiceItemId = activeServiceButton.getAttribute('data-item-id');
  const selectedServicePrice = parseFloat(activeServiceButton.getAttribute('data-price-high'));
  const quantity = parseFloat(quantityInput.value);
  const totalPrice = selectedServicePrice * quantity;

  totalPriceInput.value = totalPrice.toFixed(2) + '₽';
  orderButton.textContent = `Создать заказ — ${totalPrice.toFixed(2)}₽`;
  document.querySelector('input[name="service_id"]').value = selectedServiceId;
  document.querySelector('input[name="service_item_id"]').value = selectedServiceItemId;
}

if (orderItems.length > 0) {
  orderItems[0].classList.add('active');
  const firstServiceId = orderItems[0].getAttribute('data-service-id');
  const firstServiceList = document.querySelector(`.order__services-list[data-service-id="${firstServiceId}"]`);
  if (firstServiceList) {
    firstServiceList.style.display = 'flex';
    updatePricesInSelect(firstServiceId);
  }

  orderItems.forEach(function (item) {
    item.addEventListener('click', function () {
      const serviceId = this.getAttribute('data-service-id');
      const serviceList = document.querySelector(`.order__services-list[data-service-id="${serviceId}"]`);

      orderItems.forEach(function (item) {
        item.classList.remove('active');
      });
      this.classList.add('active');

      serviceButtons.forEach(function (btn) {
        btn.classList.remove('active');
      });

      serviceButtons.forEach(function (btn) {
        if (btn.getAttribute('data-service-id') === serviceId) {
          btn.classList.add('active');
        }
      });

      document.querySelectorAll('.order__services-list').forEach(function (list) {
        if (list !== serviceList) {
          list.style.display = 'none';
        }
      });

      if (serviceList) {
        serviceList.style.display = 'flex';

        const firstButton = serviceList.querySelector('.order__services-btn');
        if (firstButton) {
          firstButton.classList.add('active');
        }
      }

      updatePricesInSelect(serviceId);
    });
  });
}

if (serviceButtons.length > 0) {
  serviceButtons.forEach(function (button) {
    button.addEventListener('click', function () {
      const serviceId = this.getAttribute('data-service-id');
      const serviceList = document.querySelector(`.order__services-list[data-service-id="${serviceId}"]`);

      serviceButtons.forEach(function (btn) {
        btn.classList.remove('active');
      });

      this.classList.add('active');

      if (serviceList) {
        serviceList.style.display = 'flex';
      }

      updatePricesInSelect(serviceId);
      if (quantityInput.value !== '') {
        updateTotalPrice();
      }
    });
  });
}

quantityInput.addEventListener('input', updateTotalPrice);

const submitForm = document.getElementById('createOrder');
submitForm.addEventListener('submit', async (event) => {
  event.preventDefault();
  const formData = new FormData(submitForm);

  try {
    const response = await fetch(submitForm.action, {
      method: 'POST',
      body: formData,
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
      },
    });

    if (response.ok) {
      window.location.href = 'http://127.0.0.1:8000/my-orders';
    } else if (response.status === 400) {
      const responseData = await response.json();
      alert(responseData.message);
    } else {
      console.error('Ошибка при создании заказа:', response.statusText);
    }
  } catch (error) {
    console.error('Ошибка при выполнении запроса:', error.message);
  }
});