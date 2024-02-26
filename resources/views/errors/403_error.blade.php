@include('fragments/head', ['title' => 'Ошибка доступа'])
<body class="body">
@include('fragments.header')
<section class="error-page indent">
    <div class="container">
        <div class="error-page__content">
            <span class="error-page__number">¯\_(ツ)_/¯</span>
            <h1 class="error-page__title">Доступ запрещен</h1>
            <p class="error-page__text">
                У вас нет необходимых прав для доступа к этой странице
            </p>
            <a class="error-page__btn btn" href="{{asset(route('index'))}}">На главную</a>
        </div>
    </div>
</section>
@vite(['resources/js/app.js'])
</body>
