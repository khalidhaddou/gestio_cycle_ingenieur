@extends('admin.layouts.master')

@section('title','PFA')

@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y" >
    <div class="card">
      <div class="col-md  mb-3">
        <div class="card h-100">
          <div class="card-body ">
            <h5 class="card-title" style="color:rgb(255,105,0) ;">Nom de module : <span class="text-primary">{{$Module->Nom}}</span></h5>
            <h6 class="card-title text-muted my-1">Code : <span class="px-4">{{$Module->Code}}</span</h6>
            <h6 class="card-subtitle text-muted my-1">N° heure : <span class="px-4">{{$Module->nbr_H}}</span></h6>
            <h6 class="card-title text-muted my-1 ">Enseigné par  :<span class="px-4">{{ $enseignant->nom}} {{ $enseignant->prenom}}</span></h6>
          </div>
          <div class="card-body ">
            <div class="row">
              <div class="col-md text-center">
                <img class="card-img-top w-50 " src="{{asset('/assets/img/slide.jpg')}}" alt="Card image cap" />
              </div>
              <div class="col-md">
                <h5 class="card-title" style="color:rgb(255,105,0) ;">Description</h5>
                <p class="card-text text-justify">{{$Module->Description}}</p>
              </div>
            </div>
          </div>
          <div class="card-footer text-center">
            <button  class="btn btn-primary me-1" type="button"  data-bs-toggle="collapse" data-bs-target="#collapseExample"aria-expanded="false"aria-controls="collapseExample"><i class='bx bx-low-vision'></i> Voir tous</button>
            <a class="btn  text-white mx-2"   href="{{url('admin/Module')}}"  role="button" style="background:rgb(255,105,0) ;" ><i class='bx bxs-log-out-circle'></i>Annuler</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="collapse" id="collapseExample">
  <div class="row mb-5 mx-2" >
    @foreach($ModuleAll as $item)
    <div class="col-md-6 col-lg-4 mb-3">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">Nom :{{$item->Nom}}</h5>
            <h6 class="card-title text-muted">Code :{{$item->Code}}</h6>
            <h6 class="card-subtitle text-muted">Nombre d'heurs :{{$item->nbr_H}}</h6>
        </div>
        <img class="card-img-top w-75" src="{{asset('/assets/img/slide.jpg')}}" alt="Card image cap" />
        <div class="card-body">
          <p class="card-text">
          {{$item->Description}}
          </p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="d-flex justify-content-end">
    {!! $ModuleAll ->onEachSide(2)->links() !!}
   </div>
</div>

@endsection



