<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            MEDIX<span>World</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ route('services.dashboard.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item nav-category">Services Provider</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ route('services.profile.index') }}" class="nav-link">
                    <i class="fa-solid fa-user"></i> <span class="link-title">Profile</span>
                </a>
            </li>


            <!-- Settings -->
            <li class="nav-item nav-category">Settings</li>
            <!-- Appointments -->
            <li class="nav-item {{ active_class(['ui-components/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button"
                    aria-expanded="{{ is_active_route(['ui-components/*']) }}" aria-controls="uiComponents">
                    <i class="fa-solid fa-location-dot"></i> <span class="link-title">Appointments</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
            </li>
            <div class="collapse {{ show_class(['ui-components/*']) }}" id="uiComponents">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('services.schedules.index') }}"
                            class="nav-link {{ active_class(['ui-components/accordion']) }}">Schedules</a>
                    </li>
                    <li class="nav-item">
                        <a {{-- href="{{ route('admins.regions.index') }}" --}}
                            class="nav-link {{ active_class(['ui-components/alerts']) }}">Patients</a>
                    </li>
                </ul>
            </div>


            <!-- roles and permissions -->

            {{-- <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ route('admins.roles.index') }}" class="nav-link">
                    <i class="fa-solid fa-lock"></i> <span class="link-title">Roles </span>
                </a>
            </li> --}}

            {{-- <!-- <li class="nav-item {{ active_class(['roles/*']) }}">
                  <a class="nav-link" data-bs-toggle="collapse" href="#roles" role="button" aria-expanded="{{ is_active_route(['roles/*']) }}" aria-controls="uiComponents">
                    <i class="fa-solid fa-lock"></i> <span class="link-title">Roles</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                  </a>
                </li>
                <div class="collapse {{ show_class(['roles/*']) }}" id="roles">
                  <ul class="nav sub-menu">
                    <li class="nav-item">
                      <a href="{{ route('admins.roles.index') }}" class="nav-link {{ active_class(['roles/accordion']) }}">Roles</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('admins.permissions.index') }}" class="nav-link {{ active_class(['roles/alerts']) }}">Permissions</a>
                    </li>
                  </ul>
                </div> --> --}}

            <!-- majors -->
            {{-- <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ route('admins.majors.index') }}" class="nav-link">
                    <i class="fa-solid fa-capsules"></i> <span class="link-title">Majors</span>
                </a>
            </li>

            <!-- terms -->
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ route('admins.terms.index') }}" class="nav-link">
                    <i class="fa-solid fa-paperclip"></i> <span class="link-title">Terms and Conditions </span>
                </a>
            </li>

            <li class="nav-item nav-category">Users</li>

            <!-- service provider -->
            <li class="nav-item {{ active_class(['serviceProvider/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#serviceProvider" role="button"
                    aria-expanded="{{ is_active_route(['userviceProvider/*']) }}" aria-controls="uiComponents">
                    <i class="fa-solid fa-user-doctor"></i> <span class="link-title">Service Providers</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
            </li>

            <div class="collapse {{ show_class(['serviceProvider/*']) }}" id="serviceProvider">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('admins.service_provider.requests', 'pending') }}"
                            class="nav-link {{ active_class(['serviceProvider/accordion']) }}">Pending Requests</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admins.service_provider.requests', 'reject') }}"
                            class="nav-link {{ active_class(['serviceProvider/accordion']) }}">Rejected Requests</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admins.service_provider.index') }}"
                            class="nav-link {{ active_class(['serviceProvider/alerts']) }}">Active Service Provider</a>
                    </li>

                </ul>
            </div>

            <!-- Patient -->
            <li class="nav-item {{ active_class(['pages/*']) }}">
                <a href="{{ route('admins.users.index') }}" class="nav-link"> <i class="fa-solid fa-users"></i><span
                        class="link-title">Patients </span></a>
            </li>
            <!-- Pages -->
            <li class="nav-item nav-category">Pages</li>
            <li class="nav-item {{ active_class(['pages/*']) }}">
                <a href="{{ route('admins.advices.index') }}" class="nav-link"> <i
                        class="fa-solid fa-window-restore"></i>
                    <span class="link-title">Advice </span></a>
            </li> --}}

    </div>
</nav>