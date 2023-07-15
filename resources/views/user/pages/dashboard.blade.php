<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="page étudiant" name="keywords">
    <meta content="page étudiant" name="description">
    @include('user.Layouts.head')
</head>
<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Navbar -->
    <div class="container-fluid position-relative p-0">
        @include('user.layouts.navbar')
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{asset('images/back_img1.png')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Génie & Informatique</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Bienvenu dans votre Espace Personnel</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Contactez-Nous</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{asset('images/back_img2.png')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Génie & Informatique</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Bienvenu dans votre Espace Personnel</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Contactez-Nous</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Navbar-->

    <!-- button de recherche en plein écran -->
    @include('user.layouts.btn_recherche')
    <!-- button de recherche en plein écran -->

    <!-- bar des infos-->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Étudiants de la formation</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">{{Auth::user()->count()}}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-check text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-primary mb-0">*******</h5>
                            <h1 class="mb-0" data-toggle="counter-up">0</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-award text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Ensiegnant</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">{{$nbrenseignant->count()}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bar des infos -->


     <!-- début Profile -->
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
    <!--fin de Profil -->

  <!-- début les Avis -->
  <div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">les annonces </h5>
                <h1 class="mb-0">*********************</h1>
            </div>
            <div class="row g-5">
                @foreach($avis_all as $item)
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center ">
                        <div class="service-icon text-white">
                            <i class="bi bi-star"></i>
                        </div>
                        <h4 class="mb-3">{{$item->titre}}</h4>
                        <p class="m-0 px-4 " align="justify">{{$item->description}}</p>
                        <div class="d-flex my-3">
                                <small class="me-3 float-right"><i class="far fa-user text-primary me-2 "></i>{{$item->publier_par}}</small>
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>{{$item->created_at}}</small>
                        </div>
                        <a class="btn btn-lg btn-primary rounded" href="{{ asset($item->fichier_pdf) }}" target="_blank" >
                            <i class="bi bi-eye"></i>
                        </a>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-center">
                {!! $avis_all ->onEachSide(2)->links() !!}
               </div>
            </div>
        </div>
    </div>
<!--fin  Les avis -->

    <!-- Pricing Plan Start -->
    <!--
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Pricing Plans</h5>
                <h1 class="mb-0">We are Offering Competitive Prices for Our Clients</h1>
            </div>
            <div class="row g-0">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="bg-light rounded">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="text-primary mb-1">Basic Plan</h4>
                            <small class="text-uppercase">For Small Size Business</small>
                        </div>
                        <div class="p-5 pt-0">
                            <h1 class="display-5 mb-3">
                                <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>49.00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small>
                            </h1>
                            <div class="d-flex justify-content-between mb-3"><span>HTML5 & CSS3</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Bootstrap v5</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Responsive Layout</span><i class="fa fa-times text-danger pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-2"><span>Cross-browser Support</span><i class="fa fa-times text-danger pt-1"></i></div>
                            <a href="" class="btn btn-primary py-2 px-4 mt-4">Order Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded shadow position-relative" style="z-index: 1;">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="text-primary mb-1">Standard Plan</h4>
                            <small class="text-uppercase">For Medium Size Business</small>
                        </div>
                        <div class="p-5 pt-0">
                            <h1 class="display-5 mb-3">
                                <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>99.00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small>
                            </h1>
                            <div class="d-flex justify-content-between mb-3"><span>HTML5 & CSS3</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Bootstrap v5</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Responsive Layout</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-2"><span>Cross-browser Support</span><i class="fa fa-times text-danger pt-1"></i></div>
                            <a href="" class="btn btn-primary py-2 px-4 mt-4">Order Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                    <div class="bg-light rounded">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="text-primary mb-1">Advanced Plan</h4>
                            <small class="text-uppercase">For Large Size Business</small>
                        </div>
                        <div class="p-5 pt-0">
                            <h1 class="display-5 mb-3">
                                <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>149.00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small>
                            </h1>
                            <div class="d-flex justify-content-between mb-3"><span>HTML5 & CSS3</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Bootstrap v5</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Responsive Layout</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-2"><span>Cross-browser Support</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <a href="" class="btn btn-primary py-2 px-4 mt-4">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Pricing Plan End -->

    <!--début Les cours -->
    <div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h4 class="fw-bold text-primary text-uppercase">les cours de cette Formation</h4>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
                <a href="{{route('user.Cours')}}" class="text-decoration-none text-black">
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="{{asset('images/semester_img.png')}}" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Semester 1</h4>
                           
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5 text-black">
                    <small class="text-uppercase bold ">Les modules concernant ce semestre</small>
                   <ul>
                <li>Structure de données et programmation avancée en C</li>
                <li>Architecture des ordinateurs</li>
                <li>Méthodes numérique pour l’ingénieur et Analyse de données</li>
                <li>Systèmes d’Information et Bases de Données</li>
                <li>Réseaux informatiques</li>
                <li>Langues et Communication 1</li>
                </ul>
                </div>
                </div>
                </a>
                <a href="{{route('user.Cours')}}" class="">
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="{{asset('images/semester_img.png')}}" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Semestre 2</h4>
                            <small class="text-uppercase">*********</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5 text-black">
                    <ul>
                <li>Programmation Orientée Objet C++</li>
                <li>Modélisation avec UML</li>
                <li>Recherche Opérationnelle</li>
                <li>Développement d’applications Web</li>
                <li>Techniques et économie de l’entreprise</li>
                <li>Algorithmique avancée et Complexité</li>
                <li>Langues et Communication 2</li>
                </ul>    
                    </div>
                </div>
                </a>
                <a href="{{route('user.Cours')}}" class="">
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="{{asset('images/semester_img.png')}}" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Semestre 3</h4>
                            <small class="text-uppercase">*********</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5 text-black">
                    <ul>
                <li>XML et Applications web avancées</li>
                <li>Administration système Linux</li>
                <li>Gestion de l'entreprise</li>
                <li>Génie logiciel et IHM</li>
                <li>Apprentissage Statistique</li>
                <li>Programmation Java</li>
                </ul>
                    </div>
                </div>
                </a>
                <a href="{{route('user.Cours')}}" class="">
                <div class="testimonial-item bg-light my-4 ">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="{{asset('images/semester_img.png')}}" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Semestre 4</h4>
                            <small class="text-uppercase">**********</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5 text-black">
                    <ul>
                <li>Gestion de projet / Projet de fin d'année</li>
                <li>Interconnexion et Administration des réseaux</li>
                <li>Bases de données avancées</li>
                <li>Technologies distribuées</li>
                <li>Intelligence artificielle</li>
                <li>Communication professionnelle</li>
                </ul>
                    </div>
                </div>
                </a>
                <a href="{{route('user.Cours')}}" class="">
                <div class="testimonial-item bg-light my-4 ">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="{{asset('images/semester_img.png')}}" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Semestre 5</h4>
                            <small class="text-uppercase">***********</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5 text-black">
                    <ul>
                <li>Cryptographie et Sécurité Informatique</li>
                <li>Analyse et conception des systèmes décisionnels</li>
                <li>CRM / ERP</li>
                <li>Développement des applications mobiles</li>
                <li>Virtualisation et Cloud Computing</li>
                <li>Ressources humaines et la gestion financière des entreprises</li>
                </ul>
                    </div>
                </div>
                </a>
                <a href="{{route('user.Cours')}}" class="">
                <div class="testimonial-item bg-light my-4 ">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="{{asset('images/semester_img.png')}}" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Semestre 6</h4>
                            <small class="text-uppercase">***********</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5 text-black">
                    <ul>
                <li>Projet fin d'étude (stage de 4/6 mois)</li>
                </ul>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
    <!-- fin des cours-->

    <!-- Team Start -->
    <!--
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Team Members</h5>
                <h1 class="mb-0">Professional Stuffs Ready to Help Your Business</h1>
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
                            <h4 class="text-primary">Full Name</h4>
                            <p class="text-uppercase m-0">Designation</p>
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
                            <h4 class="text-primary">Full Name</h4>
                            <p class="text-uppercase m-0">Designation</p>
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
                            <h4 class="text-primary">Full Name</h4>
                            <p class="text-uppercase m-0">Designation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Team End -->


    <!-- Blog Start -->
    <!--
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Latest Blog</h5>
                <h1 class="mb-0">Read The Latest Articles from Our Blog Post</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="img/blog-1.jpg" alt="">
                            <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Web Design</a>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="far fa-user text-primary me-2"></i>John Doe</small>
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Jan, 2045</small>
                            </div>
                            <h4 class="mb-3">How to build a website</h4>
                            <p>Dolor et eos labore stet justo sed est sed sed sed dolor stet amet</p>
                            <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="img/blog-2.jpg" alt="">
                            <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Web Design</a>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="far fa-user text-primary me-2"></i>John Doe</small>
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Jan, 2045</small>
                            </div>
                            <h4 class="mb-3">How to build a website</h4>
                            <p>Dolor et eos labore stet justo sed est sed sed sed dolor stet amet</p>
                            <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="img/blog-3.jpg" alt="">
                            <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Web Design</a>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="far fa-user text-primary me-2"></i>John Doe</small>
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Jan, 2045</small>
                            </div>
                            <h4 class="mb-3">How to build a website</h4>
                            <p>Dolor et eos labore stet justo sed est sed sed sed dolor stet amet</p>
                            <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Blog Start -->

    <!-- Footer Start -->
    @include('user.layouts.footer_page')
    <!-- Footer End -->

    <!-- retourner  vers le haut  -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>
    @include('user.layouts.footer_script')
</body>
</html>