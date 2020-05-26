<x-app>
    <x-page-header>
        <x-slot name="menu"> user </x-slot>
        <x-slot name="currentPage"> Create new user </x-slot>
        <x-slot name="breadCrumbPage"> create </x-slot>
        <a href=" {{ route('user.index') }} " class="btn btn-secondary ml-3"> 
            <i class="material-icons">arrow_back</i>
            Back
        </a>
    </x-page-header>

    <x-page-body>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h1 class="card-title text-uppercase">Credentials</h1>
                        <div class="ml-auto">
                            <a href="{{ route('user.index') }}" type="button" class="btn btn-block bg-secondary btn-sm">
                                <i class="fas fa-arrow-left d-inline-block mr-2"></i>Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            @include('user.partials._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-page-body>
    
</x-app>