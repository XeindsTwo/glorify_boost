@include('fragments/head', ['title' => 'GlorifyBoost | Работа с транзакциями'])
<body class="body">
@include('fragments.header')
<section class="admin">
  <div class="container container--admin">
    @include('fragments/header-admin')
    <h1 class="admin__title">Работа с транзакциями</h1>
    <form class="admin-users__search" action="#" method="GET" id="searchForm">
      <input class="input" type="text" id="query" name="query" placeholder="Поиск платежа по ID">
    </form>
    @if($transactions->isEmpty())
      <p class="panel-balance__empty">На данный момент пополнений еще не имеется</p>
    @else
      <table class="panel-balance__table">
        <thead>
        <tr class="panel-balance__head admin">
          <th>Идентификатор</th>
          <th>Тип</th>
          <th>Сумма</th>
          <th>Дата пополнения</th>
          <th>Пользователь</th>
          <th>Действия</th>
        </tr>
        </thead>
        <tbody class="panel-balance__body">
        @foreach($transactions as $transaction)
          <tr class="panel-balance__head panel-balance__item admin
        @if($transaction->cancelled) cancelled @endif
        @if($transaction->type === 'Возврат средств') refund @endif">
            <td>{{ $transaction->id }}</td>
            <td class="panel-balance__type
            @if($transaction->type === 'Пополнение') panel-balance__type--deposit
            @elseif($transaction->type === 'Возврат средств') refund @endif">
              {{ $transaction->type }}
            </td>
            <td>{{ number_format($transaction->amount, 2, ',', ' ') }} ₽</td>
            <td>{{ $transaction->created_at->isoFormat('D MMM YYYY') }}</td>
            <td>{{ $transaction->user->login }}</td>
            <td>
              @if(!$transaction->cancelled && $transaction->type !== 'Возврат средств')
                <button class="panel-balance__btn cancel-payment-btn"
                        data-transaction-id="{{ $transaction->id }}"
                        type="button">
                  Отменить платеж
                </button>
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

<div class="modal" id="modalCancelPayment">
  <h3 class="modal__title">Отмена пополнения</h3>
  <p class="modal__text">
    Вы действительно хотите отменить транзакцию у пользователя <span id="loginUser"></span>?
    Отмена приведёт к списанию баланса у пользователя. Отменить действие будет невозможно
  </p>
  <div class="modal__buttons">
    <button class="btn modal__btn--cancel" id="modalCancel" type="button">Закрыть окно</button>
    <button class="btn modal__btn--confirm" id="modalConfirm" type="submit">Подтверждаю</button>
  </div>
</div>
@vite(['resources/js/user/transactions.js'])
