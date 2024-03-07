const btnCreate = document.getElementById('btnCreate');
const createServiceForm = document.getElementById('createService');

btnCreate.addEventListener('click', () => {
  createServiceForm.style.display = 'block';
});

document.querySelectorAll('input[data-input-mask="price"]').forEach(function (input) {
  input.addEventListener('input', function () {
    this.value = this.value.replace(/[^\d.]/g, '');
    this.value = this.value.replace(/,/g, '.');
    const decimalIndex = this.value.indexOf('.');
    if (decimalIndex !== -1) {
      this.value = this.value.substring(0, decimalIndex + 2);
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