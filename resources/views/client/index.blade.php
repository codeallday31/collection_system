<x-app>
    <x-page-header>
        <x-slot name="menu"> client </x-slot>
        <x-slot name="currentPage"> Clients </x-slot>
    </x-page-header>
    
    <x-page-body>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="card-title text-uppercase">&nbsp;</h3>
                        <div class="ml-auto">
                            <a href="{{ route('client.create') }}" type="button" class="btn btn-block bg-success btn-sm">
                                <i class="fas fa-plus d-inline-block mr-2"></i>Create
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped table-md">
                            <thead>
                                <tr>
                                    <th>Fullname</th>
                                    <th>address</th>
                                    <th>Tin-no.</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>
                                            <a href="{{ route('client.show', $client->id) }}">{{ $client->name }}</a>
                                        </td>
                                        <td>{!! nl2br($client->address) !!}</td>
                                        <td>{{ $client->tin_no }}</td>
                                        <td class="text-center align-middle" style="width: 10%">
                                            <a href="{{ route('client.edit', $client->id) }}" class="btn btn-info btn-sm" role="button" aria-disabled="true">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('client.destroy', $client->id) }}" method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm btn-delete" type="button">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
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
    @section('customscript')
    <script>
         $(document).ready(function(){
            $('#dataTable').dataTable();
            actionNotifier();
        });

        $('.btn-delete').on('click', function() {
            var formElement = $(this).parent();
             Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            })
            .then(function (result) {
                if (result.value) {
                    formElement.submit();
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
