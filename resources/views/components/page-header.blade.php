<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark text-capitalize">{{ $currentPage ?? '' }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @if($menu->toHtml() !== 'home')
                        <li class="breadcrumb-item text-capitalize">
                            <a href="{{ route('homepage') }}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                    @endif
                    <li class="breadcrumb-item text-capitalize">
                        @if($menu->toHtml() === 'home')
                            <a href="{{ route('homepage') }}">{{ $menu ?? '' }}</a>
                        @else
                            {{ $menu ?? '' }}
                        @endif
                    </li>
                    <li class="breadcrumb-item text-capitalize active"> {{ $breadCrumbPage ?? '' }} </li>
                </ol>
            </div>
        </div>
    </div>
</div>