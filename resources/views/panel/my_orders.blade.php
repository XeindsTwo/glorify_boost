@include('fragments.head', ['title' => 'Мои задания | GlorifyBoost'])
<body class="body">
@include('fragments.header')
<section class="container">
  <div class="panel__inner">
    @include('panel.components.aside')
    <div class="panel__content">
      <div class="panel-head">
        <h1 class="panel-head__title">Мои задания</h1>
        <p class="panel-head__text">
          В данном разделе вы получаете возможность мониторить все свои заказы и быть в курсе текущего состояния
        </p>
        @if($orders->isEmpty())
          <p class="panel-balance__empty">На данный момент у вас ещё нет созданных заданий</p>
        @else
          <table class="table">
            <thead>
            <tr class="table__head">
              <th class="table__id">ID заказа</th>
              <th class="table__date">Дата создания</th>
              <th class="table__link">Ссылка</th>
              <th class="table__price">Цена</th>
              <th>Услуга</th>
              <th>Статус</th>
            </tr>
            </thead>
            <tbody class="table__body">
            @foreach($orders as $order)
              <tr class="table__head table__item">
                <td class="table__id">{{ $order->id }}</td>
                <td class="table__date">{{ $order->created_at->isoFormat('D MMM YYYY') }}</td>
                <td class="table__link">
                  <a href="{{ $order->source_link }}" target="_blank">{{$order->service->name}}</a>
                </td>
                <td class="table__price">{{ number_format($order->total_price, 2, ',', ' ') }} ₽</td>
                <td>
                  <span class="table__service">{{ $order->serviceItem->name }}</span>
                </td>
                <td>{{ $order->status }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        @endif
      </div>
    </div>
  </div>
</section>
</body>
@vite(['resources/js/components/menu.js'])