@extends('admin.layouts.master')

@section('title','PFA')

@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y" >
    <div class="card">
    <form action="{{ url('admin/Module' ,$Module->id) }}" method="POST">
        @csrf
        @method('PUT')
      <div class="col-md mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">Nom : {{$Module->Nom}}</h5>
              <h6 class="card-subtitle text-muted">Code : {{$Module->Code}}</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md text-center">
                <img class="card-img-top w-75 " src="{{asset('/assets/img/slide.jpg')}}" alt="Card image cap" />
              </div>
              <div class="col-md">
                <div class="row">
                  <div class="col mb-3">
                    <label for="nameWithTitle" class="form-label">Nom</label>
                      <input
                        type="text"
                        id="nameWithTitle"
                        class="form-control"
                        placeholder="Enter le nom de module"
                        name="Nom"
                        value="{{$Module->Nom}}"
                      />
                  </div>
                </div>
                <div class="row g-2">
                  <div class="col mb-0">
                    <label for="emailWithTitle" class="form-label">Code</label>
                      <input
                        type="text"
                        id="emailWithTitle"
                        class="form-control"
                        placeholder="Entrer le code module"
                        name="Code"
                        value="{{$Module->Code}}"
                      />
                  </div>
                  <div class="row g-2">
                    <div class="col mb-0">
                      <label for="emailWithTitle" class="form-label">Ensiegnant</label>
                      <select name="id_enseignant" id="" class="form-control">
                        @foreach ($enseignant as $item)
                        <option value="{{$item->id}}">{{$item->nom}}  {{$item->prenom}}</option>
                        @endforeach
                      </select>
                    </div>
                  <div class="row g-2">
                    <div class="col mb-0">
                      <label for="emailWithTitle" class="form-label">Description</label>
                      <div class="input-group input-group-merge speech-to-text">
                        <textarea class="form-control" placeholder="Saisir votre déscription  ici" rows="2" name="Description" value="{{$Module->Description}}" >{{$Module->Description}}</textarea>
                        <span class="input-group-text"><i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                        </span>
                      </div>
                    </div>
                    <div class="row g-2">
                      <div class="col mb-0">
                        <label for="emailWithTitle" class="form-label">Nombre d'heure</label>
                        <input
                          type="number"
                          id="emailWithTitle"
                          class="form-control"
                          placeholder="Entrer le nombre des heurs"
                          name="nbr_H"
                          value="{{$Module->nbr_H}}"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="card-footer text-center">
        <button class="btn  text-white mx-2" style="background:#0693e3;"><i class='bx bxs-eyedropper' ></i> Modifier</button>
          <a class="btn  text-white mx-2"   href="{{url('admin/Module')}}"  role="button" style="background:rgb(255,105,0) ;" ><i class='bx bxs-log-out-circle'></i> Annuler</a>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection



