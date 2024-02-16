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
@include('fragments/modals')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@vite(['resources/js/app.js'])
@vite(['resources/js/register.js'])
@vite(['resources/js/captcha.js'])
</body>
