<x-app>
    <x-page-header>
        <x-slot name="menu"> item </x-slot>
        <x-slot name="currentPage"> Categories </x-slot>
        <x-slot name="breadCrumbPage"> category </x-slot>
    </x-page-header>
    
    <x-page-body>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="card-title text-uppercase">&nbsp;</h3>
                        <div class="ml-auto">
                            <a href="{{ route('item.category.create') }}" type="button" class="btn btn-block bg-success btn-sm">
                                <i class="fas fa-plus d-inline-block mr-2"></i>Create
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped table-md">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($itemCategories as $itemCategory)
                                    <tr>
                                        <td width="8%"> {{ $itemCategory->id }} </td>
                                        <td> {{ $itemCategory->name }} </td>
                                        <td class="text-center" style="width: 10%">
                                            <a href="{{ route('item.category.edit', $itemCategory->id) }}" class="btn btn-info btn-sm" role="button" aria-disabled="true">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm btn-delete" type="button" data-category-id="{{ $itemCategory->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>   
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-page-body>
    @section('customcss')
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @endsection
    @section('customscript')
    <script>
         $(document).ready(function(){
            $('#dataTable').dataTable();

            actionNotifier() 
        });

        $('.btn-delete').on('click', function(){
            var categoryID = $(this).data('category-id');
            var url = "{{ route('item.category.destroy', ':id') }}"
                url = url.replace(':id', categoryID);
                
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
                })
                .then(function(result) {
                    if (result.value) {
                        $.ajax({
                            url : url,
                            method: 'DELETE',
                            data: {
                                "categoryId": categoryID,
                            }
                        })
                        .done(function(response) {
                           if (response.status === 200) {
                                Swal.fire({
                                    title: 'Category deleted',
                                    text: response.message,
                                    icon: 'success',
                                }).then(function(res) {
                                    if (res.isConfirmed || res.isDismissed) window.location.href = "{{route('item.category.index')}}";
                                })
                           }else{
                               console.log(response);
                           }
                        })
                        .fail(function(error) {
                            console.log(error)
                        })
                    }
                });
        });

        function actionNotifier() {
            if ("{{session()->has('message')}}") {
                var alertType = "{{session()->get('alert-type')}}";
                var message = "{{session()->get('message')}}";
                switch (alertType) {
                    case 'info':
                        toastr.info(message)
                        break;

                    case 'warning':
                        toastr.warning(message)
                        break;
                    
                    case 'success':
                        toastr.success(message)
                        break;
                    
                    case 'error':
                        toastr.error(message)
                        break;
                }
            }
        }
    </script>
    @endsection
</x-app>
