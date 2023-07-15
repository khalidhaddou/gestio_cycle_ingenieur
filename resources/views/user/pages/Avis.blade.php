@extends('user.layouts.page_principale')
@section('title')
Avis
@endsection
@section('title_page')
Avis
@endsection
@section('css')
@endsection
@section('script')
@endsection
@section('content')
    <div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Les Avis</h5>
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
                                <small class="me-3 float-right"><i class="far fa-user text-primary me-2 "></i>Pr {{$item->nom}} {{$item->prenom}}</small>
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>{{$item->created_at}}</small>
                        </div>
                        <a class="btn btn-lg btn-primary rounded" href="{{ asset($item->fichier_pdf) }}" target="_blank" >
                            <i class="bi bi-eye"></i>
                        </a>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-center">
                {!! $avis_paginate ->onEachSide(2)->links() !!}
               </div>
            </div>
        </div>
    </div>
@endsection