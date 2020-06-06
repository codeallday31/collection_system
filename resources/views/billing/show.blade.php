<x-app>
    <x-page-header>
        <x-slot name="menu"> billing </x-slot>
        <x-slot name="currentPage"> Billing No: <strong>{{ $billing->billing_no }}</strong> </x-slot>
        <a href=" {{ route('billing.index') }} " class="btn btn-secondary ml-3"> 
            <i class="material-icons">arrow_back</i>
            Back
        </a>
    </x-page-header>

    <x-page-body>
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <h3 class="card-title text-uppercase">Details</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body pt-2 pb-0">
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item border-top-0">
                                <b>Client Name</b> 
                                <span class="float-right">
                                    {{ $billing->client->name }}
                                </span>
                            </li>
                            <li class="list-group-item">
                                <b>Date Created</b> 
                                <span class="float-right">
                                    {{ $billing->created_at }}
                                </span>
                            </li>
                            <li class="list-group-item border-bottom-0">
                                <div class="border border-top-0 border-left-0 border-right-0 pb-2">
                                   <span class="font-weight-bold d-inline-block mb-2"> Description</span>
                                    <p class="text-justify" style="text-indent: 5%">
                                        {!! $billing->description !!}
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-success card-outline col-md-12 pl-0 pr-0">
                    <div class="card-header">
                        <h3 class="card-title text-uppercase">Billing Items</h3>
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

