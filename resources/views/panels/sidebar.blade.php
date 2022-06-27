@inject('request', 'Illuminate\Http\Request')
@php
$configData = Helper::applClasses();
@endphp
<div class="main-menu menu-fixed {{(($configData['theme'] === 'dark') || ($configData['theme'] === 'semi-dark')) ? 'menu-dark' : 'menu-light'}} menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item me-auto">
        <a class="navbar-brand" href="{{url('/')}}">
          <span class="brand-logo">
            <img src="{{ asset('images/logo/logo.png') }}">
          </span>
          <h2 class="brand-text">ABHG</h2>
        </a>
      </li>
      <li class="nav-item nav-toggle">
        <a class="nav-link modern-nav-toggle pe-0" data-toggle="collapse">
          <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
          <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc" data-ticon="disc"></i>
        </a>
      </li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class="nav-item {{ $request->segment(1) == '' && $request->segment(2) == '' ? 'active' : '' }}">
          <a href="/" class="nav-link d-flex align-items-center">
            <i data-feather="home"></i>
            <span>Home</span>
          </a>
      </li>
<!--       <li class="nav-item {{ $request->segment(1) == 'wizard' && $request->segment(2) == '' ? 'active' : '' }}">
          <a href="{{ route('card.create') }}" class="nav-link d-flex align-items-center">
            <i data-feather="file-text"></i>
            <span>Wizard</span>
          </a>
      </li> -->

      <li class="nav-item {{ $request->segment(1) == 'card' && $request->segment(2) == '' ? 'active' : '' }}">
          <a href="{{ route('card.index') }}" class="nav-link d-flex align-items-center">
            <i data-feather="credit-card"></i>
            <span>My Card</span>
          </a>
      </li>

    </ul>
  </div>
</div>
<!-- END: Main Menu-->
