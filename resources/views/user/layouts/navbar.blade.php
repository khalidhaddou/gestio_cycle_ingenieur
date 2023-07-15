<nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="{{route('user.dashboard')}}" class="navbar-brand p-0">
                <h1 class="m-0 "style="color : rgb(255,105,0);"><i class="fa fa-user-tie me-2" ></i>{{Auth::user()->prenom}}</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{route('user.dashboard')}}" class="nav-item nav-link">Accueil</a>
                    <a href="{{route('user.Profile')}}" class="nav-item nav-link">Profile</a>
                    <a href="{{route('user.Avis')}}" class="nav-item nav-link">Avis</a>
                    <a href="{{route('user.Cours')}}" class="nav-item nav-link">Cours</a>
                    <a href="{{route('user.Notes')}}" class="nav-item nav-link">Notes</a>
                    <a href="{{route('user.Contact')}}" class="nav-item nav-link">Contact</a>
                    <form action="{{route('logout')}}" method="POST" class="nav-item nav-link ">
                        @csrf
                    <button type="submit" class="btn btn-link bg-transparent text-white   fs-5">Déconnexion</button>
                    </form>
                </div>
                <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
            </div>
</nav>