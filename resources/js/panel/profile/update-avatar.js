const changeAvatarBtn = document.getElementById('changeAvatarBtn');
const avatarImage = document.getElementById('avatarImage');
const smallAvatarImage = document.getElementById('smallAvatarImage');
const maxSizeError = document.getElementById('maxSizeError');
const formatError = document.getElementById('formatError');
const successText = document.querySelector('.panel-avatar__success');

changeAvatarBtn.addEventListener('click', function () {
  const input = document.createElement('input');
  input.type = 'file';
  input.accept = 'image/*';
  input.onchange = function (e) {
    const file = e.target.files[0];
    if (file) {
      if (file.size > 2 * 1024 * 1024) {
        maxSizeError.classList.add('error--active');
        formatError.classList.remove('error--active');
        setTimeout(function () {
          maxSizeError.classList.remove('error--active');
        }, 1500);
        return;
      }
      if (!['image/jpeg', 'image/png', 'images/webp', 'image/gif'].includes(file.type)) {
        formatError.classList.add('error--active');
        maxSizeError.classList.remove('error--active');
        setTimeout(function () {
          formatError.classList.remove('error--active');
        }, 1500);
        return;
      }

      const formData = new FormData();
      formData.append('avatar', file);

      fetch('/profile/update-avatar', {
        method: 'POST',
        body: formData,
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
      })
        .then(response => {
          if (response.ok) {
            return response.json();
          }
          throw new Error('Ошибка при обновлении аватара');
        })
        .then(data => {
          if (data.success) {
            avatarImage.src = URL.createObjectURL(file);
            smallAvatarImage.src = URL.createObjectURL(file);
            successText.style.display = 'block';
            setTimeout(function () {
              successText.style.display = 'none';
            }, 2000);
          } else {
            throw new Error('Ошибка при обновлении аватара');
          }
        })
        .catch(error => {
          console.error('Ошибка при отправке запроса:', error);
          alert('Ошибка при отправке запроса');
        });
    }
  };
  input.click();
});
