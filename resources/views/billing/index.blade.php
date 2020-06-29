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
                        <table id="dataTable" class="table table-bordered table table-md">
                            <thead>
                                <tr>
                                    <th>Billing No</th>
                                    <th>Desciption</th>
                                    <th>Client</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($billings as $billing)
                                    <tr>
                                        <td width="5%" class="text-center">
                                            <a href="{{ route('billing.show', $billing->id) }}">{{ $billing->billing_no }}</a>
                                        </td>
                                        <td width="31.5%">{!! nl2br($billing->description) !!}</td>
                                        <td width="15.5%">{{ $billing->client_name }}</td>
                                        <td width="10%">
                                            <span class="d-inline-block ml-1">&#x20B1;</span>
                                            {{ number_format($billing->amount, 2) }}
                                            {{-- {{ $billing->items->sum('amount')}} --}}
                                        </td>
                                        <td class="text-center" width="5%">
                                            <button data-toggle="modal" data-target="#modal-danger" type="button" class="btn btn-block btn-danger btn-xs unpaid-bill" data-id="{{ $billing->id }}">UnPaid</button>
                                            {{-- <span class="badge badge-danger d-block">Unpaid</span> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-danger" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">

                </div>
            </div>
        </div>
    </x-page-body>
    @section('custompagecss')
        <link rel="stylesheet" href="{{ mix('css/icheck/icheck.css') }}">
    @endsection
    @section('customscript')
    <script>
        $(document).ready(function(){
            var table = $('#dataTable').DataTable({
                "aaSorting": []
            });
            
            $('.unpaid-bill').on('click', function() {
                var billingId = $(this).data('id');
                $.ajax({
                    method:'GET',
                    url : "{{ route('ajax.billing.show') }}",
                    data : {
                        billingId : billingId,
                    },
                    success: function(data) {
                      $('#modal-danger .modal-content').html(data);
                    },
                    error: function(error) {
                        console.log(error)
                    }
                })
            });

                // $('#dataTable tbody').on('click', 'tr', function () {
                //     var data = table.row( this ).data();
                //     var url = "{{ route('billing.show', ':id') }}";
                //         url = url.replace(':id', data[0]);
                //     window.location.href = url;
                // });

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
