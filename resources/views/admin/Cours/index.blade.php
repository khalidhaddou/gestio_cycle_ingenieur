@extends('admin.layouts.master')

@section('title','PFA')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">Ajouter un cour</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <form action="{{url('admin/Cours')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                  <label for="nameWithTitle" class="form-label">Nom</label>
                  <input
                    type="text"
                    id="nameWithTitle"
                    class="form-control"
                    name="nom"
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
                  <label for="nameWithTitle" class="form-label">Semester</label>
                  <select name="semestre" id="" class="form-control">
                    <option value="Semestre 1">Semestre 1</option>
                    <option value="Semestre 2">Semestre 2</option>
                    <option value="Semestre 3">Semestre 3</option>
                    <option value="Semestre 4">Semestre 4</option>
                    <option value="Semestre 5">Semestre 5</option>
                    <option value="Semestre 6">Semestre 6</option>
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
                    name="pdf"
                    placeholder="Enter le semestre "
                  />
                </div>
              </div>
                <div class="row g-2">
                    <div class="col mb-0">
                      <label for="emailWithTitle" class="form-label">Description</label>
                      <div class="input-group input-group-merge speech-to-text">
                        <textarea class="form-control" name="description" placeholder="Saisir votre déscription  ici" rows="2"></textarea>
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
          </div>
        </div>
            </form>
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
                    Liste des cours </h4></div>
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

        <hr class="my-3" />
        <div class="card">
        <div class="row m-4">
            @foreach ($cours as $item )
            <div class="col-md-6 col-lg-4 mb-3 my-2">
            <a href="{{url('admin/Cours/'. $item->semestre)}}">
                <div class="card ">
                    <h5 class="text-lg-end text-danger ">   <span class="badge badge-center rounded-pill bg-danger">{{ $loop->iteration }}</span></h5>
                    <button class="btn-outline-primary p-5 border-white h-100 " >
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-house-door " viewBox="0 0 16 16">
                        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
                      </svg>
                     <br>
                     <span class="text-lg-center fs-large my-3">  {{ $item->semestre }}</span>
                    </button>

                </div>
                </a>
              </div>
            @endforeach
        </div>

        </div>

    </div>
</div>
@endsection



