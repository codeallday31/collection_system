<x-app>
    <x-page-header>
        <x-slot name="menu"> client </x-slot>
        <x-slot name="currentPage"><strong>{{ $client->name }}</strong> </x-slot>
        <x-slot name="breadCrumbPage"> information </x-slot>
    </x-page-header>

    <x-page-body>
        <div class="row">
            @if($client->billings->isNotEmpty())
                @foreach ($client->billings as $billing)
                    <div class="col-lg-4">
                        <div class="card {{ $loop->first ? 'bg-success' : 'bg-danger' }}">
                            <div class="card-header d-flex align-items-center text-dark bg-white" style="cursor: move;">
                                <h3 class="card-title font-weight-bold">
                                    BIlling No : {{ $billing->billing_no }}
                                </h3>
                                <div class="card-tools ml-auto">
                                    <button type="button" class="btn {{ $loop->first ? 'btn-success' : 'btn-danger' }} btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <ul class="list-group bg-danger">
                                    @foreach ($billing->items as $item)
                                        <li class="list-group-item d-flex justify-content-between align-items-center text-dark">
                                            {{ $item->description }}
                                            <span class="badge badge-primary badge-pill">{{ number_format($item->amount, 2) }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
               <div class="mx-auto">
                   <h3>No billing yet</h3>
               </div>
            @endif
        </div>
    </x-page-body>

</x-app>

