<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    @if ($menu->toHtml() !== 'home')
                         <li class="breadcrumb-item">
                            <a href="{{ route('homepage') }} ">
                                <i class="material-icons icon-20pt">home</i>
                            </a>
                        </li>
                    @endif
                    <li class="breadcrumb-item">{{ $menu ?? ''}}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $currentPage ?? ''}}</li>
                </ol>
            </nav>
            <h1 class="m-0">{{ ucfirst($currentPage) ?? '' }}</h1>
        </div>
    </div>
</div>