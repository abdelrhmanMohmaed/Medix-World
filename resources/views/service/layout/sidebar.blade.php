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
            <li class="nav-item nav-category">Appointments</li>
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
                        <a href="{{ route('services.patients.index') }}"
                            class="nav-link {{ active_class(['ui-components/alerts']) }}">Patients</a>
                    </li>
                </ul>
            </div>
        </ul>
    </div>
</nav>
