@include('fragments.head', ['title' => 'Новый заказ | GlorifyBoost'])
<body class="body">
@include('fragments.header')
<section class="container">
  <div class="panel__inner">
    @include('panel.components.aside')
    <div class="panel__content">
      <div class="panel-head">
        <h1 class="panel-head__title">Оформление заказа</h1>
        <p class="panel-head__text">
          На этой странице вы можете разместить свой заказ
        </p>
        <form class="order" id="createOrder" method="post" action="{{route('order.store')}}">
          @csrf
          <ul class="order__list">
            @foreach($services as $service)
              <li>
                <button class="order__item" data-service-id="{{$service->id}}" type="button">
                  <div class="order__logo">
                    <img src="{{ asset('storage/logos/' . $service->logo) }}" alt="Логотип сервиса">
                  </div>
                  <span class="order__name">{{$service->name}}</span>
                </button>
              </li>
            @endforeach
          </ul>
          <div class="order__services">
            <span class="order__subtitle">Тип услуги</span>
            <div>
              @foreach($services as $service)
                <div class="order__services-list" data-service-id="{{$service->id}}" style="display: none;">
                  @foreach($service->serviceItems as $item)
                    <button class="order__services-btn" type="button"
                            data-item-id="{{$item->id}}"
                            data-price-high="{{$item->price_high}}">{{$item->name}}</button>
                  @endforeach
                </div>
              @endforeach
            </div>
          </div>
          <div class="order__info">
            <span class="order__subtitle">Основная информация</span>
            <ul class="order__info-items">
              <li class="order__info-item">
                <label class="label" for="source_link">Ссылка на страницу, паблик или группу</label>
                <input class="input" id="source_link" name="source_link" type="text" required
                       pattern="https:\/\/.*" title="Укажите корректную ссылку с https протоколом"
                       placeholder="https://t.me/example">
              </li>
              <li class="order__info-item">
                <label class="label" for="quantity">Количество</label>
                <input class="input" id="quantity" name="quantity" min="50" max="13000" type="number" required
                       placeholder="от 50 до 13 000">
              </li>
            </ul>
          </div>
          <input type="hidden" id="total_price" name="total_price" value="0">
          <input type="hidden" name="service_id">
          <input type="hidden" name="service_item_id">
          <button class="order__btn" type="submit">
            Создать заказ — 0₽
          </button>
        </form>
      </div>
    </div>
  </div>
</section>
</body>
@vite(['resources/js/components/menu.js'])
@vite(['resources/js/panel/new-order.js'])