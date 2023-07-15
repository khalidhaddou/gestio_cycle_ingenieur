@extends('admin.layouts.master')

@section('title','PFA')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                  <div class="card">
                    <div class="rounded-top  d-flex flex-row" style="background-color: #efefef; height:200px">
                      <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                        <img src="{{asset($admin->image)}}"
                          alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                          style="width: 150px; z-index: 1">
                      </div>
                      <div class="ms-3 " style="margin-top: 130px;">
                        <h5 class="" >{{$admin->prenom}} {{$admin->nom}}</h5>
                        <p >{{$admin->email}}</p>
                      </div>
                    </div>
                    <div class="card-body p-4 text-black my-5">
                      <div class="mb-5">
                        <p class="lead fw-normal mb-1 text-center" style="color: #ff6900">Les informations personnel</p>
                        <div class="p-4" style="background-color: #efefef;">

                                <div class="col mb-3">
                                  <label for="nameExLarge" class="form-label">Nom</label>
                                  <input type="text" id="nameExLarge" class="form-control" disabled value="{{$admin->nom}}"/>
                                </div>
                                <div class="col mb-3">
                                    <label for="nameExLarge" class="form-label">Prénom</label>
                                    <input type="text" id="nameExLarge" class="form-control" disabled value="{{$admin->prenom}}" />
                                  </div>


                                <div class="col mb-0">
                                    <label for="emailExLarge" class="form-label">CIN</label>
                                    <input type="text" id="emailExLarge" class="form-control" disabled value="{{$admin->cin}}" />
                                  </div>
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Email</label>
                                  <input type="email" id="emailExLarge" class="form-control" disabled value="{{$admin->email}}"/>
                                </div>
                                <div class="col mb-0">
                                    <label for="emailExLarge" class="form-label">Adresse</label>
                                    <input type="text" id="emailExLarge" class="form-control" disabled value="{{$admin->adresse}}"/>
                                  </div>
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">N° Téléphone</label>
                                  <input type="text" id="emailExLarge" class="form-control" disabled value="{{$admin->telephone}}"/>
                                </div>

                            </div>
                        </div>
                        <div class="cord-footer">
                            <div class="mt-2  text-center">
                                <button type="submit" class="btn btn-primary me-2">Modifier</button>
                              </div>
                          </div>
                      </div>

                    </div>

                  </div>

                </div>
              </div>

    </div>
  </div>
@endsection



