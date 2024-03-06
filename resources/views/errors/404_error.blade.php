@include('fragments/head', ['title' => 'Страница не найдена'])
<body class="body">
@include('fragments.header')
<section class="error-page indent">
  <div class="container">
    <div class="error-page__content">
      <span class="error-page__number">¯\_(ツ)_/¯</span>
      <h1 class="error-page__title">Страница не найдена</h1>
      <p class="error-page__text">
        Возможно, она удалена или был введен неправильный адрес
      </p>
      <a class="error-page__btn btn" href="{{asset(route('index'))}}">На главную</a>
    </div>
  </div>
</section>
@vite(['resources/js/app.js'])
</body>
