<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="page étudiant" name="keywords">
    <meta content="page étudiant" name="description">
    <title>@yield('title')</title>
    @include('user.Layouts.head')
</head>

<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Navbar -->
    <div class="container-fluid position-relative p-0">
    @include('user.layouts.navbar')
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-3 text-center">
                    <h1 class="display-4 text-white animated zoomIn">@yield('title_page')</h1>
                    <a href="" class="h5 text-white">Accueil</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">@yield('title')</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar-->

    <!-- button de recherche en plein écran -->
    @include('user.layouts.btn_recherche')
    <!-- button de recherche en plein écran -->

    <!-- content -->
    @yield('content')
    <!-- content End -->

    <!-- Footer Start -->
    @include('user.layouts.footer_page')
    <!-- Footer End -->


    <!-- retourner  vers le haut -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>
    @include('user.layouts.footer_script')
</body>
</html>