<x-app>
    <x-page-header>
        <x-slot name="menu"> billing </x-slot>
        <x-slot name="currentPage"> Billings </x-slot>
    </x-page-header>
    
    <x-page-body>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="card-title text-uppercase">billings</h3>
                        <div class="ml-auto">
                            <a href="{{ route('billing.create') }}" type="button" class="btn btn-block bg-success btn-sm">
                                <i class="fas fa-plus d-inline-block mr-2"></i>Create
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-hover table-md">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Billing No</th>
                                    <th>Desciption</th>
                                    <th>Client</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($billings as $billing)
                                    <tr>
                                        <td width="5%">{{ $billing->id }}</td>
                                        <td width="15%">{{ $billing->billing_no }}</td>
                                        <td width="31.5%">{{ $billing->description }}</td>
                                        <td width="15.5%">{{ $billing->client->name }}</td>
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
              var table = $('#dataTable').DataTable();
     
                $('#dataTable tbody').on('click', 'tr', function () {
                    var data = table.row( this ).data();
                    var url = "{{ route('billing.show', ':id') }}";
                        url = url.replace(':id', data[0]);
                    window.location.href = url;
                });

            if ("{{session()->has('message')}}") {
                toastr.options = {
                    "progressBar": true,
                    "timeOut": "1500",
                }
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
        });
    </script>
    @endsection
</x-app>
