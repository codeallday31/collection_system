<x-master>
    <x-slot name="bodyClass">layout-default</x-slot>

    <div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">
        <x-navigation/>
        <div class="mdk-header-layout__content">
            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">
                    <x-page-header>
                        <x-slot name="menu"> {{ request()->segment(1) ?? 'home'}} </x-slot>
                        <x-slot name="currentPage"> {{ request()->segment(2) ?? 'dashboard'}} </x-slot>
                    </x-page-header>
                    <div class="container-fluid page__container">
                        {{ $slot }}
                    </div>
                </div>

                <x-sidebar/>
            </div>
        </div>
    </div>
</x-master>