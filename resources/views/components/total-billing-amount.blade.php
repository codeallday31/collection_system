<div {{ $attributes->merge(['class' => 'col-md-6 text-right']) }}>
    <p class="{{ isset($paymentUpdate) ? 'h3' : 'h1'}} font-weight-bold text-uppercase">Total {{ $paymentUpdate ?? 'Amount'}}</p>
    <p class="{{ isset($paymentUpdate) ? 'h5' : 'h3' }}  font-weight">
        <span class="d-inline-block ml-1">&#x20B1;</span>
        <span class="font-weight-light" id="total-amount-value">{{ number_format($totalAmount, 2) }} </span>
    </p>
</div>