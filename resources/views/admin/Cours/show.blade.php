@extends('admin.layouts.master')

@section('title','PFA')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <hr class="my-3" />
        <div class="card">
        <div class="row m-4">
            @foreach ($cours as $item )
            <div class="col-md-6 col-lg-4 mb-3 my-2">
                <div class="card ">
                    <h5 class="text-lg-end text-danger ">   <span class="badge badge-center rounded-pill bg-danger">1</span></h5>
                   <div class="card body">
                    <button class="btn-outline-warning p-5 border-white h-100 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                          </svg>
                     <br>
                     <span class="text-lg-center fs-large my-3">{{$item->nom}}</span>
                    </button>
                   </div>
                   <div class="card-footer text-white">
                    <a class="btn btn-primary " href="{{asset($item->pdf)}}" target="_blank">
                        <i class='bx bx-low-vision'></i>


                  </a>

                    <button class="btn btn-secondary editbtnCours "  id="ModifierCours" value="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#modalCours{{$item->id}}"  >
                        <i class='bx bxs-eyedropper'></i>

                        </button>
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}"  >
                            <i class='bx bx-trash'></i>

                            </a>

                   </div>
                   <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin/Cours' . '/' . $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        <div class="modal-body">
                            Vous voulez vraiment de supprimer ce cours ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                          <input type="submit" class="btn btn-primary" value="Oui"/>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>

                </div>
              </div>




    <div class="modal fade" id="modalCours{{$item->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">Modifier un cour</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <form action="{{ url('admin/Cours' ,$item->id) }}"  method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
            <div class="modal-body">
              <div class="row">
                <input class="form-control  w-100 ml-10" value="{{$item->id}}" id="id" hidden
                type="text" />
                <div class="col mb-3">
                  <label for="nameWithTitle" class="form-label">Nom</label>
                  <input
                    type="text"
                    id="nom"
                    name="nom"
                    class="form-control"
                    placeholder="Enter le nom de cours"
                  />
                </div>
              </div>
              <div class="row g-2">
                <div class="col mb-3">
                  <label for="semestre" class="form-label">Semester</label>
                  <input
                  type="text"
                  id="semestre"
                  name="semestre"
                  class="form-control S"
                  placeholder="Enter le nom de cours"
                />

                </div>
              </div>
              <div class="row g-2">
                <div class="col mb-3">
                  <input type="hidden" name="id_enseignant" value="{{Auth::guard('admin')->user()->id}}" class="form-control" />
                </div>
              </div>
              <div class="row g-2">
                <div class="col mb-3">
                  <label for="nameWithTitle" class="form-label">PDF</label>
                  <input
                    type="file"
                    id="pdf"
                    name="pdf"
                    class="form-control"
                    placeholder="Enter le semestre "
                  />
                </div>
              </div>
                <div class="row g-2">
                    <div class="col mb-0">
                      <label for="emailWithTitle" class="form-label">Déscription</label>
                      <div class="input-group input-group-merge speech-to-text">
                        <textarea class="form-control" placeholder="Saisir votre déscription  ici" name="description" rows="2" id="description"></textarea>
                        <span class="input-group-text">
                          <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                        </span>
                      </div>
                    </div>


            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn text-light  " style="background:rgb(255,105,0) ;">Enregistrer</button>
            </div>
          </div>
        </div>
            </form>
      </div>
    </div>
  </div>
              @endforeach
            </div>



        </div>

        </div>

    </div>
</div>
@endsection



