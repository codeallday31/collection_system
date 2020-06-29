<form action="#" method="POST">
    @csrf
    <div class="modal-header">
        <h4 class="modal-title font-weight-bold text-uppercase" style="letter-spacing:0.2rem">Collection</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body bg-white">
        <div class="form-group">
            <label class="font-weight-bold text-uppercase" for="payment" style="letter-spacing:0.1rem; font-size: 1.2rem;">Payment</label>
            <input type="text" class="form-control form-control-sm" id="payment" placeholder="Enter Amount">
        </div>
        <div class="form-group">
            <label class="d-block font-weight-bold text-uppercase" style="letter-spacing:0.1rem; font-size: 1.2rem;">Mode of Payment</label>
            @foreach ($modePayments as $key => $value)
                    <div class="form-check form-check-inline icheck-danger">
                        <input class="form-check-input" type="radio" id="{{ $key }}" name="modePayment" value="{{ $value }}" {{ $loop->first ? 'checked' : ''}}>
                        <label class="form-check-label" for="{{ $key }}">{{ $key }}</label>
                    </div>
            @endforeach
        </div>
         <div class="form-group">
            <label class="font-weight-bold text-uppercase" for="paymentNote" style="letter-spacing:0.1rem; font-size: 1.2rem;">Note</label>
            <textarea class="form-control" id="paymentNote" rows="3" name="note"></textarea>
          </div>
        <x-total-billing-amount class="col-md-12" :totalBilling="$totalAmount">
            <x-slot name="paymentUpdate"> Balance </x-slot>
        </x-total-billing-amount>

    </div>
    <div class="modal-footer justify-content-between bg-white">
        <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-danger btn-sm">Update Payment</button>
    </div>
</form>