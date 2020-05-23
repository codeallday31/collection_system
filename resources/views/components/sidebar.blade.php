<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-light sidebar-left simplebar" data-simplebar>
            <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account">
                <a href="profile.html" class="flex d-flex align-items-center text-underline-0 text-body">
                    <span class="avatar mr-3">
                        <img src="assets/images/avatar/demi.png" alt="avatar" class="avatar-img rounded-circle">
                    </span>
                    <span class="flex d-flex flex-column">
                        <strong>Adrian Demian</strong>
                        <small class="text-muted text-uppercase">Account Manager</small>
                    </span>
                </a>
                <div class="dropdown ml-auto">
                    <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-item-text dropdown-item-text--lh">
                            <div><strong>Adrian Demian</strong></div>
                            <div>@adriandemian</div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item active" href="index.html">Dashboard</a>
                        <a class="dropdown-item" href="profile.html">My profile</a>
                        <a class="dropdown-item" href="edit-account.html">Edit account</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
            <div class="sidebar-heading sidebar-m-t">Menu</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href=" {{ route('homepage') }} ">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                        <span class="sidebar-menu-text">Dashboards</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-heading">Transaction</div>
            <div class="sidebar-heading">Reports</div>
            <div class="sidebar-heading">Maintenance</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item {{ request()->is('user/*') ? 'active open' : '' }}">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#maintenance_user">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person</i>
                        <span class="sidebar-menu-text">User</span>
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse show" id="maintenance_user">
                        <li class="sidebar-menu-item {{ request()->is('user/registration') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('user.registration') }}">
                                <span class="sidebar-menu-text">Registration</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ request()->is('user/role') ? 'active' : '' }} ">
                            <a class="sidebar-menu-button" href="{{ route('user.role') }}">
                                <span class="sidebar-menu-text">Role</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>