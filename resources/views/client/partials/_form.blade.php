<div class="form-group">
    <label for="name">
        Name
        <small id="nameHelpLine" class="d-inline text-danger h6">*</small>
    </label>
    <input 
        type="text" 
        class="form-control  @error('name') {{ 'is-invalid' }} @enderror" 
        id="name" 
        placeholder="Name" 
        name="name" 
        autocomplete="off"
        value="{{ old('name', isset($client->name) ? $client->name : null)  }}"
    >
    @error('name')
        <div class="invalid-feedback">
            {{ $message}}
        </div>
    @enderror
</div>

<div class="form-group">
    <label for="tin_no">
        Tin No.
    </label>
    <input 
        type="text" 
        class="form-control  @error('tin_no') {{ 'is-invalid' }} @enderror" 
        id="tin_no" 
        placeholder="Tin No." 
        name="tin_no"
        value="{{ old('tin_no', isset($client->tin_no) ? $client->tin_no : null)  }}"
    >
</div>

 <div class="form-group">
    <label for="name" id="address">
       Address
    </label>
    <textarea 
        name="address" 
        id="address"
        class="form-control" 
        rows="4" 
    >{{ old('address', isset($client->address) ? $client->address : null)  }}</textarea>
</div>
<button type="submit" class="btn btn-primary col-md-12 text-uppercase">{{ $isEdit ?? 'Create'}}</button>