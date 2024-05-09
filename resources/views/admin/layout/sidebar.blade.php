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
        <a href="{{ route('admins.dashboard.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>

      <!-- settings -->
      <li class="nav-item nav-category">Settings</li>
      <li class="nav-item {{ active_class(['ui-components/*']) }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="{{ is_active_route(['ui-components/*']) }}" aria-controls="uiComponents">
          <i class="link-icon" data-feather="map-pin"></i>
          <span class="link-title">Location</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['ui-components/*']) }}" id="uiComponents">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ route('admins.cities.index') }}" class="nav-link {{ active_class(['ui-components/accordion']) }}">City</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/alerts') }}" class="nav-link {{ active_class(['ui-components/alerts']) }}">Region</a>
            </li>

          </ul>
        </div>

<!-- service provider -->
        <li class="nav-item nav-category">Service Providers</li>
      <li class="nav-item {{ active_class(['serviceProvider/*']) }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#serviceProvider" role="button" aria-expanded="{{ is_active_route(['userviceProvider/*']) }}" aria-controls="uiComponents">
          <i class="fa-solid fa-user-nurse"></i>
          <span class="link-title">Service Providers</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['serviceProvider/*']) }}" id="serviceProvider">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ route('admins.service_provider.requests') }}" class="nav-link {{ active_class(['serviceProvider/accordion']) }}">Service Provider Requests</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admins.service_provider.index') }}" class="nav-link {{ active_class(['serviceProvider/alerts']) }}">Active Service Provider</a>
            </li>

          </ul>
        </div>
</nav>