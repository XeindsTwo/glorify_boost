<section class="home">
    <div class="container">
        <div class="home__inner">
            <div class="home__content">
                <span class="home__slogan">Лучшее продвижение</span>
                <h1 class="home__title">
                    GlorifyBoost — Самый эффективный способ продвижения соцсетей
                </h1>
                <p class="home__text">
                    Личный SMM менеджер вашего бренда. Доверьте дело профессиональным людям в области накрутки
                </p>
                @if(!\Illuminate\Support\Facades\Auth::check())
                    <div class="home__actions">
                        <button class="btn" type="button" data-modal="register" data-target="modal-register">
                            Зарегистрироваться
                        </button>
                        <button class="btn btn--dark" type="button" data-modal="auth" data-target="modal-auth">Войти
                        </button>
                    </div>
                @else
                    <div class="home__actions">
                        <a class="btn" href="{{route('profile')}}">Начать работу с панелью</a>
                    </div>
                @endif

            </div>
            <img class="home__img" src="{{asset('static/images/home.png')}}" alt="декор">
        </div>
    </div>
</section>
