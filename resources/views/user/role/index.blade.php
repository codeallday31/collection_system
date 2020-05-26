<x-app>
    <x-page-header>
        <x-slot name="menu"> user </x-slot>
        <x-slot name="currentPage"> role </x-slot>

        <a href=" {{ route('user.create') }} " class="btn btn-success ml-3">Create <i class="material-icons">add</i></a>
    </x-page-header>
    <div class="container-fluid page__container">
           List of roles          
    </div>
</x-app>