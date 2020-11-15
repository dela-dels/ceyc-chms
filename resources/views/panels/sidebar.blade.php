<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">

        <h4 class="mt-2 mb-2">
            CEYC AIRPORT-CITY
        </h4>

    </div>
    <div class="main-menu-content mt-3">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item pb-1">
                    <i></i>
                    <span class="menu-title" data-i18n="">Home</span>
                </a>
            </li>

            <li class="nav-item pb-1">
                <a href="{{ route('givings.dashboard') }}"
                    class="{{ request()->is('givings/dashboard') ? 'active' : '' }}">
            <li class="nav-item pb-1">
                <a href="{{ route('givings.dashboard') }}" class="{{ request()->is('givings/*') ? 'active' : ''  }}">
            <!-- Routes for managing a single fellowship-->
            {{-- @foreach(Auth::user()->roles as $role)
                @if($role->name == 'Fellowship Leader')
                    <li class="nav-item pb-1">
                        <a href="">
                            <i class=""></i>
                            <span class="menu-title" data-i18n="">Manage Fellowship</span>
                        </a>
                        <ul class="menu-content">
                            <li>
                                <a href="{{ route('fellowship.members', [ Auth::user()->fellowship->name ]) }}"
                                   class="{{ request()->is('fellowship/' . Auth::user()->fellowship->name .'/members') ?
                                    'active' : '' }}">
                                    <i></i>
                                    <span class="menu-title">All Members</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('fellowship.cells', [Auth::user()->fellowship->name ]) }}"
                                   class="{{ request()->is('fellowship/' . Auth::user()->fellowship->name .'/cells') ?
                                   'active' : '' }}">
                                    <i></i>
                                    <span class="menu-title">All Cells</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            @endforeach --}}

        <!-- Routes for managing a single cell-->
            {{-- @foreach(Auth::user()->roles as $role)
                @if($role->name == 'Cell Leader')
                    <li class="nav-item pb-1">
                        <a href="">
                            <i class=""></i>
                            <span class="menu-title" data-i18n="">Manage Cell</span>
                        </a>
                        <ul class="menu-content">
                            <li>
                                <a href="{{ route('cell.members', [ Auth::user()->cell->name ]) }}"
                                   class="{{ request()->is('cell/' . Auth::user()->cell->name .'/members') ?
                                    'active' : '' }}">
                                    <i></i>
                                    <span class="menu-title">All Members</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            @endforeach --}}

            <li class="nav-item pb-1 mb-3">
                <a href="">
                    <i class=""></i>
                    <span class="menu-title" data-i18n="">
                        <i class="fa fa-user-circle"></i>
                        My Account
                    </span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a href=""
                           class="{{ request()->is('user/profile/edit') ? 'active' : '' }}">
                            <span class="menu-title">Edit Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           <span class="menu-title">Log Out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
