<x-app>
    <x-page-header>
        <x-slot name="menu"> billing </x-slot>
        <x-slot name="currentPage"> Billing No: <strong>{{ $billing->billing_no }}</strong> </x-slot>
    </x-page-header>

    <x-page-body>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <a href="{{ route('billing.edit', $billing->id) }}" class="btn btn-info btn-sm float-right d-inline-block" role="button" aria-disabled="true">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                       <div class="ml-auto">
                            <a href="{{ route('billing.index') }}" type="button" class="btn bg-secondary btn-sm">
                                <i class="fas fa-arrow-left d-inline-block mr-2"></i>Back
                            </a>
                       </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-success card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title text-uppercase font-weight-bold">Details</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body pt-2 pb-0">
                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item border-top-0">
                                                <span class="text-uppercase font-weight-bold">Client Name</span>
                                                <span class="float-right">
                                                    {{ $billing->client->name }}
                                                </span>
                                            </li>
                                            <li class="list-group-item">
                                                <span class="text-uppercase font-weight-bold">Date Created</span> 
                                                <span class="float-right">
                                                    {{ $billing->created_at }}
                                                </span>
                                            </li>
                                            <li class="list-group-item border-bottom-0">
                                                <div class="pb-2">
                                                    <span class="d-inline-block mb-2 text-uppercase font-weight-bold"> Description</span>
                                                    <p class="text-justify mb-1" style="text-indent: 5%">
                                                        {!! nl2br($billing->description) !!}
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <x-total-billing-amount/>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-success card-outline col-md-12">
                                    <div class="card-header">
                                        <h3 class="card-title text-uppercase font-weight-bold">Billing Items</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body table-responsive pl-1 pr-1">
                                        <table id="dataTable" class="table table-bordered table-md">
                                            <thead>
                                                <td></td>
                                                <th>IItem Name</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                                <th>Account Type</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($items as $item)
                                                    <tr>
                                                        <td> {{ $item->id }} </td>
                                                        <td>{{ $item->category_name }}</td>
                                                        <td>{{ $item->description }}</td>
                                                        <td>{{ number_format($item->amount, 2) }}</td>
                                                        <td>{{ $item->account_name }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-page-body>
    @section('customscript')
        <script>
            $(document).ready(function() {
                var $dataTable = $('#dataTable').DataTable({
                    "info": false,
                    "lengthChange": false,
                    "oLanguage": {
                        "oPaginate": {
                            "sPrevious": '<i class="fas fa-arrow-left"></i>',
                            "sNext": '<i class="fas fa-arrow-right"></i>',
                        },
                    },
                    "aaSorting": [],
                    "columnDefs": [
                        { "targets": [0], "visible": false },
                    ],
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
                    }
                }
            });
        </script>
    @endsection
</x-app>

