<div class="modal" id="modal-contact">
    <button class="modal__close" type="button" id="close-contact">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 6L6 18M6 6L18 18" stroke="#545860" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
    </button>
    <span class="modal__title">Контакты</span>
    <p class="modal__text">
        Свяжитесь с нами - наши контактные данные и удобные способы общения.
    </p>
    <div class="modal__support">
        <span>Техническая поддержка:</span>
        <a class="modal__link" href="mailto:info@glorifyboost.ru">info@glorifyboost.ru</a>
    </div>
    <div class="modal__network">
        <span>Написать нам в соц. сетях:</span>
        <ul class="modal__socials">
            <li>
                <a class="modal__social" href="">
                    <img src="{{asset('static/images/icons/telegram.svg')}}" alt="telegram ссылка">
                </a>
            </li>
            <li>
                <a class="modal__social" href="">
                    <img src="{{asset('static/images/icons/vk.svg')}}" alt="vk ссылка">
                </a>
            </li>
            <li>
                <a class="modal__social" href="">
                    <img src="{{asset('static/images/icons/instagram.svg')}}" alt="instagram ссылка">
                </a>
            </li>
            <li>
                <a class="modal__social" href="">
                    <img src="{{asset('static/images/icons/youtube.svg')}}" alt="youtube ссылка">
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="modal" id="modal-register">
    <button class="modal__close" type="button" id="close-register">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 6L6 18M6 6L18 18" stroke="#545860" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
    </button>
    <span class="modal__title modal__title--bottom">Регистрация</span>
    <form class="modal__form" id="formRegister" method="post" action="{{route('register')}}">
        @csrf
        <ul class="modal__list">
            <li>
                <label class="label" for="login">Логин</label>
                <span class="error" id="loginError">Логин не должен иметь запрещенные символы</span>
                <span class="error" id="loginCheckError">Логин уже используется</span>
                <span class="error" id="loginLengthError">Минимальное количество символов - 5</span>
                <span class="error" id="loginMaxError">Максимальное количество символов - 60</span>
                <input class="input" id="login" required type="text" name="login" placeholder="Введите ваш логин">
            </li>
            <li class="auth__item">
                <label class="label" for="name">Имя</label>
                <span class="error" id="nameMinError">Мин. количество символов - 2</span>
                <span class="error" id="nameMaxError">Макс. количество символов - 50</span>
                <span class="error" id="nameError">Имя не должно содержать запрещенные символы</span>
                <input class="input" id="name" required type="text" name="name" placeholder="Введите ваше имя"
                       value="{{ old('name') }}">
            </li>
            <li class="auth__item">
                <label class="label" for="email">Email</label>
                <span class="error" id="emailError">Почта уже используется</span>
                <span class="error" id="emailErrorParameters">Почта не соответствует параметрам</span>
                <span class="error" id="emailLengthError">Макс. количество символов - 80</span>
                <input class="input" id="email" required type="email" name="email" placeholder="Введите ваш email"
                       value="{{ old('email') }}">
            </li>
            <li class="auth__item">
                <label class="label" for="password">Пароль</label>
                <span class="error" id="passwordError">Пароль не должен иметь кириллицу</span>
                <span class="error" id="passwordLengthError">Минимальное количество символов - 8</span>
                <span class="error" id="passwordMaxError">Максимальное количество символов - 60</span>
                <input class="input" id="password" required type="password" placeholder="Введите пароль"
                       name="password">
            </li>
            <li>
                <label class="label" for="captcha">Капча</label>
                <div class="modal__captcha">
                    <img id="captchaImage" src="{{ route('generate-captcha') }}" alt="captcha">
                    <button class="modal__refresh" id="refreshCaptcha" type="button">
                        <svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.6416 10.6084C3.25274 8.32764 4.63581 6.3293 6.55515 4.95392C8.4745 3.57854 10.8114 2.91121 13.1676 3.06564C15.5238 3.22008 17.7535 4.18672 19.4769 5.80086C21.2003 7.41499 22.3107 9.57676 22.6189 11.9178C22.9271 14.2589 22.4141 16.6344 21.1672 18.6396C19.9203 20.6448 18.0167 22.1556 15.7807 22.9146C13.5448 23.6736 11.1148 23.6338 8.90491 22.802C6.69499 21.9703 4.84184 20.398 3.66121 18.3531"
                                stroke="#718BFF" stroke-width="1.3" stroke-linejoin="round"/>
                            <path d="M0.973025 5.76904L2.29381 10.6983L7.22302 9.37748" stroke="#718BFF"
                                  stroke-width="1.3" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
                <span class="error" id="captchaError">Капча была введена неверно, попробуйте снова</span>
                <input class="input" id="captcha" name="captcha" type="text" placeholder="Введите капчу" required>
            </li>
        </ul>
        <button class="modal__btn-auth btn" type="submit">Зарегистрироваться</button>
        <p class="modal__question">
            У вас есть учетная запись?
            <button class="modal__link" type="button" id="btn-auth">
                Войти
            </button>
        </p>
    </form>
</div>

<div class="modal" id="modal-auth">
    <button class="modal__close" type="button" id="close-auth">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 6L6 18M6 6L18 18" stroke="#545860" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
    </button>
    <span class="modal__title modal__title--bottom">Вход</span>
    <form class="modal__form" id="formAuth" method="post" action="{{url('/login')}}">
        @csrf
        <span class="error" id="authError">Неверно введен логин или пароль</span>
        <ul class="modal__list">
            <li>
                <label class="label" for="login">Логин</label>
                <input
                    class="input"
                    id="login"
                    name="login"
                    type="text" required
                    placeholder="Введите свой логин"
                    value="{{ old('login') }}"
                >
            </li>
            <li>
                <label class="label" for="password">Пароль</label>
                <input
                    class="input"
                    id="password"
                    name="password"
                    type="password"
                    required
                    placeholder="••••••••"
                    value="{{ old('password') }}"
                >
            </li>
        </ul>

        <button class="modal__forgot modal__link" type="button" id="btn-forgot">Забыл пароль</button>
        <button class="modal__btn-auth btn" type="submit">Войти</button>
        <p class="modal__question">
            У вас нет учетной записи?
            <button class="modal__link" type="button" id="btn-register">
                Регистрация
            </button>
        </p>
    </form>
</div>
<script>
    document.getElementById('formAuth').addEventListener('submit', async function (event) {
        event.preventDefault();
        const formData = new FormData(this);
        try {
            const response = await fetch('/login', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                location.reload();
            } else {
                const errorSpan = document.getElementById('authError');
                errorSpan.classList.add('error--active');
                setTimeout(function () {
                    errorSpan.classList.remove('error--active');
                }, 2000)

            }
        } catch (error) {
            console.log('Ошибка: ', error);
        }
    });
</script>
