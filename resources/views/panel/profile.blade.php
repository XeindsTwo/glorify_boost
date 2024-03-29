@include('fragments.head', ['title' => 'Профиль | GlorifyBoost'])
<body class="body">
@include('fragments.header')
<section class="container">
  <div class="panel__inner">
    @include('panel.components.aside')
    <div class="panel__content">
      <div class="panel-head">
        <h1 class="panel-head__title">Настройки</h1>
        <p class="panel-head__text panel-head__text--bottom">
          В данном разделе предоставляются возможности для настройки имени, изменения пароля и других
          параметров.
        </p>
      </div>
      <div class="panel-avatar">
        <h2 class="panel__subtitle">Аватарка профиля</h2>
        <p class="panel-avatar__success">Аватар успешно обновлен!</p>
        <span class="error" id="maxSizeError">Максимальный вес аватара составляет 2мб</span>
        <span class="error" id="formatError">Разрешен только формат JPG, PNG, WEBP, GIF формата</span>
        <form class="panel-avatar__avatar">
          @csrf
          @if(Auth::user()->avatar)
              <?php $avatarPath = asset('storage/avatars/' . Auth::user()->avatar) ?>
            <img class="panel-avatar__img" src="{{ $avatarPath }}" width="64" height="64"
                 alt="аватар пользователя" id="avatarImage">
          @else
              <?php $avatarPath = asset('static/images/avatar.png') ?>
            <img class="panel-avatar__img" src="{{ $avatarPath }}" width="64" height="64"
                 alt="аватар пользователя" id="avatarImage">
          @endif
          <button class="panel-avatar__change" id="changeAvatarBtn" type="button">
            Загрузить <br> новую фотографию
          </button>
        </form>
      </div>
      <div class="panel-data">
        <h3 class="panel__subtitle">Информация аккаунта</h3>
        <ul class="panel-data__list">
          <li class="panel-data__item">
            <span class="panel-data__name">ID аккаунта</span>
            <span class="panel-data__text">{{Auth::user()->id}}</span>
          </li>
          <li class="panel-data__item">
            <span class="panel-data__name">Логин</span>
            <span class="panel-data__text">{{Auth::user()->login}}</span>
          </li>
          <li class="panel-data__item">
            <span class="panel-data__name">Имя</span>
            <span class="panel-data__text" id="account-name">{{Auth::user()->name}}</span>
            <button class="panel-data__change" type="button" id="btn-name">Изменить</button>
          </li>
          <li class="panel-data__item">
            <span class="panel-data__name">Почта</span>
            <span class="panel-data__text" id="account-email">{{Auth::user()->email}}</span>
            <button class="panel-data__change" type="button" id="btn-email">Изменить</button>
          </li>
        </ul>
      </div>
      <div class="panel-password">
        <h3 class="panel__subtitle">Изменить пароль</h3>
        <form class="panel-password__form" action="{{route('profile.update-password')}}" method="post">
          @csrf
          <div class="panel-password__item">
            <label class="label" for="old_password">Старый пароль</label>
            <span class="error" id="error_not_found-password">Неверно введён старый пароль</span>
            <input class="input" type="password" id="old_password" name="old_password"
                   required placeholder="Введите пароль">
          </div>
          <div class="panel-password__item">
            <label class="label" for="new_password">Новый пароль</label>
            <span class="error" id="error_new-password">Пароли не совпадают</span>
            <span class="error" id="error_valid-password">Пароли может содержать только латиницу и цифры</span>
            <span class="error" id="error_old-password">Новый пароль не должен быть похож на старый</span>
            <span class="error" id="passwordError">Пароль не должен иметь кириллицу</span>
            <input class="input" type="password" id="new_password" name="new_password"
                   required minlength="8" maxlength="60" placeholder="Введите пароль">
          </div>
          <div class="panel-password__item">
            <label class="label" for="repeat_password">Повторите пароль</label>
            <input class="input" type="password" id="repeat_password" name="repeat_password"
                   required placeholder="Введите пароль">
          </div>
          <button class="panel-password__btn btn" disabled type="submit">Сохранить изменения</button>
        </form>
      </div>
    </div>
  </div>
</section>
<div class="modal" id="modal-update-name">
  <button class="modal__close" type="button" id="close-name">
  </button>
  <span class="modal__title modal__title--bottom">Изменение имени</span>
  <form class="modal__form" id="formUpdateName" method="post" action="{{route('profile.update-name')}}">
    @csrf
    <ul class="modal__list">
      <li class="auth__item">
        <label class="label" for="name">Имя</label>
        <input class="input" id="name" required
               minlength="2" maxlength="50"
               type="text" name="name"
               placeholder="Введите ваше имя"
               pattern="[A-Za-zА-Яа-яЁё\-]+"
               value="{{ Auth::user()->name }}"
               title="Имя не должно содержать специальные символы, кроме дефиса"
        >
      </li>
    </ul>
    <button class="modal__btn-auth btn" id="save-edit-name" type="submit">Сохранить изменения</button>
  </form>
</div>
<div class="modal" id="modal-update-email">
  <button class="modal__close" type="button" id="close-email">
  </button>
  <span class="modal__title modal__title--bottom">Изменение почты</span>
  <form class="modal__form" id="formUpdateEmail" method="post" action="{{route('profile.update-email')}}">
    @csrf
    <span class="error" id="error-email">Данный email уже занят другим пользователем</span>
    <ul class="modal__list">
      <li class="auth__item">
        <label class="label" for="email">Email</label>
        <input class="input" type="email" required
               maxlength="50"
               id="email" name="email"
               placeholder="Введите вашу почту"
               value="{{ Auth::user()->email }}"
        >
      </li>
    </ul>
    <button class="modal__btn-auth btn" id="save-edit-email" type="submit">Сохранить изменения</button>
  </form>
</div>
</body>
@vite(['resources/js/panel/profile/update-name.js'])
@vite(['resources/js/panel/profile/update-email.js'])
@vite(['resources/js/panel/profile/update-avatar.js'])
@vite(['resources/js/panel/profile/update-password.js'])
@vite(['resources/js/components/menu.js'])