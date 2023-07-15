@extends('admin.layouts.master')

@section('title','PFA')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                  <div class="card">
                    <form action="{{url('admin/Utilisateur', $admin->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="rounded-top  d-flex flex-row" style="background-color: #efefef; height:200px">
                      <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                        <img src="{{asset($admin->image)}}"
                          alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                          style="width: 150px; z-index: 1">
                          <label for="upload" class=" me-2 mb-2" tabindex="0">

                            <span class="d-none d-sm-block"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-fill text-black mx-5" viewBox="0 0 16 16">
                                <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                              </svg></span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"

                              name="image"

                            />
                          </label>



                      </div>
                      <div class="ms-3 " style="margin-top: 130px;">
                        <h5 class="" >{{$admin->prenom}} {{$admin->nom}}</h5>
                        <p class="text-black bold">{{$admin->email}}</p>
                      </div>
                    </div>
                    <div class="card-body p-4 text-black my-5">
                      <div class="mb-5">
                        <p class="lead fw-normal mb-1 text-center" style="color: #ff6900">Les informations personnel</p>
                        <div class="p-4" style="background-color: #efefef;">
                                <div class="col mb-3">
                                  <label for="nameExLarge" class="form-label">Nom</label>
                                  <input type="text" id="nameExLarge" class="form-control" name="nom" value="{{$admin->nom}}"  />
                                </div>
                                <div class="col mb-3">
                                    <label for="nameExLarge" class="form-label">Prénom</label>
                                    <input type="text" id="nameExLarge" class="form-control" name="prenom" value="{{$admin->prenom}}"/>
                                  </div>


                                <div class="col mb-0">
                                    <label for="emailExLarge" class="form-label">CIN</label>
                                    <input type="text" id="emailExLarge" class="form-control" name="cin" value="{{$admin->cin}}" />
                                  </div>
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Email</label>
                                  <input type="email" id="emailExLarge" class="form-control" name="email" value="{{$admin->email}}" />
                                </div>
                                <div class="col mb-0">
                                    <label for="emailExLarge" class="form-label">Adresse</label>
                                    <input type="text" id="emailExLarge" class="form-control" name="adresse" value="{{$admin->adresse}}"/>
                                  </div>



                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">N° Tell</label>
                                  <input type="text" id="emailExLarge" class="form-control" name="telephone" value="{{$admin->telephone}}" />
                                </div>


                            </div>
                        </div>
                        <div class="cord-footer">
                            <div class="mt-2  text-center">
                                <button type="submit" class="btn btn-primary me-2">Modifier</button>
                                <a href="{{url('admin/Utilisateur')}}" class="btn btn-warning">Annuler</a>
                              </div>
                          </div>
                      </div>
                    </form>
                    </div>

                  </div>

                </div>
              </div>

    </div>
  </div>
@endsection



