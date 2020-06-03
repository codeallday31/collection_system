<aside class="main-sidebar elevation-2 sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="{{ route('homepage') }}" class="brand-link navbar-secondary">
      {{-- <img src="{{ asset('storage/images/cam.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-header text-uppercase">Menu</li>
                <li class="nav-item">
                    <a href="{{ route('homepage') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header text-uppercase">Transactions</li>
                <li class="nav-item">
                    <a href="{{ route('billing.index') }}" class="nav-link {{ request()->is('billing') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            Billing
                        </p>
                    </a>
                </li>
                <li class="nav-header text-uppercase">Reports</li>
                <li class="nav-header text-uppercase">Maintenance</li>
                <li class="nav-item has-treeview {{ request()->is('user/*') || request()->is('user') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('user/*') || request()->is('user') ?  'active' : '' }}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link {{ request()->is('user') || request()->is('user/*')  ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.role.index') }}" class="nav-link {{ request()->is('user/role') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Role</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ request()->is('item/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('item/*') ?  'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Item
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ request()->is('item/category/*') ? 'has-treeview menu-open' : '' }}">
                            <a href="{{ route('item.category.index') }}" class="nav-link {{ request()->is('item/category') || request()->is('item/category/*')  ? 'active' : '' }}">
                                <i class="fas fa-clipboard-list nav-icon"></i>
                                <p>Category</p>
                                @if(request()->is('item/category/*'))
                                    <i class="right fas fa-angle-left"></i>
                                @endif
                            </a>
                            @if(request()->is('item/category/*'))
                                
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <span href="#" class="d-block nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p class="text-capitalize">{{ request()->segment(4) ?? request()->segment(3) }}</p>
                                        </span>
                                    </li>
                                </ul>
                            @endif
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('payable/*') ? 'has-treeview menu-open' : '' }}">
                    <a href="{{ route('payable.index') }}" class="nav-link {{ request()->is('payable')  || request()->is('payable/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-exchange-alt"></i>
                        <p>
                            Payable
                            @if(request()->is('payable/*'))
                                <i class="right fas fa-angle-left"></i>
                            @endif
                        </p>
                    </a>
                    @if (request()->is('payable/*'))
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <span href="#" class="d-block nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p class="text-capitalize">{{ request()->segment(3) ?? request()->segment(2) }}</p>
                                </span>
                            </li>
                        </ul>
                    @endif
                </li>
                 <li class="nav-item {{ request()->is('client/*') ? 'has-treeview menu-open' : '' }}">
                    <a href="{{ route('client.index') }}" class="nav-link {{ request()->is('client')  || request()->is('client/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tag"></i>
                        <p>
                            Client
                            @if(request()->is('payable/*'))
                                <i class="right fas fa-angle-left"></i>
                            @endif
                        </p>
                    </a>
                    @if (request()->is('client/*'))
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <span href="#" class="d-block nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p class="text-capitalize">{{ request()->segment(3) ?? request()->segment(2) }}</p>
                                </span>
                            </li>
                        </ul>
                    @endif
                </li>
            </ul>
        </nav>
    </div>
</aside>