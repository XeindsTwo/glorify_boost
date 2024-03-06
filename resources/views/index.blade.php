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
@if(!\Illuminate\Support\Facades\Auth::check())
  @include('fragments/modals')
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(!\Illuminate\Support\Facades\Auth::check())
  @vite(['resources/js/app.js'])
  @vite(['resources/js/register.js'])
  @vite(['resources/js/components/captcha.js'])
@endif
@vite(['resources/js/components/menu.js'])
@vite(['resources/js/components/accordion.js'])
</body>
