@include('fragments/head', ['title' => 'GlorifyBoost | Редактирование для ' . $service->name])
<body class="body">
@include('fragments.header')
<section class="admin">
  <div class="container container--admin">
    @include('fragments/header-admin')
    <h1 class="admin__title">
      Работа с сервисом {{$service->name}}
      <img width="30" height="30" src="{{ asset('storage/logos/' . $service->logo) }}" alt="Логотип сервиса">
    </h1>
    <form class="admin-service__form" action="{{ route('admin.services.update', ['service' => $service->id]) }}"
          method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <ul class="admin-service__items">
        <li>
          <label class="label" for="name">Название сервиса:</label>
          <input class="input" type="text" id="name" name="name" value="{{ $service->name }}" required>
        </li>
        <li>
          <label class="label" for="logo">Логотип сервиса (необязательно):</label>
          <span class="error" id="maxSizeError">Максимальный вес логотипа 2мб</span>
          <span class="error" id="formatImageError">Разрешен только формат .svg, .png, .jpg и .webp</span>
          <input class="input" type="file" id="logo" name="logo">
        </li>
      </ul>
      <button class="admin-service__save" type="submit">Сохранить изменения</button>
    </form>
    <button class="create" id="btnCreate" type="button">Создать новую услугу</button>
    <form id="createService" action="{{ route('admin.service_items.store') }}" method="POST" style="display: none">
      @csrf
      <input type="hidden" id="service_id" name="service_id" value="{{ $service->id }}">
      <ul class="admin-service__list">
        <li>
          <label class="label" for="name">Название услуги</label>
          <input class="input" type="text" id="name" name="name" required maxlength="255">
        </li>
        <li>
          <label class="label" for="price_low">Цена за низкое качество</label>
          <input class="input" type="number" id="price_low" name="price_low" required min="0.1" max="50000">
        </li>
        <li>
          <label class="label" for="price_medium">Цена за среднее качество</label>
          <input class="input" type="number" id="price_medium" name="price_medium" required min="0.2" max="50000">
        </li>
        <li>
          <label class="label" for="price_high">Цена за высокое качество</label>
          <input class="input" type="number" id="price_high" name="price_high" required min="0.3" max="50000">
        </li>
      </ul>
      <button class="admin-service__btn" type="submit">Создать услугу</button>
    </form>
    @if($serviceItems->isEmpty())
      <p class="admin-service__empty">На данный момент услуг сервиса ещё нет, но вы можете их создать</p>
    @else
      <ul class="list-items">
        @foreach($serviceItems as $serviceItem)
          <li class="list-item" data-service-id="{{ $serviceItem->id }}">
            <div class="list-item__actions">
              <button class="list-item__delete" type="button"
                      data-url="{{ route('admin.service_items.destroy', ['serviceItem' => $serviceItem->id]) }}"
              >
                Удалить услугу
              </button>
              |
              <button class="list-item__edit" type="button">Редактировать услугу</button>
            </div>
            <p class="list-item__name">{{ $serviceItem->name }}</p>
            <div class="list-item__prices">
              <p class="list-item__text">
                Низкая
                <span>{{ number_format($serviceItem->price_low, 1, '.', ' ') }} ₽</span>
              </p>
              <p class="list-item__text">
                Средняя
                <span>{{ number_format($serviceItem->price_medium, 1, '.', ' ') }} ₽</span>
              </p>
              <p class="list-item__text">
                Высокая
                <span>{{ number_format($serviceItem->price_high, 1, '.', ' ') }} ₽</span>
              </p>
            </div>
          </li>
        @endforeach
      </ul>
    @endif
  </div>
</section>
</body>
@vite(['resources/js/service.js'])
<script>
  const editService = async () => {
    const formData = new FormData(document.querySelector('.admin-service__form'));
    try {
      const response = await fetch('{{ route('admin.services.update', ['service' => $service->id]) }}', {
        method: 'POST',
        body: formData
      });
      if (response.ok) {
        const serviceName = document.getElementById('name').value;
        const serviceLogo = document.getElementById('logo');
        let logoSrc = '{{ asset('storage/logos/' . $service->logo) }}';
        if (serviceLogo && serviceLogo.files.length > 0) {
          const maxFileSize = 2 * 1024 * 1024; // 2MB
          const allowedFormats = ['image/svg+xml', 'image/png', 'image/jpeg', 'image/webp'];
          const file = serviceLogo.files[0];
          if (file.size > maxFileSize) {
            document.getElementById('maxSizeError').classList.add('error--active');
            setTimeout(() => {
              document.getElementById('maxSizeError').classList.remove('error--active');
            }, 1500);
            return;
          }
          if (!allowedFormats.includes(file.type)) {
            document.getElementById('formatImageError').classList.add('error--active');
            setTimeout(() => {
              document.getElementById('formatImageError').classList.remove('error--active');
            }, 1500);
            return;
          }
          logoSrc = URL.createObjectURL(file);
        }
        document.querySelector('.admin__title').innerHTML = `
        Работа с сервисом ${serviceName}
        <img width="30" height="30" src="${logoSrc}" alt="Логотип сервиса">
      `;
        alert('Сервис успешно отредактирован');
      } else {
        throw new Error('Ошибка редактирования сервиса');
      }
    } catch (error) {
      console.error(error);
      alert('Произошла ошибка при редактировании сервиса');
    }
  };

  document.querySelector('.admin-service__form').addEventListener('submit', (event) => {
    event.preventDefault();
    editService();
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.list-item__delete');

    deleteButtons.forEach(button => {
      button.addEventListener('click', function () {
        const listItem = button.closest('.list-item');
        const itemName = listItem.querySelector('.list-item__name').textContent;

        if (confirm(`Вы уверены, что хотите удалить услугу "${itemName}"?`)) {
          const url = button.dataset.url;

          fetch(url, {
            method: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
          })
            .then(response => {
              if (response.ok) {
                listItem.remove();
              } else {
                throw new Error('Ошибка удаления элемента');
              }
            })
            .catch(error => {
              console.error(error);
              alert('Произошла ошибка при удалении элемента');
            });
        }
      });
    });
  });
</script>
@vite(['resources/js/components/menu.js'])