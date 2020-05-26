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
        value="{{ old('name') }}"
    >
    @error('name')
        <div class="invalid-feedback">
            {{ $message}}
        </div>
    @enderror
    
</div>
<div class="form-group">
    <label for="username">
        Username
    </label>
    <input 
        type="text" 
        class="form-control  @error('username') {{ 'is-invalid' }} @enderror" 
        id="username" 
        placeholder="Username" 
        name="username" 
        autocomplete="off"
        value="{{ old('username') }}"
    >
    @error('username')
        <div class="invalid-feedback">
            {{ $message}}
        </div>
    @enderror
    
</div>
<div class="form-group">
    <label for="email" id="emailHelpline">Email Address</label>
        <small id="emailHelpline" class="d-inline text-danger h6" aria-describedby="emailHelpline">*</small>
    <input 
        type="email" 
        class="form-control @error('email') {{ 'is-invalid' }} @enderror" 
        id="email" 
        placeholder="Email Address"  
        name="email" 
        autocomplete="off"
        value="{{ old('email') }}"
    >
    @error('email')
        <div class="invalid-feedback">
            {{ $message}}
        </div>
    @enderror
</div>
{{-- <div class="form-group">
    <label for="password" aria-describedby="passwordHelpLine">
        Password
        <small id="passwordHelpLine" class="d-inline text-danger h6">
            *
        </small>
    </label>
    <input 
        type="password"
        class="form-control @error('password') {{ 'is-invalid' }} @enderror" 
        id="password" 
        placeholder="Password" 
        name="password"
    >
    @error('password')
        <div class="invalid-feedback">
            {{ $message}}
        </div>
    @enderror
</div> --}}
<button type="submit" class="btn btn-primary col-md-12 text-uppercase">Create</button>