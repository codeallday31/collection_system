<x-app>
    <x-page-header>
        <x-slot name="menu"> user </x-slot>
        <x-slot name="currentPage"> User Maintenance </x-slot>
        <x-slot name="breadCrumbPage"> List </x-slot>
    </x-page-header>
    
    <x-page-body>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="card-title text-uppercase">Users</h3>
                        <div class="ml-auto">
                            <a href="{{ route('user.create') }}" type="button" class="btn btn-block bg-success btn-sm">
                                <i class="fas fa-plus d-inline-block mr-2"></i>Create
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email Address</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }} </td>
                                    <td> {{ $user->username }} </td>
                                    <td>{{ $user->email}} </td>
                                    <td>{{ $user->created_at}} </td>
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
