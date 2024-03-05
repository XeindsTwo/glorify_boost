@include('fragments.head', ['title' => 'Пополнение баланса | GlorifyBoost'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<body class="body">
@include('fragments.header')
<section class="container">
    <div class="panel__inner">
        @include('panel.components.aside')
        <div class="panel__content">
            <div class="panel-head">
                <h1 class="panel-head__title">Реферальная система</h1>
                <p class="panel-head__text">
                    Приглашайте своих друзей, знакомых или рекламируйте свою ссылку через социальные сети и
                    зарабатывайте деньги.
                </p>
            </div>
            <div class="panel-referrals">
                <ul class="panel-referrals__list">
                    <li class="panel-referrals__item">
                        <span class="panel-referrals__digital">24</span>
                        <span class="panel-referrals__subtext">Всего рефералов</span>
                    </li>
                    <li class="panel-referrals__item">
                        <span class="panel-referrals__digital">12</span>
                        <span class="panel-referrals__subtext">Активных рефералов</span>
                    </li>
                    <li class="panel-referrals__item">
                        <span class="panel-referrals__digital">2 300 ₽</span>
                        <span class="panel-referrals__subtext">Всего заработано</span>
                    </li>
                </ul>
                <div class="panel-referrals__bonuses">
                    <div class="panel-referrals__bonus">1 активный реферал — 5% бонус</div>
                    <div class="panel-referrals__bonus">5 активный реферал — 10% бонус</div>
                    <div class="panel-referrals__bonus">10 активный реферал — 15% бонус</div>
                </div>
                <div class="panel-referrals__link">
                    <h2 class="panel__subtitle">Ваша реферальная ссылка</h2>
                    <p class="panel-referrals__info">
                        Создайте уникальную ссылку, отправьте ее другу в любом мессенджере или поделитесь в соцсетях
                    </p>
                    <div class="panel-referrals__field">
                        https://glorify-boost.ru/?ref=392251
                        <button class="panel-referrals__btn" type="button">
                            <svg id="mySvg" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_664_7203)">
                                    <path
                                        d="M8.33252 10.8333C8.6904 11.3118 9.14699 11.7077 9.67131 11.9941C10.1956 12.2806 10.7754 12.4509 11.3714 12.4936C11.9674 12.5363 12.5655 12.4503 13.1253 12.2415C13.6851 12.0327 14.1935 11.7059 14.6159 11.2833L17.1159 8.78334C17.8748 7.9975 18.2948 6.94499 18.2853 5.85251C18.2758 4.76002 17.8376 3.71497 17.0651 2.94243C16.2926 2.1699 15.2475 1.7317 14.155 1.7222C13.0625 1.71271 12.01 2.13269 11.2242 2.89168L9.79086 4.31668M11.6659 9.16668C11.308 8.68824 10.8514 8.29236 10.3271 8.00589C9.80274 7.71943 9.22293 7.54908 8.62698 7.5064C8.03103 7.46372 7.43287 7.54971 6.87307 7.75853C6.31327 7.96735 5.80493 8.29412 5.38252 8.71668L2.88252 11.2167C2.12353 12.0025 1.70355 13.055 1.71305 14.1475C1.72254 15.24 2.16075 16.2851 2.93328 17.0576C3.70581 17.8301 4.75086 18.2683 5.84335 18.2778C6.93584 18.2873 7.98835 17.8673 8.77419 17.1083L10.1992 15.6833"
                                        stroke="#6D7078" stroke-width="1.66667" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_664_7203">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="panel-referrals__description">
                    <h2 class="panel__subtitle">Описание</h2>
                    <div class="panel-referrals__text">
                        <p>
                            Создайте уникальную ссылку, отправьте ее другу в любом мессенджере или поделитесь
                            в соцсетях. Пришедший друг по вашему приглашению записывается как реферал
                        </p>
                        <p>
                            Посмотреть размер бонусов за приглашение можно в личном кабинете. Доход от пополнений ваших
                            активных рефералов автоматически добавляется на баланс сайта. Активным рефералом считается
                            пользователь, пополнивший баланс сайта на 1000₽
                        </p>
                        <p>
                            Вознаграждение от пополнений реферала высчитывается из количества привлеченных
                            пользователей. Чем больше у тебя активных рефералов — тем больше вознаграждение
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
