<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Noble<span>UI</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">

    <ul class="nav" id="main-dashboard-sidebar">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item {{ active_class(['systemx']) }}">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Admin Panel</li>

{{--      @include('layout.admin.sidebar.system_users')--}}
      @include('layout.admin.sidebar.pra_status')
{{--      @include('layout.admin.sidebar.form_generator')--}}
{{--      @include('layout.admin.sidebar.services')--}}
{{--      @include('layout.admin.sidebar.sale')--}}
{{--      @include('layout.admin.sidebar.company')--}}
{{--      @include('layout.admin.sidebar.payment_method')--}}


{{--      @include('layout.admin.sidebar.services_renew')--}}
{{--      @include('layout.admin.sidebar.services_upgrade')--}}
{{--      @include('layout.admin.sidebar.vault')--}}
{{--      @include('layout.admin.sidebar.hosting')--}}
{{--      @include('layout.admin.sidebar.domain')--}}
{{--      @include('layout.admin.sidebar.ssl')--}}
    </ul>
  </div>
</nav>



<nav class="settings-sidebar">
  <div class="sidebar-body">
{{--    <a href="#" class="settings-sidebar-toggler">--}}
{{--      <i data-feather="settings"></i>--}}
{{--    </a>--}}
    <h6 class="text-muted">Sidebar:</h6>
    <div class="form-group border-bottom">
      <div class="form-check form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
          Light
        </label>
      </div>
      <div class="form-check form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
          Dark
        </label>
      </div>
    </div>
    <div class="theme-wrapper">
      <h6 class="text-muted mb-2">Light Version:</h6>
      <a class="theme-item active" href="https://www.nobleui.com/laravel/template/light/">
        <img src="{{ url('assets/images/screenshots/light.jpg') }}" alt="light version">
      </a>
      <h6 class="text-muted mb-2">Dark Version:</h6>
      <a class="theme-item" href="https://www.nobleui.com/laravel/template/dark">
        <img src="{{ url('assets/images/screenshots/dark.jpg') }}" alt="light version">
      </a>
    </div>
  </div>
</nav>
