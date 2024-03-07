@include('fragments/head', ['title' => 'Технические шоколадки'])
<body class="body">
@include('fragments.header')
<section class="error-page indent">
  <div class="container">
    <div class="error-page__content">
      <span class="error-page__number">¯\_(ツ)_/¯</span>
      <h1 class="error-page__title">Время ожидания истекло</h1>
      <p class="error-page__text">
        Что-то пошло не так в нашей базе! Наши специалисты уже решают проблему
      </p>
      <a class="error-page__btn btn" href="{{asset(route('index'))}}">На главную</a>
    </div>
  </div>
</section>
@vite(['resources/js/app.js'])
@vite(['resources/js/components/menu.js'])
</body>
