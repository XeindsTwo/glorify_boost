@include('fragments/head', ['title' => 'GlorifyBoost | Редактирование для заказов'])
<body class="body">
@include('fragments.header')
<section class="admin">
  <div class="container container--admin">
    @include('fragments/header-admin')
    <h1 class="admin__title">Работа с сервисами</h1>
    <button class="admin-services__create" id="btnCreateService" type="button">Создать сервис</button>
    @if($services->isEmpty())
      <p class="panel-balance__empty">На данный момент сервисов ещё нет, но вы можете их создать</p>
    @else
      <ul class="admin-services__list">
        @foreach($services as $service)
          <li class="admin-services__item">
            <div class="admin-services__content">
              <div class="admin-services__logo">
                <img src="{{ asset('storage/logos/' . $service->logo) }}" alt="Логотип сервиса">
              </div>
              {{$service->name}}
            </div>
            <div class="admin-services__actions">
              <button class="admin-services__action edit" type="button">Редактировать</button>
              <button
                  class="admin-services__action delete"
                  type="button"
                  data-service-id="{{ $service->id }}"
                  data-service-name="{{ $service->name }}"
              >
                Удалить
              </button>
            </div>
          </li>
        @endforeach
      </ul>
    @endif
  </div>
</section>
</body>

<div class="modal" id="modalAddService">
  <h3 class="modal__title modal__title--bottom">Добавление сервиса</h3>
  <form class="modal__form" id="modalFormAddService" method="post" action="{{ route('admin.services.create') }}">
    <button class="modal__close" id="btnCloseCreateService" type="button"></button>
    @csrf
    <div class="modal__list">
      <div class="admin-edit__item">
        <label for="name">Название сервиса</label>
        <input class="input" type="text" id="name" maxlength="255" name="name" required>
      </div>
      <div class="admin-edit__item">
        <label for="logo">Логотип сервиса</label>
        <div class="admin-services__errors">
          <span class="error" id="maxSizeError">Максимальный вес логотипа 2мб</span>
          <span class="error" id="formatImageError">Разрешен только формат .svg, .png, .jpg и .webp</span>
        </div>
        <input class="input" type="file" id="logo" name="logo" accept=".svg,.png,.jpg,.webp" required>
      </div>
    </div>
    <button class="btn" type="submit">Добавить сервис</button>
  </form>
</div>

<div class="modal" id="modalDeleteService">
  <h3 class="modal__title modal__title--bottom">Удаление сервиса</h3>
  <p class="modal__text">
    Вы действительно хотите удалить сервис <span id="service"></span>? Удаление приведет к удалению
    всех заказов (относящиеся к данному сервису), отменить действие будет невозможно
  </p>
  <div class="modal__buttons">
    <button class="btn modal__btn--cancel" id="btnCloseDeleteService" type="button">Отменить</button>
    <button class="btn modal__btn--confirm" id="btnConfirmDeleteService" type="submit">Да, удалить</button>
  </div>
</div>

@vite(['resources/js/services.js'])