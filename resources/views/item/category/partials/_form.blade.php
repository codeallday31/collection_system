<div class="form-group">
    <label for="name" id="nameHelpLine">
        Name
        <small id="nameHelpLine" class="d-inline text-danger h6" aria-describedby="emailHelpline">*</small>
    </label>
    <input 
        type="text" 
        class="form-control  @error('name') {{ 'is-invalid' }} @enderror" 
        id="name" 
        placeholder="Name" 
        name="name" 
        autocomplete="off"
        value="{{ old('name', isset($category->name) ? $category->name : null)  }}"
    >
    
    @error('name')
        <div class="invalid-feedback">
            {{ $message}}
        </div>
    @enderror
    
</div>
<button type="submit" class="btn btn-primary col-md-12 text-uppercase">{{ $isEdit ?? 'Create'}}</button>