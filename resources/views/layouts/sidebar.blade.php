<!-- Menu -->
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-icons-1.11.3/font/bootstrap-icons.css') }}">
@endsection
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme no-print">
    <div class="app-brand demo ">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo" style="margin-left: -10px">
                <img src="{{ asset('assets/img/CIS.png') }}" height="44">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto bg-dark">
            <i class="bx bx-transfer-alt bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Main Menu</span>
        </li>
        <li class="menu-item {{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ request()->segment(1) == 'announcements' ? 'active' : '' }}">
            <a href="{{ route('announcements.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-upload"></i>
                <div data-i18n="Dashboards">Announcements</div>
            </a>
        </li>
        <li class="menu-item {{ request()->segment(1) == 'proposal' ? 'active' : '' }}">
            <a href="{{ route('user-proposals.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Dashboards">Submit Proposal</div>
            </a>
        </li>
        <li class="menu-item {{ request()->segment(1) == 'reviewers' ? 'active' : '' }}">
            <a href="{{ route('reviewers.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-reader"></i>
                <div data-i18n="Dashboards">Review Proposals</div>
            </a>
        </li>
        <li class="menu-item {{ request()->segment(1) == 'vicerector1' ? 'active' : '' }}">
            <a href="{{ route('vicerector1.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-reader"></i>
                <div data-i18n="Dashboards">VR I Approval</div>
            </a>
        </li>
        <li class="menu-item {{ request()->segment(1) == 'vicerector2' ? 'active' : '' }}">
            <a href="{{ route('vicerector2.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-reader"></i>
                <div data-i18n="Dashboards">VR II Approval</div>
            </a>
        </li>
        <li class="menu-item {{ request()->segment(1) == 'proposals' ? 'active' : '' }}">
            <a href="{{ route('proposals.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-reader"></i>
                <div data-i18n="Dashboards">Manage Proposal</div>
            </a>
        </li>
        @can('control panel.read')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Control Panel</span>
            </li>
        @endcan
        @can('setting.read')
            <li class="menu-item {{ request()->segment(1) == 'setting' ? 'open active' : '' }}">
                <a href="#" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-cog"></i>
                    <div>Settings</div>
                </a>
                <ul class="menu-sub">
                    @can('setting/manage_account.read')
                        <li class="menu-item {{ request()->segment(2) == 'manage_account' ? 'open active' : '' }}">
                            <a href="" class="menu-link menu-toggle">
                                <div>Manage Account</div>
                            </a>
                            <ul class="menu-sub">
                                @can('setting/manage_account/users.read')
                                    <li class="menu-item {{ request()->segment(3) == 'users' ? 'active' : '' }}">
                                        <a href="{{ route('users.index') }}" class="menu-link">
                                            <div>Users</div>
                                        </a>
                                    </li>
                                @endcan
                                @can('setting/manage_account/roles.read')
                                    <li class="menu-item {{ request()->segment(3) == 'roles' ? 'active' : '' }}">
                                        <a href="{{ route('roles.index') }}" class="menu-link">
                                            <div>Roles</div>
                                        </a>
                                    </li>
                                @endcan
                                @can('setting/manage_account/permissions.read')
                                    <li class="menu-item {{ request()->segment(3) == 'permissions' ? 'active' : '' }}">
                                        <a href="{{ route('permissions.index') }}" class="menu-link">
                                            <div>Permissions</div>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('setting/manage_data.read')
                        <li class="menu-item {{ request()->segment(2) == 'manage_data' ? 'active' : '' }}">
                            <a href="" class="menu-link menu-toggle">
                                <div>Manage Lookup</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item {{ request()->segment(3) == 'proposals' ? 'active' : '' }}">
                                    <a href="{{ route('proposals.index') }}" class="menu-link">
                                        <div>Manage Proposals</div>
                                    </a>
                                </li>
                                @can('setting/manage_data/study_program.read')
                                    <li class="menu-item {{ request()->segment(3) == 'manage_studyprogram' ? 'active' : '' }}">
                                        <a href="{{ route('program.index') }}" class="menu-link">
                                            <div>Study Program</div>
                                        </a>
                                    </li>
                                @endcan
                                @can('setting/manage_data/department.read')
                                    <li class="menu-item {{ request()->segment(4) == 'manage_departement' ? 'active' : '' }}">
                                        <a href="{{ route('dept.index') }}" class="menu-link">
                                            <div>Departement</div>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
    </ul>
</aside>
<!-- / Menu -->
