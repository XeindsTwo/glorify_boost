const form = document.querySelector('.panel-password__form');
const submitBtn = document.querySelector('.panel-password__btn');
const oldPasswordInput = document.getElementById('old_password');
const newPasswordInput = document.getElementById('new_password');
const repeatPasswordInput = document.getElementById('repeat_password');
const errorNewPassword = document.getElementById('error_new-password');
const errorValidPassword = document.getElementById('error_valid-password');
const errorNotFoundPassword = document.getElementById('error_not_found-password');

newPasswordInput.addEventListener('input', function () {
  if (newPasswordInput.value !== repeatPasswordInput.value) {
    errorNewPassword.classList.add('error--active');
  } else {
    errorNewPassword.classList.remove('error--active');
  }

  if (!/^[a-zA-Z0-9]*$/.test(newPasswordInput.value)) {
    errorValidPassword.classList.add('error--active');
  } else {
    errorValidPassword.classList.remove('error--active');
  }
});

repeatPasswordInput.addEventListener('input', function () {
  if (repeatPasswordInput.value.trim() === '') {
    errorNewPassword.classList.remove('error--active');
  } else {
    if (newPasswordInput.value !== repeatPasswordInput.value) {
      errorNewPassword.classList.add('error--active');
    } else {
      errorNewPassword.classList.remove('error--active');
    }
  }

  updateSubmitButton();
});

function updateSubmitButton() {
  const newPasswordValid = newPasswordInput.value.trim() !== '';
  const repeatPasswordValid = repeatPasswordInput.value.trim() !== '';
  const oldPasswordValid = oldPasswordInput.value.trim() !== '';

  const allFieldsFilled = newPasswordValid && repeatPasswordValid && oldPasswordValid;

  submitBtn.disabled = !allFieldsFilled;
}

form.addEventListener('submit', function (event) {
  event.preventDefault();

  if (newPasswordInput.value !== repeatPasswordInput.value) {
    errorNewPassword.classList.add('error--active');
    return;
  }

  if (!/^[a-zA-Z0-9]*$/.test(newPasswordInput.value)) {
    errorValidPassword.classList.add('error--active');
    return;
  }

  const formData = new FormData(form);

  fetch(form.action, {
    method: 'POST',
    body: formData,
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    }
  })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert(data.success);
        window.location.reload();
      } else {
        if (data.error) {
          if (data.error === 'Неверно введён старый пароль') {
            errorNotFoundPassword.classList.add('error--active');
          }
        }
      }
    })
    .catch(error => {
      console.error('Ошибка при отправке запроса:', error);
      alert('Ошибка при отправке запроса');
    });
});
