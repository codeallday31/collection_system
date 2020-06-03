<x-app>
    <x-page-header>
        <x-slot name="menu"> client </x-slot>
        <x-slot name="currentPage"> Create new client </x-slot>
        <x-slot name="breadCrumbPage"> create </x-slot>
    </x-page-header>

    <x-page-body>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h1 class="card-title text-uppercase">Information</h1>
                        <div class="ml-auto">
                            <a href="{{ route('client.index') }}" type="button" class="btn btn-block bg-secondary btn-sm">
                                <i class="fas fa-arrow-left d-inline-block mr-2"></i>Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('client.store') }}" method="POST">
                            @csrf
                            @include('client.partials._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-page-body>
    
</x-app>