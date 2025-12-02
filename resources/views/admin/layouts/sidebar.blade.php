<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('logo/logo-ccras.jpg') }}" alt="IRF Admin Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">IRF Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (auth()->user()->profile_image)
                <img src="{{ asset('storage/'.auth()->user()->profile_image) }}" class="img-circle elevation-2"
                    alt="User Image" style="width:50px;height:50px;">
                @else
                <img src="{{ asset('logo/logo-ccras.jpg') }}" class="img-circle elevation-2" alt="User Image">
                @endif

            </div>
            <div class="info">
                <a href="{{ route('user.profile', ['id' => auth()->user()->id]) }}" class="d-block">{{
                    ucwords(auth()->user()->name) }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" can="menu" data-accordion="false">
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'menu-open': ''}}">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active': ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @can('admin')
                <li class="nav-item">
                    <a href="{{route('mark.all')}}"
                        class="nav-link {{ request()->routeIs('mark.all') ? 'active': '' }}">
                        <i class="far fa-building nav-icon"></i>
                        <p>All Institute Marks</p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ request()->routeIs('issue') ? 'menu-open': ''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Issues
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-danger right">{{ $allIssues }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('issue.all') }}"
                                class="nav-link {{ request()->routeIs('issue.all') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Issue <span class="badge badge-danger">{{ $allIssues }}</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('issue.open')}}"
                                class="nav-link {{ request()->routeIs('issue.open') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Open <span class="badge badge-secondary">{{ $openIssues }}</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('issue.pending')}}"
                                class="nav-link {{ request()->routeIs('issue.pending') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending <span class="badge badge-primary">{{ $pendingIssues }}</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('issue.resolved')}}"
                                class="nav-link {{ request()->routeIs('issue.resolved') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Resolved <span class="badge badge-success">{{ $resolvedIssues }}</span></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ request()->routeIs('user') ? 'menu-open': ''}}">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">{{ $allUsers }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.all') }}"
                                class="nav-link {{ request()->routeIs('users.all') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan


                @can('department')
                <li class="nav-item has-treeview {{ request()->routeIs('issue') ? 'menu-open': ''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Issues
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-danger right">{{ $allIssues }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('issue.all') }}"
                                class="nav-link {{ request()->routeIs('issue.all') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Issue <span class="badge badge-danger">{{ $allIssues }}</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('issue.open')}}"
                                class="nav-link {{ request()->routeIs('issue.open') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Open <span class="badge badge-secondary">{{ $openIssues }}</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('issue.pending')}}"
                                class="nav-link {{ request()->routeIs('issue.pending') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending <span class="badge badge-primary">{{ $pendingIssues }}</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('issue.resolved')}}"
                                class="nav-link {{ request()->routeIs('issue.resolved') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Resolved <span class="badge badge-success">{{ $resolvedIssues }}</span></p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan



                @can('institute')
                <li class="nav-item has-treeview {{ request()->routeIs('mark') ? 'menu-open': '' }}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Marks
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('mark.store')}}"
                                class="nav-link {{ request()->routeIs('mark.store') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Marks</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{route('mark.edit', ['id' => auth()->user()->id])}}"
                                class="nav-link {{ request()->routeIs('mark.edit') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Update Marks</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{route('mark.view', ['id' => auth()->user()->id])}}"
                                class="nav-link {{ request()->routeIs('mark.view') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Marks</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @can('super admin')
                <li class="nav-item">
                    <a href="{{route('mark.all')}}"
                        class="nav-link {{ request()->routeIs('mark.all') ? 'active': '' }}">
                        <i class="far fa-building nav-icon"></i>
                        <p>All Institute Marks</p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ request()->routeIs('user') ? 'menu-open': ''}}">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">{{ $allUsers }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.all') }}"
                                class="nav-link {{ request()->routeIs('users.all') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.store') }}"
                                class="nav-link {{ request()->routeIs('user.store') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Users</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @can('access-issue')
                <li class="nav-item has-treeview {{ request()->routeIs('issue') ? 'menu-open': ''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Issues
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-danger right">{{ $allIssues }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('issue.all') }}"
                                class="nav-link {{ request()->routeIs('issue.all') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Issue <span class="badge badge-danger">{{ $allIssues }}</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('issue.create') }}"
                                class="nav-link {{ request()->routeIs('issue.create') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Raise Issue</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('issue.open')}}"
                                class="nav-link {{ request()->routeIs('issue.open') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Open <span class="badge badge-secondary">{{ $openIssues }}</span></p>
                            </a>
                        </li>
                        @can('super admin')
                        <li class="nav-item">
                            <a href="{{route('issue.pending')}}"
                                class="nav-link {{ request()->routeIs('issue.pending') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending <span class="badge badge-primary">{{ $pendingIssues }}</span></p>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a href="{{route('issue.resolved')}}"
                                class="nav-link {{ request()->routeIs('issue.resolved') ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Resolved <span class="badge badge-success">{{ $resolvedIssues }}</span></p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>