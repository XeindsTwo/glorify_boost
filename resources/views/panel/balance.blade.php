@include('fragments.head', ['title' => 'Пополнение баланса | GlorifyBoost'])
<body class="body">
@include('fragments.header')
<section class="container">
  <div class="panel__inner">
    @include('panel.components.aside')
    <div class="panel__content">
      <div class="panel-head">
        <h1 class="panel-head__title">Пополнение</h1>
        <p class="panel-head__text">
          В данном разделе предоставляются возможности для пополнения баланса,
          отслеживания историй баланса и просто увидеть красоту
        </p>
        <form class="panel-balance__form" id="deposit-form" method="post" action="{{route('deposit')}}">
          @csrf
          <label class="label" for="amount">Сумма для пополнения</label>
          <input class="panel-balance__input input" id="amount" name="amount" min="50" max="30000" step="0.01"
                 type="number" required>
          <button class="panel-head__btn btn" type="submit">Пополнить баланс</button>
        </form>
        @if($transactions->isEmpty())
          <p class="panel-balance__empty">На данный момент пополнений еще не имеется</p>
        @else
          <div>
            <table class="panel-balance__table">
              <thead>
              <tr class="panel-balance__head">
                <th>Идентификатор</th>
                <th>Тип</th>
                <th>Сумма</th>
                <th>Дата</th>
              </tr>
              </thead>
              <tbody class="panel-balance__body">
              @foreach($transactions as $transaction)
                <tr class="panel-balance__head panel-balance__item">
                  <td>{{ $transaction->id }}</td>
                  <td class="panel-balance__type
            @if($transaction->type === 'Пополнение') panel-balance__type--deposit
            @elseif($transaction->type === 'Возврат средств') refund @endif">
                    {{ $transaction->type }}
                  </td>
                  <td>{{number_format($transaction->amount, 2, ',', ' ')}} ₽</td>
                  <td>{{ $transaction->created_at->isoFormat('D MMM YYYY') }}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        @endif
      </div>
    </div>
  </div>
</section>
</body>
@vite(['resources/js/panel/balance.js'])
@vite(['resources/js/components/menu.js'])