@extends('admin.layouts.master')

@section('title','PFA')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y" >
        <div class="card mb-4" >
            <form action="{{ url('admin/Etudiant' ,$etudiant->id) }}" method="post" enctype="multipart/form-data" >
                @method('PUT')
                @csrf
            <div class="card-body" >
              <div class="d-flex flex-column align-items-center text-center">
               
                <div class="button-wrapper ">
                  <label for="upload" class=" me-2 mb-2" tabindex="0">
                  <img src="{{asset($etudiant->image)}}"
                          alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                          style="width: 150px; z-index: 1">
                    <span class="d-none d-sm-block"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                        <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                      </svg></span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input
                      type="file"
                      id="upload"
                      class="account-file-input"
                      accept="image/png, image/jpeg"
                      name="image"
                      style="display: none;"
                      required 
                    />
                  </label>


                  <p class="text-muted mb-0">{{$etudiant->nom}} {{$etudiant->prenom}}  </p>
                </div>
              </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
              <form id="formAccountSettings" method="POST" onsubmit="return false">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Nom </label>
                    <input
                      class="form-control"
                      type="text"
                      id="firstName"
                      name="nom"
                      value="{{$etudiant->nom}} "
                      autofocus
                      required 
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Prenome</label>
                    <input class="form-control" type="text" name="prenom" id="lastName" value="{{$etudiant->prenom}} " />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input
                      class="form-control"
                      type="text"
                      id="email"
                      name="email"
                      value="{{$etudiant->email}} "
                      required 
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="organization" class="form-label">Sexe</label>
                    <input
                      type="text"
                      class="form-control"
                      id="organization"
                      name="sexe"
                      value="{{$etudiant->sexe}} "
                      required 
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">N° téléphone</label>
                    <div class="input-group input-group-merge">

                      <input
                        type="text"
                        id="phoneNumber"
                        name="N_tell"
                        class="form-control"
                       value="{{$etudiant->N_telephone}} "
                       required 
                      />
                    </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="adresse" value="{{$etudiant->adresse}}" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="state" class="form-label">Date Naissance</label>
                    <input class="form-control" type="date" id="state" name="date_Naissance" value="{{  \Carbon\Carbon::parse($etudiant->date_Naissance)->format('Y-m-d')}}"  required />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="zipCode" class="form-label">Semestre</label>
                    <input
                      type="text"
                      class="form-control"
                      id="zipCode"
                      name="semestre"
                    value="{{$etudiant->semestre}}"
                    required 
                    />
                  </div>
                <div class="mt-2  text-center">
                  <button type="submit" class="btn btn-primary me-2">Modifier</button>
                  <a href="{{ url('admin/Etudiant') }}"  class="btn btn-warning">Annuler</a>
                </div>
              </form>
            </div>
    </div>
</div>
@endsection



