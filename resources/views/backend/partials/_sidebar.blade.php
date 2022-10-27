<div class="sidebar">
    <nav class="mt-2">
        <ul
            class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
        >
            <li
                class="nav-item @if($commons['main_menu'] == 'dashboard') menu-open @endif"
            >
                <a
                    href="{{ route('get.dashboard') }}"
                    class="nav-link @if($commons['main_menu'] == 'dashboard') active @endif"
                >
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            @if (auth()->user()->user_type == 'system')
                @include('backend.partials.__sidebar_for_system_user')
            @endif

            @if (auth()->user()->user_type == 'bpc')
                @include('backend.partials.__sidebar_for_bpc_user')
            @endif

            @if (auth()->user()->user_type == 'council')
                @include('backend.partials.__sidebar_for_council_user')
            @endif

        </ul>
    </nav>
</div>
