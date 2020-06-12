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
    <div class="col-md-6 text-right">
        <p class="h1 font-weight-bold text-uppercase">Total Amount</p>
        <p class="h3 font-weight" id="total-amount-value">0.00</p>
    </div>
</div>

@if (!isset($isEdit))
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
                        @foreach (old('billing_items', ['']) as $key => $oldInputs)
                            <tr data-row="{{ $loop->index }}">
                                <td class="text-center pl-2">
                                    <button type="button" class="bg-danger btn btn-sm remove-item">
                                        <i class="far fa-minus-square"></i>
                                    </button>
                                </td>
                                <td>
                                    <select 
                                        name="billing_items[{{ $loop->index }}][category_id]" 
                                        class="select2 form-control form-control-sm 
                                            @error('billing_items.'.$key.'.category_id')  {{ 'is-invalid' }} @enderror"
                                        required
                                    >
                                    @if ($items->count() > 0)
                                         <option value="">Select Item Category</option>
                                            @foreach ($items as $id => $name)
                                                <option value="{{ $id }}" 
                                                    {{ old('billing_items.'.$key.'.category_id') == $id ? 'selected' : '' }}
                                                > 
                                                    {{$name}} 
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td>
                                    <input 
                                        type="text" 
                                        name="billing_items[{{ $loop->index }}][description]" 
                                        class="form-control form-control-sm"
                                        value="{{ old('billing_items.'.$key.'.description') }}"
                                    >
                                </td>
                                <td>
                                    <input 
                                        type="text" 
                                        name="billing_items[{{ $loop->index }}][amount]" 
                                        class="form-control form-control-sm input-amount"
                                        value="{{ old('billing_items.'.$key.'.amount') }}"
                                    >
                                </td>
                                <td style="padding-right: .75rem">
                                    <select 
                                        name="billing_items[{{ $loop->index }}][account_id]" 
                                        class="select2 form-control form-control-sm
                                             @error('billing_items.'.$key.'.account_id')  {{ 'is-invalid' }} @enderror"
                                        required
                                    >
                                        @if ($accounts->count() > 0)
                                             <option value="">Select Account type</option>
                                            @foreach ($accounts as $id => $name)
                                                <option value="{{ $id }}" 
                                                    {{ old('billing_items.'.$key.'.account_id') == $id ? 'selected' : '' }}
                                                > 
                                                    {{$name}} 
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif

<button type="submit" class="btn btn-primary btn-sm">
    <i class="fas fa-{{ isset($isEdit) ? 'sync-alt' : 'save' }}"></i> {{ $isEdit ?? 'Save' }}
</button>