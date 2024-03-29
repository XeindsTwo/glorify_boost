@include('fragments/head', ['title' => 'GlorifyBoost | Управление пользователями'])
<body class="body">
@include('fragments.header')
<section class="admin">
  <div class="container container--admin">
    @include('fragments/header-admin')
    <h1 class="admin__title">Управление пользователями</h1>
    <button class="admin-users__btn" id="createUserBtn" type="button">Создать пользователя</button>
    <form class="admin-users__search" action="#" method="GET" id="searchForm">
      <input class="input" type="text" id="query" name="query" placeholder="Поиск по логину, имени или почте">
    </form>
    <ul class="admin-users__list" id="userListContainer">
      @foreach($users as $user)
        <li class="admin-users__item" data-user-id="{{$user->id}}">
          <p class="admin-users__login"><span>{{$user->login}}</span></p>
          @if($user->id !== auth()->id())
            <a class="admin-users__edit" href="{{route('admin.users.edit', ['user' => $user])}}">
              Редактировать
            </a>
          @endif
          <div class="admin-users__content">
            <p>Имя: {{$user->name}}</p>
            <p>Почта: {{$user->email}}</p>
            <p>Роль: {{$user->role}}</p>
          </div>
          @if($user->id !== auth()->id())
            <div class="admin-users__actions">
              <button class="admin-users__action admin-users__action--delete" type="button"
                      data-user-id="{{$user->id}}">
                Удалить аккаунт
              </button>
            </div>
          @endif
        </li>
      @endforeach
    </ul>
  </div>
</section>
</body>
<div class="modal modal--long" id="modalAddUser">
  <button class="modal__close" id="modalCloseAddUser" type="button"></button>
  <h3 class="modal__title modal__title--bottom">Создание пользователя</h3>
  <form action="{{ route('admin.users.store') }}" id="userForm" method="POST">
    @csrf
    <ul class="modal__list modal__list--grid">
      <li>
        <label class="label" for="name">Имя</label>
        <span class="error" id="nameError">Имя не должно содержать запрещенные символы</span>
        <span class="error" id="nameMinError">Мин. количество символов - 2</span>
        <span class="error" id="nameMaxError">Макс. количество символов - 50</span>
        <input class="input" type="text" id="name" name="name" required placeholder="Введите имя">
      </li>
      <li>
        <label class="label" for="login">Логин</label>
        <span class="error" id="loginCheckError">Логин уже используется</span>
        <span class="error" id="loginError">Логин не должен иметь запрещенные символы</span>
        <span class="error" id="loginLengthError">Минимальное количество символов - 5</span>
        <span class="error" id="loginMaxError">Максимальное количество символов - 60</span>
        <input class="input" type="text" id="login" name="login" required placeholder="Введите логин">
      </li>
      <li>
        <label class="label" for="email">Почта</label>
        <span class="error" id="emailCheckError">Почта уже используется</span>
        <span class="error" id="emailErrorParameters">Почта не соответствует параметрам</span>
        <span class="error" id="emailLengthError">Макс. количество символов - 80</span>
        <input class="input" type="email" id="email" name="email" required placeholder="Введите почту">
      </li>
      <li>
        <label class="label" for="password">Пароль</label>
        <span class="error" id="passwordError">Пароль не должен иметь кириллицу</span>
        <span class="error" id="passwordLengthError">Минимальное количество символов - 8</span>
        <span class="error" id="passwordMaxError">Максимальное количество символов - 60</span>
        <input class="input" type="password" id="password" name="password" required
               placeholder="Введите пароль">
      </li>
      <li>
        <label class="label" for="password">Роль</label>
        <select class="select" id="role" name="role">
          <option value="USER" {{ old('role') === 'USER' ? 'selected' : '' }}>Пользователь</option>
          <option value="ADMIN" {{ old('role') === 'ADMIN' ? 'selected' : '' }}>Администратор</option>
        </select>
      </li>
    </ul>
    <button class="modal__btn btn" id="createBtnUser" type="submit">Создать пользователя</button>
  </form>
</div>
<div class="modal" id="modalDeleteUser">
  <button class="modal__close" id="modalCloseDeleteUser" type="button"></button>
  <h3 class="modal__title">Удаление пользователя</h3>
  <p class="modal__text">
    Вы действительно хотите удалить пользователя <span id="loginDeleteUser"></span>? Удаление приведет к удалению
    всех его заказов и информации, а также возможно к уничтожению данных о транзакциях
  </p>
  <div class="modal__buttons">
    <button class="btn modal__btn--cancel" id="modalCancelDeleteUser" type="button">Отменить</button>
    <button class="btn modal__btn--confirm" id="confirmDeleteUser" type="submit">Да, удалить</button>
  </div>
</div>
@vite(['resources/js/components/custom-select.js'])
@vite(['resources/js/user.js?type=module'])
@vite(['resources/js/components/menu.js'])