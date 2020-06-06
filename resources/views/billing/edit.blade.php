<x-app>
    <x-page-header>
        <x-slot name="menu"> billing </x-slot>
        <x-slot name="currentPage"> Edit billing </x-slot>
        <x-slot name="breadCrumbPage"> edit </x-slot>
        <a href=" {{ route('billing.index') }} " class="btn btn-secondary ml-3"> 
            <i class="material-icons">arrow_back</i>
            Back
        </a>
    </x-page-header>

    <x-page-body>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h1 class="card-title text-uppercase">&nbsp;</h1>
                        <div class="ml-auto">
                            <a href="{{ route('billing.index') }}" type="button" class="btn btn-block bg-secondary btn-sm">
                                <i class="fas fa-arrow-left d-inline-block mr-2"></i>Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('billing.update', $billing->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            @include("billing.partials._form", [
                                'isEdit' => 'Update'
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-page-body>
    @section('customcss')
        <style>
            .select2.is-invalid + span > span > span {
                border-color: #dc3545;
            }
        </style>
    @endsection
    @section('customscript')
        <script>
            $(document).ready(function() {
                $('.select2').select2({
                    width: '100%',
                });
            });
        </script>
    @endsection
</x-app>

