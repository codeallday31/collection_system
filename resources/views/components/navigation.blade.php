<div id="header" class="mdk-header js-mdk-header m-0" data-fixed>
    <div class="mdk-header__content">
        <div class="navbar navbar-expand-sm navbar-main navbar-light bg-light  pr-0" id="navbar" data-primary>
            <div class="container-fluid p-0">

                <!-- Navbar toggler -->
                <button class="navbar-toggler navbar-toggler-right d-block d-md-none" type="button" data-toggle="sidebar">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <!-- Navbar Brand -->
                <a href="index.html" class="navbar-brand ">
                    <img class="navbar-brand-icon" src="{{ asset('img/cam.jpg') }}" width="40%" alt="LOGO CAM">
                </a>

                <!-- User -->
                <ul class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center">
                    <li class="nav-item dropdown">
                        <a href="#account_menu" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                            <img src="assets/images/avatar/demi.png" class="rounded-circle" width="32" alt="Frontted">
                            <span class="ml-1 d-flex-inline">
                                <span class="text-light">Adrian D.</span>
                            </span>
                        </a>
                        <div id="account_menu" class="dropdown-menu dropdown-menu-right">
                            <a 
                                class="dropdown-item"
                                href=" {{route('logout')}} " 
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            >
                                Logout
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>

            </div>
        </div>

    </div>
</div>