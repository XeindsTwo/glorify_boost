document.addEventListener('DOMContentLoaded', function () {
    const changeAvatarBtn = document.getElementById('changeAvatarBtn');
    const avatarImage = document.getElementById('avatarImage');

    changeAvatarBtn.addEventListener('click', function () {
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';
        input.onchange = function (e) {
            const file = e.target.files[0];
            const formData = new FormData();
            formData.append('avatar', file);

            fetch('/profile/update-avatar', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
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
                    } else {
                        throw new Error('Ошибка при обновлении аватара');
                    }
                })
                .catch(error => {
                    console.error('Ошибка при отправке запроса:', error);
                    alert('Ошибка при отправке запроса');
                });
        };
        input.click();
    });
});
