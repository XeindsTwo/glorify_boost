<section class="cta">
    <div class="container">
        <div class="cta__inner">
            <div class="cta__info">
                <h2 class="cta__title">Присоединяйтесь и продвигайте свои соцсети с нами!</h2>
                <p class="cta__text">
                    Улучшайте видимость и достигайте большего успеха в продвижении своих социальных сетей.
                </p>
            </div>
            @if(!\Illuminate\Support\Facades\Auth::check())
                <button class="btn" type="button" data-modal="register" data-target="modal-register">
                    Зарегистрироваться
                </button>
            @else
                <a class="btn" href="{{route('profile')}}">Перейти в панель</a>
            @endif
        </div>
    </div>
</section>
