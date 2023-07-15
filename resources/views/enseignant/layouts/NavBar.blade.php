<nav
class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
id="layout-navbar"
 >
<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
  <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
    <i class="bx bx-menu bx-sm"></i>
  </a>
</div>

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
  <!-- Search -->
  <div class="navbar-nav align-items-center">
    <div class="nav-item d-flex align-items-center">
      <i class="bx bx-search fs-4 lh-0"></i>
      <input
        type="text"
        class="form-control border-0 shadow-none"
        placeholder="Search..."
        aria-label="Search..."
      />
    </div>
  </div>
  <!-- /Search -->

  <ul class="navbar-nav flex-row align-items-center ms-auto">


    <!-- User -->
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
          <img src="{{asset(Auth::guard('admin')->user()->image)}}" alt class="w-px-40 h-auto rounded-circle" />
        </div>
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
        <li>
          <a class="dropdown-item" href="#">
            <div class="d-flex">
              <div class="flex-shrink-0 me-3">
                <div class="avatar avatar-online">
                  <img src="{{asset(Auth::guard('admin')->user()->image)}}" alt class="w-px-40 h-auto rounded-circle" />
                </div>
              </div>
              <div class="flex-grow-1">
                <span class="fw-semibold d-block">{{Auth::guard('admin')->user()->nom}} {{Auth::guard('admin')->user()->prenom}}</span>
                <small class="text-muted">{{Auth::guard('admin')->user()->role}}</small>
              </div>
            </div>
          </a>
        </li>
        <li>
          <div class="dropdown-divider"></div>
        </li>
        <li>
          <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalCenter1" >
            <i class="bx bx-user me-2"></i>
            <span class="align-middle">Mon Profile</span>
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalCenter2">
            <i class="bx bx-cog me-2"></i>
            <span class="align-middle">Paramètres</span>
          </a>
        </li>

        <li>
          <div class="dropdown-divider"></div>
        </li>
        <li>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf

          <a class="dropdown-item" href="{{route('admin.logout')}}">
            <i class="bx bx-power-off me-2"></i>
            <span class="align-middle">Se déconnecter</span>
          </a>
            </form>
        </li>
      </ul>
    </li>
    <!--/ User -->
  </ul>
</div>
</nav>
<div class="modal fade" id="modalCenter1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Mon profile</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
      <div class="modal-body">

        <div class="card " >
            <div class="card-body" >
              <div class="d-flex flex-column align-items-center text-center">
                <img
                  src="{{asset(Auth::guard('admin')->user()->image)}}"
                  alt="user-avatar"
                  class="img-fluid rounded   justify-center"
                  height="100"
                  width="100"
                  id="uploadedAvatar"
                />
                <br>
                <div class="button-wrapper ">
                  <p class="text-muted mb-0">{{Auth::guard('admin')->user()->nom}} {{Auth::guard('admin')->user()->prenom}}</p>
                </div>
              </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
              <form id="formAccountSettings" method="POST" onsubmit="return false">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Nom</label>
                    <input
                      class="form-control"
                      type="text"
                      id="firstName"
                      name="firstName"
                      value="{{Auth::guard('admin')->user()->nom}}"
                      autofocus
                      disabled
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Prenome</label>
                    <input class="form-control" type="text" name="lastName" id="lastName" value="{{Auth::guard('admin')->user()->prenom}}" disabled />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input
                      class="form-control"
                      type="text"
                      id="email"
                      name="email"
                      value="{{Auth::guard('admin')->user()->email}}"
                      placeholder="john.doe@example.com"
                      disabled
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="organization" class="form-label">CIN</label>
                    <input
                      type="text"
                      class="form-control"
                      id="organization"
                      name="organization"
                      value="{{Auth::guard('admin')->user()->cin}}"
                      disabled
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">N°Tell</label>
                    <div class="input-group input-group-merge">

                      <input
                        type="text"
                        id="phoneNumber"
                        name="phoneNumber"
                        class="form-control"
                       value="{{Auth::guard('admin')->user()->telephone}}"
                       disabled
                      />
                    </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{Auth::guard('admin')->user()->adresse}}" disabled />
                  </div>
              </form>
            </div>
    </div>

        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
</div>
</div>


<div class="modal fade" id="modalCenter2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Mon profile</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">

            <div class="card " >
                <div class="card-body" >
                  <div class="d-flex flex-column align-items-center text-center">
                    <img
                      src="{{asset(Auth::guard('admin')->user()->image)}}"
                      alt="user-avatar"
                      class="img-fluid rounded   justify-center"
                      height="100"
                      width="100"
                      id="uploadedAvatar"
                    />
                    <br>
                    <div class="button-wrapper ">
                      <p class="text-muted mb-0">{{Auth::guard('admin')->user()->nom}} {{Auth::guard('admin')->user()->prenom}}</p>
                    </div>
                  </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                  <form id="formAccountSettings" method="POST" onsubmit="return false">
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">Nom</label>
                        <input
                          class="form-control"
                          type="text"
                          id="firstName"
                          name="firstName"
                          value="{{Auth::guard('admin')->user()->nom}}"
                          autofocus

                        />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Prenome</label>
                        <input class="form-control" type="text" name="lastName" id="lastName" value="{{Auth::guard('admin')->user()->prenom}}"  />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input
                          class="form-control"
                          type="text"
                          id="email"
                          name="email"
                          value="{{Auth::guard('admin')->user()->email}}"
                          placeholder="john.doe@example.com"

                        />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="organization" class="form-label">CIN</label>
                        <input
                          type="text"
                          class="form-control"
                          id="organization"
                          name="organization"
                          value="{{Auth::guard('admin')->user()->cin}}"

                        />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label" for="phoneNumber">N°Tell</label>
                        <div class="input-group input-group-merge">

                          <input
                            type="text"
                            id="phoneNumber"
                            name="phoneNumber"
                            class="form-control"
                           value="{{Auth::guard('admin')->user()->telephone}}"

                          />
                        </div>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{Auth::guard('admin')->user()->adresse}}"  />
                      </div>

                </div>
        </div>

            <div class="modal-footer">

            </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary me-2">Modifier</button>
            <button type="reset" class="btn btn-warning" data-bs-dismiss="modal">Annuler</button>
        </div>
          </form>
      </div>
    </div>
  </div>
</div>
</div>
