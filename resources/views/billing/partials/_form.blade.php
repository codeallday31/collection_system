<div class="row">
    <div class="card card-success card-outline col-md-6 pl-0 pr-0">
        <div class="card-header">
            <h3 class="card-title font-weight-bold text-uppercase">Details</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="client_id" class="font-weight-normal">
                        Client
                        <small class="d-inline text-danger h6 font-weight-bold">*</small>
                    </label>
                    <select 
                        name="client_id" 
                        id="client_id" 
                        class="select2 form-control  
                        @error('client_id') {{ 'is-invalid' }} @enderror"
                        required 
                    >
                        @if ($clients->count() > 0)
                            <option value="">Select Client</option>
                            @foreach ($clients as $id => $name)
                                <option value="{{ $id }}" {{ (int)old('client_id',  isset($billing->client_id) ? $billing->client_id : null) === $id ? 'selected' : '' }} > {{ ucfirst($name) }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('client_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="billing_no" class="font-weight-normal">
                        Description
                        <small class="d-inline text-danger h6 font-weight-bold">*</small>
                    </label>
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="4"
                        class="form-control  @error('description') {{ 'is-invalid' }} @enderror"
                        required
                    >{{ old('description', isset($billing) ? $billing->description : null) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <x-total-billing-amount/>
</div>

<div class="row">
    <div class="card card-success card-outline col-md-12 pl-0 pr-0">
        <div class="card-header d-flex align-items-center">
            <h3 class="card-title font-weight-bold text-uppercase text-uppercase">Billing Items</h3>
            <div class="ml-auto">
                <button type="button" class="bg-primary btn btn-sm add-billing-item">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-bordered table-billing-item">
                <thead>
                    <thead>
                        <tr >
                            <th width="5%"></th>
                            <th width="23.75%" class="font-weight-normal @error('billing_items.*.category_id') {{'table-danger'}} @enderror">
                                Item name
                                <small class="d-inline text-danger h6 font-weight-bold">*</small>
                            </th>
                            <th width="23.75%" class="font-weight-normal">Description</th>
                            <th width="23.75%" class="font-weight-normal">Amount</th>
                            <th width="23.75%" class="font-weight-normal @error('billing_items.*.account_id') {{'table-danger'}} @enderror">
                                Account Type
                                <small class="d-inline text-danger h6 font-weight-bold">*</small>
                            </th>
                        </tr>
                    </thead>
                </thead>
                <tbody class="billing-input">
                    @if (old('billing_items') || request()->segment(2) === 'create')
                        <x-billing-item :billingItems="old('billing_items', [''])"/>
                    @else
                        <x-billing-item :billingItems="$billing->items"/>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary btn-sm">
    <i class="fas fa-{{ isset($isEdit) ? 'sync-alt' : 'save' }}"></i> {{ $isEdit ?? 'Save' }}
</button>
@section('custompagecss')
    <style>
        table.table-billing-item tbody.billing-input tr:first-child td button {
            display: none;
        }
        .select2.is-invalid + span > span > span {
            border-color: #dc3545;
        }
    </style>
@endsection
@section('customscript')
    <script>
        $(document).ready(function() {
            var totalAmount = [];
            var $tableBody = $('.table-billing-item tbody.billing-input');
            var $tbodyTrLength = $tableBody.find('tr').length;
            $('.select2').select2({
                width: '100%',
            });

            $('.add-billing-item').on('click', function(event) {
                event.preventDefault();
                $('select.select2').select2('destroy');
                var $newTableRow = $tableBody.find('tr:last').clone();
                $newTableRow.removeAttr('data-row style').attr('data-row', $tbodyTrLength);
                $newTableRow.find('td:nth-of-type(2) select').prop({
                    name: 'billing_items['+$tbodyTrLength+'][category_id]',
                    class: 'select2 form-control form-control-sm',
                    val: ''
                });
                $newTableRow.find('td:nth-of-type(3) input[type="text"]').prop({
                    name: 'billing_items['+$tbodyTrLength+'][description]',
                    value: '',
                });
                $newTableRow.find('td:nth-of-type(4) input[type="text"]').prop({
                    name: 'billing_items['+$tbodyTrLength+'][amount]',
                    value: ''
                });
                 $newTableRow.find('td:nth-of-type(5) select').prop({
                    name: 'billing_items['+$tbodyTrLength+'][account_id]',
                    class: 'select2 form-control form-control-sm'
                });

                $newTableRow.appendTo($tableBody).hide().fadeIn('fast');;
                 $('.select2').select2({
                    width: '100%'
                 });
                $tbodyTrLength++;
            });

            $('.table-billing-item').on('click', '.remove-item',  function() {
                var $dataRow = $(this).parent().parent().data('row');
                $(this).parent().parent().fadeOut('fast', function() {
                    $(this).remove();
                });
                totalAmount[$dataRow] = "";
                calculateTotalAmount(totalAmount)
                
            });

            $('.table-billing-item').on('focusout', '.input-amount', function(event){
                var $dataRow = $(this).parent().parent().data('row');
                totalAmount[$dataRow] = $(this).val();
                calculateTotalAmount(totalAmount)
            });

        });

        function calculateTotalAmount(totalAmount){
            console.log(totalAmount);
            var $sum = 0
            var options = { 
                minimumFractionDigits: 2,
                maximumFractionDigits: 2 
            };
            $.each(totalAmount, function($index, $value) {
                $sum += parseFloat($value === "" ? 0 : $value);
            });
            $('#total-amount-value').text($sum.toLocaleString('en', options));
        }
        
    </script>
@endsection