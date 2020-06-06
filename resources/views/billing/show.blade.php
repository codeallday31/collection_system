<x-app>
    <x-page-header>
        <x-slot name="menu"> billing </x-slot>
        <x-slot name="currentPage"> Billing No: <strong>{{ $billing->billing_no }}</strong> </x-slot>
    </x-page-header>

    <x-page-body>
        <div class="row">
            <div class="col-lg-6">
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
                                        {!! $billing->description !!}
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer" style="border: 1px solid #ededed">
                        <a href="{{ route('billing.index') }}" type="button" class="btn bg-secondary btn-sm">
                            <i class="fas fa-arrow-left d-inline-block mr-2"></i>Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-success card-outline col-md-12 pl-0 pr-0">
                    <div class="card-header">
                        <h3 class="card-title text-uppercase font-weight-bold">Billing Items</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered">
                            <thead>
                                <th> Item Name</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Account Type</th>
                            </thead>
                            <tbody>
                                @foreach ($billing->items as $item)
                                    <tr>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->account->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-page-body>
</x-app>

