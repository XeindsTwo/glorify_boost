@include('fragments/head', ['title' => 'GlorifyBoost | Администрирование заданий'])
<body class="body">
@include('fragments.header')
<section class="admin">
  <div class="container container--admin">
    @include('fragments/header-admin')
    <h1 class="admin__title">Администрирование всех заданий</h1>
    @if($orders->isEmpty())
      <p class="panel-balance__empty">На данный момент заказов, созданных пользователями, ещё нет в системе</p>
    @else
      <table class="table">
        <thead>
        <tr class="table__head">
          <th class="table__id">ID заказа</th>
          <th class="table__date">Дата создания</th>
          <th class="table__link">Ссылка</th>
          <th class="table__price">Цена</th>
          <th>Услуга</th>
          <th>Пользователь</th>
          <th class="table__status">Статус</th>
          <th class="table__action">Действие</th>
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
            <td>{{ $order->user->login }}</td>
            <td class="table__status
              @if($order->status === 'В обработке') processing
              @elseif($order->status === 'Отменен') cancelled
              @endif">
              {{ $order->status }}
            </td>
            <td class="table__action">
              @if($order->status !== 'Отменен')
                <button class="table__delete" type="button">Отменить заказ</button>
              @endif
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    @endif
  </div>
</section>
</body>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.table__delete');

    deleteButtons.forEach(button => {
      button.addEventListener('click', function () {
        const orderId = this.closest('.table__item').querySelector('.table__id').textContent;
        const confirmation = confirm('Вы уверены, что хотите отменить заказ #' + orderId + '? Отменить операцию будет невозможно');

        if (confirmation) {
          fetch(`/admin/orders/${orderId}/cancel`, {
            method: 'PUT',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
          })
            .then(response => {
              if (response.ok) {
                alert('Заказ успешно отменен');
                location.reload();
              } else {
                return response.json().then(data => {
                  alert(data.error || 'Ошибка при отмене заказа');
                });
              }
            })
            .catch(error => {
              console.error('Ошибка при выполнении запроса:', error);
              alert('Ошибка при отмене заказа');
            });
        }
      });
    });
  });
</script>
@vite(['resources/js/components/menu.js'])