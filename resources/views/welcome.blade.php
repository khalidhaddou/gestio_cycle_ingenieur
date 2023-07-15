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
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->
    <!-- Début Navbar -->
    <div id="Accueil" class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="/" class="navbar-brand p-0">
            <img class="w-75 py-2" src="{{asset('images/Logo_gi_site.png')}}" alt="Image">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="#Accueil" class="nav-item nav-link ">Accueil</a>
                    <a href="#Apropos" class="nav-item nav-link">Apropos de CIGI</a>
                    <a href="#Modules" class="nav-item nav-link">Modules</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Formation</a>
                        <div class="dropdown-menu m-0">
                            <a href="#Objectifs" class="dropdown-item">Objectifs</a>
                            <a href="#Compétences" class="dropdown-item">Compétences</a>
                            <a href="#Débouches" class="dropdown-item">Débouches</a>
                            <a href="#Conditions_acces" class="dropdown-item">Conditions d'acces</a>
                        </div>
                    </div>
                    <a href="#Contact" class="nav-item nav-link">Contact</a>
                    <a href="{{route('login')}}" class="nav-item nav-link">Espace Étudiants</a>
                </div>
                <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i>
            </div>
        </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
            @foreach($Avis_Public as $item)
                <div class="carousel-item">
                        <img class="w-100" src="{{asset($item->image)}}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 900px;">
                                    <h5 class="text-white text-uppercase mb-3 animated slideInDown">Génie & Informatique</h5>
                                    <h2 class=" text-white mb-md-4 animated zoomIn">{{$item->titre}}</h2>
                                    <a href="{{ asset('/storage/pdf_Avis/' .$item->fichier_pdf)}}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft "target=_blank>voir Plus ...</a>
                                </div>
                            </div>       
                </div>
                @endforeach
                <div class="carousel-item active">
                    <img class="w-100" src="{{asset('images/image_etudiants.jpeg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Génie & Informatique</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Faculté des sciences et techniques Errachidia</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Contactez-Nous</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img class="w-100" src="{{asset('images/image_etudiants2.jpeg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Génie & Informatique</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Faculté des sciences et techniques Errachidia</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Contactez-Nous</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{asset('images/back_img3.png')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Génie & Informatique</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Université Moulay Ismail de Meknès</h1>
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
    <!-- Navbar-fin de ->

    <!-- button de recherche en plein écran -->
    @include('user.layouts.btn_recherche')
    <!-- button de recherche en plein écran -->

    <!-- début infos-->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Étudiants</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">30</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-check text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-primary mb-0">********</h5>
                            <h1 class="mb-0" data-toggle="counter-up">0</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Ensiegnant</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">7</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fin infos -->
    <!-- Début A propos de CIGI -->
    <div id="Apropos" class="container-fluid py-3  wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-3">
            <div class="row g-5">
                <div class="col-md-7">
                    <div class="section-title position-relative pb-3 mb-3">
                        <h3 class="fw-bold text-secondary ">Apropos de Cycle d'Ingénieur Génie Informatique</h3>
                    </div>
                    <div class="py-2 ">
                       <div class="row py-3 ">
                            <div class="col-md bold fs-5 ">Université : <span class="text-primary"> Université Moulay Ismail de Meknès</span></div>
                        </div>
                        <div class="row py-3 ">
                            <div class="col-md bold fs-5">Etablissement dont relève la filière : <span class="text-primary text-center"> Faculté des sciences et techniques à Errachidia</span></div>
                        </div>
                        <div class="row py-3">
                            <div class="col-md bold fs-5">Département d’attache de la filière : <span class="text-primary"> Informatique</span></div>
                        </div>
                        <div class="row py-3">
                            <div class="col-md bold fs-5">Durée de Formation : <span class="text-primary">3 ans </span></div>
                        </div>
                        <div class="row py-3">
                            <div class="col-md bold fs-5">Intitulé de la filière : <span class="text-primary"> Génie Informatique</span></div>
                        </div>
                        <div class="row py-3">
                            <div class="col-md bold fs-5">Parcours de formation : <span class="text-primary">Business Intelligence  Ou Génie logiciel</span></div>
                        </div>
                        <div class="row py-3">
                            <div class="col-md bold fs-5">Coordinateur : <span class="text-primary">Pr. Yousef FARHAOUI</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn d-sm-block " data-wow-delay="0.9s" src="{{asset('images/A_propos_img.png')}}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin de A propos CIGI -->
    <!-- Début  Les Module -->
    <div id="Modules" class="container wow fadeInUp " data-wow-delay="0.1s">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h3 class="fw-bold text-secondary ">Sommaire des Modules</h3>
            </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Descriptif du Module N° :</th>
                <th scope="col">Intitulé du Module</th>
                <th scope="col">Semestres</th>
                </tr>
            </thead>
            <tbody class="text-white" style ="background-color : #87CEEB;">
                <tr>
                <th>M11</th>
                <td>Structure de données et programmation avancée en C</td>
                <td>1</td>
                </tr>
                <tr>
                <th>M12</th>
                <td>Architecture des ordinateurs</td>
                <td>1</td>
                </tr>
                <tr>
                <th>M13</th>
                <td>Méthodes numérique pour l’ingénieur et Analyse de données</td>
                <td>1</td>
                </tr>
                <tr>
                <th>M14</th>
                <td>Systèmes d’Information et Bases de Données</td>
                <td>1</td>
                </tr>
                <tr>
                <th>M15</th>
                <td>Réseaux informatiques</td>
                <td>1</td>
                </tr>
                <tr>
                <th>M16</th>
                <td>Langues et Communication 1</td>
                <td>1</td>
                </tr>
            </tbody>
            <tbody class="text-white" style ="background-color : #FAC540;">
                <tr>
                <th>M21</th>
                <td>Programmation Orientée Objet C++</td>
                <td>2</td>
                </tr>
                <tr>
                <th>M22</th>
                <td>Modélisation avec UML</td>
                <td>2</td>
                </tr>
                <tr>
                <th>M23</th>
                <td>Recherche Opérationnelle</td>
                <td>2</td>
                </tr>
                <tr>
                <th>M24</th>
                <td>Développement d’applications Web</td>
                <td>2</td>
                </tr>
                <tr>
                <th>M25</th>
                <td>Techniques et économie de l’entreprise</td>
                <td>2</td>
                </tr>
                <tr>
                <th>M26</th>
                <td>Algorithmique avancée et Complexité</td>
                <td>2</td>
                </tr>
                <tr>
                <th>M26</th>
                <td>Langues et Communication 2</td>
                <td>2</td>
                </tr>
            </tbody>
            <tbody class="text-white" style ="background-color : #87CEEB;">
                <tr>
                <th>M31</th>
                <td>XML et Applications web avancées</td>
                <td>3</td>
                </tr>
                <tr>
                <th>M32</th>
                <td>Administration système Linux</td>
                <td>3</td>
                </tr>
                <tr>
                <th>M33</th>
                <td>Gestion de l'entreprise</td>
                <td>3</td>
                </tr>
                <tr>
                <th>M34</th>
                <td>Génie logiciel et IHM</td>
                <td>3</td>
                </tr>
                <tr>
                <th>M35</th>
                <td>Apprentissage Statistique</td>
                <td>3</td>
                </tr>
                <tr>
                <th>M36</th>
                <td>Programmation Java</td>
                <td>3</td>
                </tr>
            </tbody>
            <tbody class="text-white" style ="background-color : #FAC540;">
                <tr>
                <th>M41</th>
                <td>Gestion de projet / Projet de fin d'année</td>
                <td>4</td>
                </tr>
                <tr>
                <th>M42</th>
                <td>Interconnexion et Administration des réseaux</td>
                <td>4</td>
                </tr>
                <tr>
                <th>M43</th>
                <td>Bases de données avancées</td>
                <td>4</td>
                </tr>
                <tr>
                <th>M44</th>
                <td>Technologies distribuées</td>
                <td>4</td>
                </tr>
                <tr>
                <th>M45</th>
                <td>Intelligence artificielle</td>
                <td>4</td>
                </tr>
                <tr>
                <th>M46</th>
                <td>Communication professionnelle</td>
                <td>4</td>
                </tr>
            </tbody>
            <tbody class="text-white" style ="background-color : #87CEEB;">
                <tr>
                <th>M51</th>
                <td>Cryptographie et Sécurité Informatique</td>
                <td>5   OPTION : ...</td>
                </tr>
                <tr>
                <th>M510</th>
                <td>Analyse et conception des systèmes décisionnels</td>
                <td>5   OPTION : ...</td>
                </tr>
                <tr>
                <th>M511</th>
                <td>CRM / ERP</td>
                <td>5   OPTION : ...</td>
                </tr>
                <tr>
                <th>M52</th>
                <td>Développement des applications mobiles</td>
                <td>5   OPTION : ...</td>
                </tr>
                <tr>
                <th>M53</th>
                <td>Virtualisation et Cloud Computing</td>
                <td>5   OPTION : ...</td>
                </tr>
                <tr>
                <th>M54</th>
                <td>Ressources humaines et la gestion financière des entreprises</td>
                <td>5   OPTION : ...</td>
                </tr>
                <tr>
                <th>M55</th>
                <td>Ingénierie des systèmes temps réels et embarqués</td>
                <td>5   OPTION : ...</td>
                </tr>
                <tr>
                <th>M56</th>
                <td>Ingénierie et Qualité logiciel</td>
                <td>5   OPTION : ...</td>
                </tr>
                <tr>
                <th>M57</th>
                <td>Business Intelligence et Veille Stratégique</td>
                <td>5   OPTION : ...</td>
                </tr>
                <tr>
                <th>M58</th>
                <td>Ingénierie de l’information et des connaissances</td>
                <td>5   OPTION : ...</td>
                </tr>
                <tr>
                <th>M59</th>
                <td>Data Mining et Statistique Décisionnelle</td>
                <td>5   OPTION : ...</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Fin les Module -->
    <!-- Début des objectifs-->
    <div id="Objectifs" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                    <img src="{{asset('images/objectifs_img.png')}}" alt="" class="img-fluid  ">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-3">
                        <h3 class="fw-bold text-secondary ">Objectifs de la Formation</h3>
                    </div>
                    <p align="justify">La filière a pour vocation de former des ingénieurs polyvalents avec des compétences principales scientifiques et techniques, leur permettant de maîtriser les concepts et les technologies des grands domaines de l’informatique (modélisation et programmation, bases de données, systèmes et réseaux, conception et déploiement d’applications d’entreprise, sécurité, prise de décision, analyse de données, visualisation des données,...) jusqu’aux applications les plus avancées qui se retrouvent réparties entre les deux options :
                    <ul class="aligne-items-center">
                    <li>Génie Logiciel : Ingénierie logiciel, test et qualité logiciel, ...</li>
                    <li>Business Intelligence : Analyse de grandes masses de données (Big Data Intelligence artificielle et reporting,...</li>
                    </ul>
                    </p>
                    <p align="justify">
                    Dans un contexte d’innovations technologiques et de méthodes modernes de management des entreprises et afin de préparer au mieux nos étudiants au monde de l’entreprise, des modules de management, de marketing et de communication ont été mis en place sur les trois années de la formation.</p>
                    <p align="justify">
                    Les élèves-ingénieurs complètent leur formation académique en effectuant des stages pratiques. Chaque année ils sont amenés à effectuer, dans des entreprises, différents types de stages :
                    <ul>
                    <li type="squar">un stage opérateur en 1ère année (juillet)</li>
                    <li type="squar">un stage ingénieur adjoint en 2ème année (mi-juin et mi-août)</li>
                    <li tupe="squar">un Projet de Fin d’Etudes en 3ème année (de février à juin)</li>
                    </ul>
                    </p>
                    <p align="justify">
                    Les stages permettent aux élèves-ingénieurs de participer à la vie de la structure d’accueil. Ils offrent
                    également aux élèves ingénieurs la possibilité d’acquérir une expérience professionnelle dans le
                    domaine de leur spécialité</p>
                </div>
            </div>
        </div>
    </div>
    <!-- fin des objectifs -->
    <!-- Début de debouche -->
    <div id="Débouches" class="py-3 ">
        <div class="container">
            <div class="row align-items-center justify-content-center flex-row-reverse">
                <div class="col-md bg-primary text-center">
                    <img src="{{asset('images/about.jpg')}}" alt="" class="img-fluid w-50 ">
                </div>
                <div class="col-md py-2">
                <div class="section-title position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h3 class="fw-bold text-secondary ">Débouches de la Formation</h3>
                </div>
                <p align="justify">Les ingénieurs en informatique sont très appréciés pour leur polyvalence. Ils peuvent exercer dans de grandes SSII, start-up, laboratoires de R&D publics ou privés, services informatiques des grandes sociétés ou des administrations</p>
                </div>
            </div>
        </div>
    </div>
    <!-- fin de debouche -->
    <!-- Début condition d'acces -->
    <div id="Conditions_acces" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h3 class="fw-bold text-secondary ">Condition d'acces</h3>
                </div>
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                            <h4 class="text-center text-xl text-primary bold">Accès en première année </h4>
                            <hr>
                            <p class="mb-0" >
                            <ul align="justify">
                            <li>Candidats ayant validé les deux années préparatoires au cycle ingénieur.</li>
                            <li>Candidats ayant réussi le concours national commun d’admission dans les établissements de formation d’ingénieurs et établissements assimilés.</li>
                            <li>Titulaires des diplômes suivants :</li>
                            <ul type="square">
                            <li>DEUG : SMI, SMA, SMP</li>
                            <li>DUT : G.info</li>
                            <li>DEUST : MIP, MIPC</li>
                            <li>DEUP</li>
                            <li>Licence : Licence Informatique</li>
                            <li>Autres diplômes reconnus équivalents (à préciser)</li>
                            </ul>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s" src="{{asset('images/condition_img.jpg')}}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.4s">
                        <h4 class="text-center text-xl text-primary bold">Accès en Deuxième année </h4><hr>
                            <p class="mb-0">
                            <ul>
                            <li>Titulaires des diplômes suivants :</li>
                            <ul type="square">
                            <li>Licence : Licence Informatique</li>
                            <li>Autres diplômes reconnus équivalents (à préciser):</li>
                            </ul>
                            <ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fin condition d'acces -->
    <!-- début des compétences -->
    <div id="Compétences" class="container-fluid py-1 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-3 mb-3">
            <div class="bg-white">
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h3 class="fw-bold text-secondary ">Competences a Acquerir</h3>
                </div>
                <div class="owl-carousel vendor-carousel">
                    <span class="bold text-primary ">Modélisation</span>
                    <span class="bold text-primary">Programmation</span>
                    <span class="bold text-primary">Conception et déploiement d’applications d’entreprise</span>
                    <span class="bold text-primary">Bases de données</span>
                    <span class="bold text-primary">Qualité logiciel</span>
                    <span class="bold text-primary">Sécurité des données</span>
                    <span class="bold text-primary">Statistique et intelligence artificielle</span>
                    <span class="bold text-primary">Informatique et statistique décisionnelle</span>
                    <span class="bold text-primary">Data mining et data Warehouse</span>
                    <span class="bold text-primary">Veille strategies</span>
                    <span class="bold text-primary">Big Data</span>
                </div>
            </div>
        </div>
    </div>
    <!-- fin des compétences -->
    <!-- début Contact -->
    <div id="Contact" class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h3 class="fw-bold text-secondary ">Contactez-Nous</h3>
                </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white "></i>
                        </div>
                        <div class="ps-4">
                            <h6 class="mb-2">Appelez pour poser des question</h6>
                            <h5 class="text-secondary mb-0">+212 611223344</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h6 class="mb-2">Notre email pour poser des question</h6>
                            <h5 class="text-secondary mb-0">gi.fste@gmail.com</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h6 class="mb-2">Adresse de l'établissement</h6>
                            <h5 class="text-secondary mb-0">BP 509 Boutalamine, Errachidia</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" placeholder="Votre Nom" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control border-0 bg-light px-4" placeholder="Votre Email" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control border-0 bg-light px-4" placeholder="Objet" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0 bg-light px-4 py-3" rows="4" placeholder="Message"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Envoyez</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- fin contact -->
    <!-- Footer Start -->
    @include('user.layouts.footer_page')
    <!-- Footer End -->
    <!-- retourner  vers le haut  -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>
    @include('user.layouts.footer_script')
</body>
</html>
