@extends('admin.layouts.master')

@section('title','PFA')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y" >
        <div class="card mb-4" >
            <div class="card-body" >
              <div class="d-flex flex-column align-items-center text-center">
                <img
                  src="{{asset($etudiant->image)}}"
                  alt="user-avatar"
                  class="img-fluid rounded   justify-center"
                  height="100"
                  width="100"
                  id="uploadedAvatar"
                />
                <br>
                <div class="button-wrapper ">
                  <p class="text-muted mb-0">{{$etudiant->nom}} {{$etudiant->nom}}</p>
                </div>
              </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
              <form id="formAccountSettings" method="POST" onsubmit="return false">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Nom</label>
                    <input
                      class="form-control"
                      type="text"
                      id="firstName"
                      name="firstName"
                      value="{{$etudiant->nom}}"
                      autofocus
                      disabled
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Prenome</label>
                    <input class="form-control" type="text"  disabled name="lastName" id="lastName" value="{{$etudiant->prenom}}" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input
                      class="form-control"
                      type="text"
                      id="email"
                      name="email"
                      disabled
                      value="{{$etudiant->email}}"
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="organization" class="form-label">Sexe</label>
                    <input
                      type="text"
                      class="form-control"
                      id="organization"
                      name="organization"
                      disabled
                      value="{{$etudiant->sexe}}"
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">N° téléphone</label>
                    <div class="input-group input-group-merge">
                      
                      <input
                        type="text"
                        id="phoneNumber"
                        name="phoneNumber"
                        disabled
                        class="form-control"
                       value="{{$etudiant->N_telephone}}"
                      />
                    </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input   disabled type="text" class="form-control" id="address" name="address" value="{{$etudiant->adresse}}" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="state" class="form-label">Date inscription</label>
                    <input   disabled class="form-control" type="datetime" id="state" name="state" value="{{$etudiant->created_at}}" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="zipCode" class="form-label">Semestre</label>
                    <input
                      type="text"
                      class="form-control"
                      id="zipCode"
                      name=""
                      value="{{$etudiant->semestre}}"
                      maxlength="6"
                      disabled
                    />
                  </div>

                <div class="mt-2  text-center">
                  <a  href="{{ route('etudiants.releve', $etudiant->cne) }}" class="btn btn-primary me-2"><i class='bx bxs-down-arrow-alt'></i> Relevé de notes</a>
                  <a href="{{ url('admin/Etudiant') }}"  class="btn btn-warning">Annuler</a>
                </div>
              </form>
            </div>
    </div>
</div>
@endsection



