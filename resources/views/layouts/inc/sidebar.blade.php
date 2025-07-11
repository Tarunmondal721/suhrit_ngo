<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
        <img src="" class="navbar-brand-img h-100" alt="">
        <span class="ms-1 font-weight-bold text-white">Admin Dashboard</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white bg-gradient-primary" href="/admin/dashboard">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white  {{ Request::is('admin.blog') ? 'active' : '' }}" href="{{ route('admin.blog')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">inventory_2</i>

            </div>
            <span class="nav-link-text ms-1">Blog</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-white {{ Request::is('admin.gallery') ? 'active' : ''}} " href="{{route('admin.gallery')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add_circle</i>
            </div>
            <span class="nav-link-text ms-1">Gallery</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-white {{ Request::is('events.index') ? 'active' : ''}} " href="{{route('events.index')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">inventory_2</i>
            </div>
            <span class="nav-link-text ms-1">Event</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{ Request::is('admin/services*') ? 'active' : '' }}" href="{{ url('admin/services') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">add_circle</i>
                </div>
                <span class="nav-link-text ms-1">Services</span>
            </a>
        </li>

        <li class="nav-item ">
          <a class="nav-link text-white {{ Request::is('adnim/donation') ? 'active' : ''}} " href="{{url('admin/donation')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">list_alt</i>
            </div>
            <span class="nav-link-text ms-1">Donation List</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-white {{ Request::is('users') ? 'active' : ''}} " href="{{url('users')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">group</i>
            </div>
            <span class="nav-link-text ms-1">Users List</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-white {{ Request::is('users') ? 'active' : ''}} " href="{{url('message')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">message</i>
            </div>
            <span class="nav-link-text ms-1">Messages</span>
          </a>
        </li>

      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
          <a  class="btn bg-gradient-primary mt-4 w-100" href="{{ route('logout') }}"
          class="nav-link text-body font-weight-bold px-0" onclick="event.preventDefault();
          document.getElementById('logout-form').submit(); ">
            <i class="fa fa-user me-sm-1"></i>
            <span class="d-sm-inline d-none"> {{ __('Logout') }}</span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </a>
      </div>
    </div>
  </aside>
