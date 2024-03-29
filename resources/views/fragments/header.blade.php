<header class="header">
  <div class="container">
    <div class="header__inner">
      <a href="/" class="logo">
        <img src="{{asset('static/images/icons/logo.svg')}}" alt="">
      </a>
      <nav class="header__nav">
        <ul class="header__list">
          <li>
            <a class="header__link" href="{{route('index')}}#services">Услуги</a>
          </li>
          <li>
            <a class="header__link" href="{{route('index')}}#benefits">Преимущества</a>
          </li>
          <li>
            <a class="header__link" href="{{route('index')}}#faq">FAQ</a>
          </li>
          <li>
            <a class="header__link" href="{{route('index')}}#contacts">Контакты</a>
          </li>
        </ul>
      </nav>
      @if(Auth::check())
        <div class="header__auth">
          <div class="header__balance">
            <span>{{number_format($balance, 2, ',', ' ')}} ₽</span>
            <a class="header__btn-balance btn desktop" href="{{route('balance')}}">Пополнить</a>
          </div>
          <div class="header__actions desktop">
            <a class="header__action header__profile" href="{{ route('profile') }}">
              @if(Auth::user()->avatar)
                <img src="{{ asset('storage/avatars/' . Auth::user()->avatar) }}" width="44" height="44"
                     alt="аватар" id="smallAvatarImage">
              @else
                <img src="{{ asset('static/images/avatar.png') }}" width="44" height="44" alt="аватар"
                     id="smallAvatarImage">
              @endif
            </a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="header__action header__logout" type="submit">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                  <path
                      d="M6.5 16.5H3.16667C2.72464 16.5 2.30072 16.3244 1.98816 16.0118C1.67559 15.6993 1.5 15.2754 1.5 14.8333V3.16667C1.5 2.72464 1.67559 2.30072 1.98816 1.98816C2.30072 1.67559 2.72464 1.5 3.16667 1.5H6.5M12.3333 13.1667L16.5 9M16.5 9L12.3333 4.83333M16.5 9H6.5"
                      stroke="#FE4F4F" stroke-width="1.67" stroke-linecap="round"
                      stroke-linejoin="round"/>
                </svg>
              </button>
            </form>
          </div>
        </div>
      @else
        <button class="header__btn btn" data-modal="auth" data-target="modal-auth" type="button">Войти</button>
      @endif
      <button class="menu-btn">
        <span class="menu-btn__line"></span>
        <span class="sr-only">Взаимодействовать с меню</span>
      </button>
    </div>
  </div>
  <div class="header__menu">
    @if(Auth::check())
    <span class="header__menu-balance">Баланс - {{number_format($balance, 2, ',', ' ')}} ₽</span>
    <a class="header__btn-balance btn" href="{{route('balance')}}">Пополнить счет</a>
    <div class="header__actions">
      <a class="header__action header__profile" href="{{ route('profile') }}">
        @if(Auth::user()->avatar)
          <img src="{{ asset('storage/avatars/' . Auth::user()->avatar) }}" width="56" height="56"
               alt="аватар" id="smallAvatarImage">
        @else
          <img src="{{ asset('static/images/avatar.png') }}" width="56" height="56" alt="аватар"
               id="smallAvatarImage">
        @endif
      </a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="header__action header__logout" type="submit">
          <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
               xmlns="http://www.w3.org/2000/svg">
            <path
                d="M6.5 16.5H3.16667C2.72464 16.5 2.30072 16.3244 1.98816 16.0118C1.67559 15.6993 1.5 15.2754 1.5 14.8333V3.16667C1.5 2.72464 1.67559 2.30072 1.98816 1.98816C2.30072 1.67559 2.72464 1.5 3.16667 1.5H6.5M12.3333 13.1667L16.5 9M16.5 9L12.3333 4.83333M16.5 9H6.5"
                stroke="#FE4F4F" stroke-width="1.67" stroke-linecap="round"
                stroke-linejoin="round"/>
          </svg>
        </button>
      </form>
    </div>
    <nav class="header__nav header__nav--mobile">
      <ul class="header__list">
        <li>
          <a class="header__link" href="{{route('index')}}#services">Услуги</a>
        </li>
        <li>
          <a class="header__link" href="{{route('index')}}#benefits">Преимущества</a>
        </li>
        <li>
          <a class="header__link" href="{{route('index')}}#faq">FAQ</a>
        </li>
        <li>
          <a class="header__link" href="{{route('index')}}#contacts">Контакты</a>
        </li>
      </ul>
    </nav>
    @endif
  </div>
</header>
