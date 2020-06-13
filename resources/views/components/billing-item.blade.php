@foreach ($billingItems as $key => $billItem)
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
                        {{ old('billing_items.'.$key.'.category_id', ($billItem instanceof App\Item ) ? $billItem->category_id : '') == $id ? 'selected' : '' }}
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
            value="{{ old('billing_items.'.$key.'.description', ($billItem instanceof App\Item ) ? $billItem->description : '') }}"
        >
    </td>
    <td>
        <input 
            type="text" 
            name="billing_items[{{ $loop->index }}][amount]" 
            class="form-control form-control-sm input-amount"
            value="{{ old('billing_items.'.$key.'.amount', ($billItem instanceof App\Item ) ? $billItem->amount : '') }}"
            autocomplete="off"
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
                        {{ old('billing_items.'.$key.'.account_id', ($billItem instanceof App\Item ) ? $billItem->account_id : '') == $id ? 'selected' : '' }}
                    > 
                        {{$name}} 
                    </option>
                @endforeach
            @endif
        </select>
    </td>
</tr>
@endforeach