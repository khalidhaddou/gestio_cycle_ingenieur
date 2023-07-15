@extends('user.layouts.page_principale')
@section('title')
Cours
@endsection
@section('title_page')
Cours
@endsection
@section('css')
@endsection
@section('script')
@endsection
@section('content')
    <div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
   
    @foreach($cours as $key =>$items)
        <div class="container py-5">

            @if(!empty($items))
            <div class="section-title text-center position-relative pb-2 my-4 mx-auto" style="max-width: 600px;">
                <h4 class="fw-bold  text-uppercase " style="color: rgb(255,105,0);">les cours de Semestre {{$key}} </h4>
            </div>
            <div class="bg-image hover-overlay hover-zoom hover-shadow ripple">
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
            @foreach($items as $item)
            <a href="{{asset($item->pdf)}}" class="hover-zoom" target="_blank">
                <div class="testimonial-item bg-light my-4">
                
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="{{asset('images/cours_img.png')}}" style="width: 60px; height: 60px;" >
                        
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">{{$item->nom}}</h4>
                            <small class="">Pr : {{$item->prenom}} {{$item->nom_admin}}</small>
                           
                        </div>
                       
                    </div>
                    <div class="pt-4 pb-5 px-5">{{$item->description}}</div>
                    
                </div>
            </a>
            
            @endforeach
            </div>
            </div>
            @endif
        </div>
        @endforeach
    </div>
@endsection
