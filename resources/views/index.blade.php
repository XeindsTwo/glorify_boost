@include('fragments/head', ['title' => 'Главная | GlorifyBoost'])
<body class="body">
@include('fragments.header')
@include('home.home')
@include('home.socials')
@include('home.benefits')
@include('home.services')
@include('home.faq')
@include('fragments.cta')
@include('fragments/footer')
@vite(['resources/js/app.js'])
@vite(['resources/js/main.js'])
</body>
