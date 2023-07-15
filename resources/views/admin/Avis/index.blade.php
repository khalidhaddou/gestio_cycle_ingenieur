@extends('admin.layouts.master')

@section('title','PFA')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">Ajouter un avis</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
          <div class="modal-body">
            <form Action="{{url('admin/Avis')}}" Method="POST" enctype="multipart/form-data">
               @csrf
            <div class="row">
              <div class="col mb-3">
                <label for="Title" class="form-label">Titre</label>
                <input
                    type="text"
                    id="Title"
                    class="form-control"
                    name="titre"
                    placeholder="Enter le titre d'avis"
                />
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-3">
              <input type="text" name="id_publieur" value="{{Auth::guard('admin')->user()->id}}" hidden>
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-3">
                <label  class="form-label">type</label>
                <select name="type" class="form-control">
                  <option value="Avis Public">Avis Public</option>
                  <option value="Avis Privé">Avis Privé</option>
                </select>
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">PDF</label>
                <input
                    type="file"
                    id="nameWithTitle"
                    class="form-control"
                    name="fichier_pdf"
                    placeholder="Enter le semestre "
                />
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-3">
                  <label for="dobExLarge" class="form-label">Image</label>
                  <input type="file" name="image" id="dobExLarge" class="form-control"  />
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label  class="form-label">Déscription</label>
                  <div class="input-group input-group-merge speech-to-text">
                    <textarea class="form-control" placeholder="Saisir votre déscription  ici" rows="2" name="description"></textarea>
                    <span class="input-group-text">
                    <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                    </span>
                  </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <input type="submit" class="btn text-light " style="background:rgb(255,105,0) ;"value="Enregistrer">
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>


    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card" >
            <div class="card-body  ">
                <div class="d-flex  justify-content-between">
                    <div>
                <h4 class=" text-black-50 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                        <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                      </svg>
                    Liste des avis</h4></div>
               <div class="">
                 <button
                type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter"  >
                <i class=" bx bx-plus"></i>
                Ajouter
              </button>
               </div>
            </div>
            </div>
        </div>
        <div class="row mb-5 my-3">
          @foreach($AvisAll as $item)
            <div class="col-md-6 col-lg-4 mb-3">
              <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Titre : {{$item->titre}} </h5>
                    <h6 class="card-subtitle text-muted">Publier par : Pr {{$item->nom}}  {{$item->prenom}}</h6>
                  </div>
                <img class="card-img-top" src="../assets/img/elements/Avis_img.png" alt="Card image cap" />
                <div class="card-body">
                  <p class="card-text" align="justify">{{$item->description}}</p>
                  <div class="text-center">
                      <a class="btn btn-primary "  href="{{ asset('/storage/pdf_Avis/'.$item->fichier_pdf) }}" target="_blank">
                        <i class='bx bx-low-vision'></i>
                      </a>
                      <button class="btn btn-warning editbtnAvis" value="{{$item->id}}"  data-bs-toggle="modal" data-bs-target="#modalModifier{{$item->id}}" >
                        <i class='bx bxs-eyedropper'></i>
                      </button>
                      <a class="btn btn-danger text-white "  data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}"   role="button" >
                      <i class='bx bx-trash'></i>
                      </a>
                         <!--Model pour supprimer-->
                      <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" style="text-size:15px;" id="exampleModalLabel">Suppression d'un élèment</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ url('admin/Avis' . '/' . $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            <div class="modal-body">
                              <h6 class="fw-light text-center text-dark">Voulez vous vraiment supprimer ce module ?</h6>
                              <input type="hidden" id="deleteing_id">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span class="fw-light"
                              style="text-size:15px;">Fermer</span></button>
                              <button type="submit" class="btn btn-danger delete_module"><span
                              class="fw-light" style="text-size:15px;">Confirmer</span>
                              </button>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>
                         <!--fin pour modal supprimer-->
                       <!--Model pour modifier-->
  <div class="modal fade" id="modalModifier{{$item->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Modifier avis</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
      <div class="modal-body">
        <form action="{{ url('admin/Avis' ,$item->id) }}"  method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
           <div class="row">
          <div class="col mb-3">
            <input
                type="hidden"
                id="id_avis"
                class="form-control"
                name="id_avis"
                placeholder="Enter  id d'avis"
            />
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input
                type="text"
                id="titre"
                class="form-control"
                name="titre"
                placeholder="Enter le titre d'avis"
            />
          </div>
        </div>
        <div class="row g-2">
              <div class="col mb-3">
              <input type="text" name="id_publieur" value="{{Auth::guard('admin')->user()->id}}" hidden>
              </div>
        </div>
        <div class="row g-2">
              <div class="col mb-3">
                <label  class="form-label">type</label>
                <select name="type" id="type" class="form-control">
                  <option value="Avis Public">Avis Public</option>
                  <option value="Avis Privé">Avis Privé</option>
                </select>
              </div>
            </div>
        <div class="row g-2">
          <div class="col mb-3">
            <label for="fichier_pdf" class="form-label">PDF</label>
            <input
                type="file"
                class="form-control"
                name="fichier_pdf"
            />
          </div>
        </div>
        <div class="row g-2">
              <div class="col mb-3">
                  <label for="image" class="form-label">Image</label>
                  <input type="file" name="image" class="form-control"  />
              </div>
            </div>
        <div class="row g-2">
          <div class="col mb-0">
            <label for="description" class="form-label">Description</label>
              <div class="input-group input-group-merge speech-to-text">
                <textarea class="form-control" placeholder="Saisir votre description  ici" rows="2" name="description"id="description"></textarea>
                <span class="input-group-text">
                <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                </span>
              </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn text-light " style="background:rgb(255,105,0) ;">Enregistrer</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
</div>
<!--fin de cette model-->

                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-end">
                {!! $Avis_paginate ->onEachSide(2)->links() !!}
               </div>
          </div>
    </div>
</div>
@endsection



