<x-master>
    <x-slot name="bodyClass">sidebar-mini layout-fixed layout-navbar-fixed</x-slot>
    <div class="wrapper">
		<x-navigation/>

		<x-sidebar/>

        <div class="content-wrapper">
			{{ $slot }}
		</div>
		
		<x-footer/>
    </div>
</x-master>