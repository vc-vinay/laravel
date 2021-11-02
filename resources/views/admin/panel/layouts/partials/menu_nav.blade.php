<!--begin::Menu Nav-->
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
  <div class="sb-sidenav-menu">
    <div class="nav">
      <div class="sb-sidenav-menu-heading">Core</div>
      <a class="nav-link {{ (request()->routeIs('home')) ? 'active' : '' }}" href="{{ route('home') }}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
        Dashboard
      </a>
      <a href="{{ route('companies.index') }}" class="nav-link {{ (request()->routeIs('companies*')) ? 'active' : '' }}">
        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
        {{ trans('menu.side_menu.company') }}
      </a>

      <a href="{{ route('employees.index') }}" class="nav-link {{ (request()->routeIs('employees*')) ? 'active' : '' }}">
        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
        {{ trans('menu.side_menu.employee') }}
      </a>

    </div>
  </div>
  <div class="sb-sidenav-footer">
    <div class="small">Logged in as:</div>
    {{ auth()->user()->name }}
  </div>
</nav>
<!--end::Menu Nav-->