<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{url('/enseignant/dashboard')}}" class="app-brand-link">
          <img  src="{{asset('/assets/img/GI.png')}}" alt="logo"  class="img-fluid "/>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow "></div>

    <ul class="menu-inner py-1 my-3">
      <!-- Dashboard -->
      <li class="menu-item active">
        <a href="{{url('/enseignant/dashboard')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Profile</div>
        </a>
      </li>

      <li class="menu-item my-2">
        <a href="{{url('/enseignant/Module')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-file"></i>
          <div data-i18n="Tables">Module</div>
        </a>
      </li>
      <li class="menu-item my-2">
        <a href="{{url('/enseignant/Cours')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-book"></i>
          <div data-i18n="Tables">Cours</div>
        </a>
      </li>
      <li class="menu-item my-2">
        <a href="{{url('/enseignant/Note')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Tables">Notes</div>
        </a>
      </li>
      <li class="menu-item my-2">
        <a href="{{url('/enseignant/Absence')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-list-check"></i>
          <div data-i18n="Tables">Absence</div>
        </a>
      </li>
      <li class="menu-item my-2">
        <a href="{{url('/enseignant/Avis')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-crown"></i>
          <div data-i18n="Tables">Avis</div>
        </a>
      </li>
      <li class="menu-item  fixed-bottom">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
        <a href="{{route('admin.logout')}}" class="menu-link text-danger">

          <i class="menu-icon tf-icons bx bx-power-off    "></i>
          <div data-i18n="Tables">Se déconnecter</div>
        </a>
        </form>
      </li>


    </ul>
  </aside>
