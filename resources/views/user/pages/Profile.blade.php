@extends('user.layouts.page_principale')
@section('title')
Profile
@endsection
@section('title_page')
Mon Profile
@endsection
@section('css')
@endsection
@section('script')
@endsection
@section('content')
<div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-3">
            <div class="row g-5">
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn rounded-circle" data-wow-delay="0.9s" src="{{asset(Auth::user()->image)}}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h1 class="mb-0">{{Auth::user()->prenom}} {{Auth::user()->nom}}</h1>
                    </div>
                    <div class=" p-4">
                       <div class="row py-3 ">
                            <div class="col-md bold fs-5 ">Code Massar : <span class="text-primary">{{Auth::user()->cne}}</span></div>
                            <div class="col-md bold fs-5">N° CNI : <span class="text-primary">{{Auth::user()->cin}}</span></div>
                        </div>
                        <div class="row py-3 ">
                            <div class="col-md bold fs-5">Nom : <span class="text-primary">{{Auth::user()->nom}}</span></div>
                            <div class="col-md bold fs-5">Prénom : <span class="text-primary">{{Auth::user()->prenom}}</span></div>
                        </div>
                        <div class="row py-3">
                            <div class="col-md bold fs-5">date Naissance : <span class="text-primary">{{Auth::user()->date_Naissance}}</span></div>
                            <div class="col-md bold fs-5">adresse : <span class="text-primary">{{Auth::user()->adresse}}</span></div>
                        </div>
                        <div class="row py-3">
                            <div class="col-md bold fs-5">Téléphone : <span class="text-primary">{{Auth::user()->N_telephone}}</span></div>
                            <div class="col-md bold fs-5">Email : <span class="text-primary">{{Auth::user()->email}}</span></div>
                        </div>
                        <div class="row py-3">
                            <div class="col-md bold fs-5">Semester : <span class="text-primary">{{Auth::user()->semestre}}</span></div>
                            <!-- <div class="col-md bold fs-5">YYY : <span class="text-primary"> ******</span></div> -->
                        </div>        
                    </div>
                    <div class="text-center">
                    <a href="quote.html" class="btn btn-primary py-3 px-4  wow zoomIn " data-wow-delay="0.9s">Modifier</a>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Plus d'informations</h5>
                <h1 class="mb-0">***********************</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-1.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Nom</h4>
                            <p class="text-uppercase m-0">{{Auth::user()->nom}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-2.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Code Massar</h4>
                            <p class="text-uppercase m-0">{{Auth::user()->cne}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-3.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Prènom</h4>
                            <p class="text-uppercase m-0">{{Auth::user()->prenom}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

