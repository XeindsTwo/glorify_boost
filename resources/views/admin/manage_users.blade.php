@include('fragments/head', ['title' => 'GlorifyBoost | Управление пользователями'])
<body class="body">
@include('fragments.header')
<section class="admin">
    <div class="container container--admin">
        <div class="admin__management">
            <span class="admin__link active">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13M16 3.13C16.8604 3.3503 17.623 3.8507 18.1676 4.55231C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89317 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7Z"
                        stroke="#6D7078" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Управление пользователями
            </span>
            <a class="admin__link" href="">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.5 7V13C20.5 16.7712 20.5 18.6569 19.3284 19.8284C18.1569 21 16.2712 21 12.5 21H11.5C7.72876 21 5.84315 21 4.67157 19.8284C3.5 18.6569 3.5 16.7712 3.5 13V7M10.5 13.5H13.5C13.9659 13.5 14.1989 13.5 14.3827 13.4239C14.6277 13.3224 14.8224 13.1277 14.9239 12.8827C15 12.6989 15 12.4659 15 12C15 11.5341 15 11.3011 14.9239 11.1173C14.8224 10.8723 14.6277 10.6776 14.3827 10.5761C14.1989 10.5 13.9659 10.5 13.5 10.5H10.5C10.0341 10.5 9.80109 10.5 9.61732 10.5761C9.37229 10.6776 9.17761 10.8723 9.07612 11.1173C9 11.3011 9 11.5341 9 12C9 12.4659 9 12.6989 9.07612 12.8827C9.17761 13.1277 9.37229 13.3224 9.61732 13.4239C9.80109 13.5 10.0341 13.5 10.5 13.5ZM4 7H20C20.9428 7 21.4142 7 21.7071 6.70711C22 6.41421 22 5.94281 22 5C22 4.05719 22 3.58579 21.7071 3.29289C21.4142 3 20.9428 3 20 3H4C3.05719 3 2.58579 3 2.29289 3.29289C2 3.58579 2 4.05719 2 5C2 5.94281 2 6.41421 2.29289 6.70711C2.58579 7 3.05719 7 4 7Z"
                        stroke="#6D7078" stroke-width="1.67" stroke-linecap="round"/>
                </svg>
                Управление заказами
            </a>
            <a class="admin__link" href="{{route('transactions')}}">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M14.1755 4.22225C14.1766 2.99445 11.6731 2 8.58832 2C5.50357 2 3.00224 2.99557 3 4.22225M3 4.22225C3 5.45004 5.50133 6.44449 8.58832 6.44449C11.6753 6.44449 14.1766 5.45004 14.1766 4.22225L14.1766 12.8445M3 4.22225V17.5556C3.00112 18.7834 5.50245 19.7779 8.58832 19.7779C10.0849 19.7779 11.4361 19.5412 12.4387 19.1601M3.00112 8.66672C3.00112 9.89451 5.50245 10.889 8.58944 10.889C11.6764 10.889 14.1778 9.89451 14.1778 8.66672M12.5057 14.6946C11.4976 15.0891 10.115 15.3335 8.58832 15.3335C5.50245 15.3335 3.00112 14.3391 3.00112 13.1113M20.5272 13.4646C22.4909 15.4169 22.4909 18.5836 20.5272 20.5358C18.5635 22.4881 15.3781 22.4881 13.4144 20.5358C11.4507 18.5836 11.4507 15.4169 13.4144 13.4646C15.3781 11.5124 18.5635 11.5124 20.5272 13.4646Z"
                        stroke="#6D7078" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Работа с транзакциями
            </a>
            <a class="admin__link" href="">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_48_14833)">
                        <path
                            d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
                            stroke="#6D7078" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M19.4 15C19.2669 15.3016 19.2272 15.6362 19.286 15.9606C19.3448 16.285 19.4995 16.5843 19.73 16.82L19.79 16.88C19.976 17.0657 20.1235 17.2863 20.2241 17.5291C20.3248 17.7719 20.3766 18.0322 20.3766 18.295C20.3766 18.5578 20.3248 18.8181 20.2241 19.0609C20.1235 19.3037 19.976 19.5243 19.79 19.71C19.6043 19.896 19.3837 20.0435 19.1409 20.1441C18.8981 20.2448 18.6378 20.2966 18.375 20.2966C18.1122 20.2966 17.8519 20.2448 17.6091 20.1441C17.3663 20.0435 17.1457 19.896 16.96 19.71L16.9 19.65C16.6643 19.4195 16.365 19.2648 16.0406 19.206C15.7162 19.1472 15.3816 19.1869 15.08 19.32C14.7842 19.4468 14.532 19.6572 14.3543 19.9255C14.1766 20.1938 14.0813 20.5082 14.08 20.83V21C14.08 21.5304 13.8693 22.0391 13.4942 22.4142C13.1191 22.7893 12.6104 23 12.08 23C11.5496 23 11.0409 22.7893 10.6658 22.4142C10.2907 22.0391 10.08 21.5304 10.08 21V20.91C10.0723 20.579 9.96512 20.258 9.77251 19.9887C9.5799 19.7194 9.31074 19.5143 9 19.4C8.69838 19.2669 8.36381 19.2272 8.03941 19.286C7.71502 19.3448 7.41568 19.4995 7.18 19.73L7.12 19.79C6.93425 19.976 6.71368 20.1235 6.47088 20.2241C6.22808 20.3248 5.96783 20.3766 5.705 20.3766C5.44217 20.3766 5.18192 20.3248 4.93912 20.2241C4.69632 20.1235 4.47575 19.976 4.29 19.79C4.10405 19.6043 3.95653 19.3837 3.85588 19.1409C3.75523 18.8981 3.70343 18.6378 3.70343 18.375C3.70343 18.1122 3.75523 17.8519 3.85588 17.6091C3.95653 17.3663 4.10405 17.1457 4.29 16.96L4.35 16.9C4.58054 16.6643 4.73519 16.365 4.794 16.0406C4.85282 15.7162 4.81312 15.3816 4.68 15.08C4.55324 14.7842 4.34276 14.532 4.07447 14.3543C3.80618 14.1766 3.49179 14.0813 3.17 14.08H3C2.46957 14.08 1.96086 13.8693 1.58579 13.4942C1.21071 13.1191 1 12.6104 1 12.08C1 11.5496 1.21071 11.0409 1.58579 10.6658C1.96086 10.2907 2.46957 10.08 3 10.08H3.09C3.42099 10.0723 3.742 9.96512 4.0113 9.77251C4.28059 9.5799 4.48572 9.31074 4.6 9C4.73312 8.69838 4.77282 8.36381 4.714 8.03941C4.65519 7.71502 4.50054 7.41568 4.27 7.18L4.21 7.12C4.02405 6.93425 3.87653 6.71368 3.77588 6.47088C3.67523 6.22808 3.62343 5.96783 3.62343 5.705C3.62343 5.44217 3.67523 5.18192 3.77588 4.93912C3.87653 4.69632 4.02405 4.47575 4.21 4.29C4.39575 4.10405 4.61632 3.95653 4.85912 3.85588C5.10192 3.75523 5.36217 3.70343 5.625 3.70343C5.88783 3.70343 6.14808 3.75523 6.39088 3.85588C6.63368 3.95653 6.85425 4.10405 7.04 4.29L7.1 4.35C7.33568 4.58054 7.63502 4.73519 7.95941 4.794C8.28381 4.85282 8.61838 4.81312 8.92 4.68H9C9.29577 4.55324 9.54802 4.34276 9.72569 4.07447C9.90337 3.80618 9.99872 3.49179 10 3.17V3C10 2.46957 10.2107 1.96086 10.5858 1.58579C10.9609 1.21071 11.4696 1 12 1C12.5304 1 13.0391 1.21071 13.4142 1.58579C13.7893 1.96086 14 2.46957 14 3V3.09C14.0013 3.41179 14.0966 3.72618 14.2743 3.99447C14.452 4.26276 14.7042 4.47324 15 4.6C15.3016 4.73312 15.6362 4.77282 15.9606 4.714C16.285 4.65519 16.5843 4.50054 16.82 4.27L16.88 4.21C17.0657 4.02405 17.2863 3.87653 17.5291 3.77588C17.7719 3.67523 18.0322 3.62343 18.295 3.62343C18.5578 3.62343 18.8181 3.67523 19.0609 3.77588C19.3037 3.87653 19.5243 4.02405 19.71 4.21C19.896 4.39575 20.0435 4.61632 20.1441 4.85912C20.2448 5.10192 20.2966 5.36217 20.2966 5.625C20.2966 5.88783 20.2448 6.14808 20.1441 6.39088C20.0435 6.63368 19.896 6.85425 19.71 7.04L19.65 7.1C19.4195 7.33568 19.2648 7.63502 19.206 7.95941C19.1472 8.28381 19.1869 8.61838 19.32 8.92V9C19.4468 9.29577 19.6572 9.54802 19.9255 9.72569C20.1938 9.90337 20.5082 9.99872 20.83 10H21C21.5304 10 22.0391 10.2107 22.4142 10.5858C22.7893 10.9609 23 11.4696 23 12C23 12.5304 22.7893 13.0391 22.4142 13.4142C22.0391 13.7893 21.5304 14 21 14H20.91C20.5882 14.0013 20.2738 14.0966 20.0055 14.2743C19.7372 14.452 19.5268 14.7042 19.4 15Z"
                            stroke="#6D7078" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_48_14833">
                            <rect width="24" height="24" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
                Редактирование новых заказов
            </a>
        </div>
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
                            <button class="admin-users__action admin-users__action--reset" type="button">Сбросить
                                пароль
                            </button>
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
            <li class="modal__item">
                <label class="label" for="name">Имя</label>
                <span class="error" id="nameError">Имя не должно содержать запрещенные символы</span>
                <span class="error" id="nameMinError">Мин. количество символов - 2</span>
                <span class="error" id="nameMaxError">Макс. количество символов - 50</span>
                <input class="input" type="text" id="name" name="name" required placeholder="Введите имя">
            </li>
            <li class="modal__item">
                <label class="label" for="login">Логин</label>
                <span class="error" id="loginCheckError">Логин уже используется</span>
                <span class="error" id="loginError">Логин не должен иметь запрещенные символы</span>
                <span class="error" id="loginLengthError">Минимальное количество символов - 5</span>
                <span class="error" id="loginMaxError">Максимальное количество символов - 60</span>
                <input class="input" type="text" id="login" name="login" required placeholder="Введите логин">
            </li>
            <li class="modal__item">
                <label class="label" for="email">Почта</label>
                <span class="error" id="emailCheckError">Почта уже используется</span>
                <span class="error" id="emailErrorParameters">Почта не соответствует параметрам</span>
                <span class="error" id="emailLengthError">Макс. количество символов - 80</span>
                <input class="input" type="email" id="email" name="email" required placeholder="Введите почту">
            </li>
            <li class="modal__item">
                <label class="label" for="password">Пароль</label>
                <span class="error" id="passwordError">Пароль не должен иметь кириллицу</span>
                <span class="error" id="passwordLengthError">Минимальное количество символов - 8</span>
                <span class="error" id="passwordMaxError">Максимальное количество символов - 60</span>
                <input class="input" type="password" id="password" name="password" required
                       placeholder="Введите пароль">
            </li>
            <li class="modal__item">
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
