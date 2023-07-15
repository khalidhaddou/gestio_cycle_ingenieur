@extends('admin.layouts.master')

@section('title','PFA')

@section('content')
<div class="content-wrapper">

    <!-- Content -->
    <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel4">Ajouter un note</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <form action="{{url('admin/Note')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                    <label for="nameExLarge" class="form-label text-warning">CNE d'Etudiant</label>
                    <select name="cne_etudiant" id="" class="form-control">
                    @foreach ($etudiantAll as $item)
                     <option value="{{$item->cne}}">{{$item->cne}}</option>
                    @endforeach
                    </select>

                  </div>
                </div>
              <div class="row g-2">
                <div class="col mb-0">
                  <label for="emailExLarge" class="form-label text-warning">Nom de module</label>
                  <select name="id_Module" id="" class="form-control">
                    @foreach ($ModuleAll as $item)
                     <option value="{{$item->id}}">{{$item->Nom}}</option>
                    @endforeach
                    </select>
                </div>
              </div>
              <div class="row g-2">
                <div class="col mb-0">
                  <label for="emailExLarge" class="form-label text-warning">Note1</label>
                  <input type="number" id="emailExLarge" name="note_1" class="form-control" placeholder="entrer la note 1" />
                </div>
                <div class="col mb-0">
                    <label for="emailExLarge" class="form-label text-warning">coefficient</label>
                     <select name="coefficient1" id=""  class="form-control">
                        <option value="0.25">25%</option>
                        <option value="0.5">50%</option>
                        <option value="0.75">75%</option>
                        <option value="1">100%</option>
                     </select>
                  </div>
              </div>
              <div class="row g-2">
                <div class="col mb-0">
                  <label for="emailExLarge"  class="form-label text-warning">Note 2</label>
                  <input type="number" id="emailExLarge" name="note_2" class="form-control" placeholder="entrer la note 2" />
                </div>
                <div class="col mb-0">
                    <label for="emailExLarge" class="form-label text-warning">coefficient</label>
                     <select name="coefficient2" id=""  class="form-control">
                        <option value="0.25">25%</option>
                        <option value="0.5">50%</option>
                        <option value="0.75">75%</option>
                        <option value="1">100%</option>
                     </select>
                  </div>
              </div>
              <div class="row g-2">
                <div class="col mb-0">
                  <label for="emailExLarge" class="form-label text-warning">Note 3</label>
                  <input type="number" id="emailExLarge" name="note_3" class="form-control" placeholder="entrer la note 3" />
                </div>
                <div class="col mb-0">
                    <label for="emailExLarge" class="form-label text-warning">coefficient</label>
                     <select name="coefficient3" id=""  class="form-control">
                        <option value="0.25">25%</option>
                        <option value="0.5">50%</option>
                        <option value="0.75">75%</option>
                        <option value="1">100%</option>
                     </select>
                  </div>
              </div>

            <div class="modal-footer">
              <button type="button" class="btn  text-white" data-bs-dismiss="modal" style="background: rgb(255,105,0);">
                Close
              </button>
              <input type="submit" class="btn btn-primary" value="Enregister" />
            </div>
            </form>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                      </svg>
                    Liste des Etudiants <span class="text-warning"></span></h4></div>
               <div class="">
                 <button
                type="button" class="btn text-white" data-bs-toggle="modal"data-bs-target="#exLargeModal" style="background: rgb(255,105,0);">
                <i class=" bx bx-plus"></i>
                Ajouter
              </button>
               </div>
            </div>
            </div>
        </div>
        <hr class="my-3" />
        <a class="btn btn-primary " value=""  href="{{ route('etudiants.notes-modules-pdf') }}" >Telechrger</a>
        <div class="card my-2">

        <div class="table-responsive text-nowrap">

          <table class="table">
            <thead class="table-dark">
              <tr>
                <th class="text-center text-white">CNE</th>
                <th class="text-center text-white">Nom de module</th>
                <th class="text-center text-white">Note 1</th>
                <th class="text-center text-white">Note 2</th>
                <th class="text-center text-white">Note 3</th>
                <th class="text-center text-white">Note final </th>
                <th class="text-center text-white">Actions</th>
              </tr>
            </thead>
            @foreach ($note as $items)
            <tbody class="table-border-bottom-0">
               @foreach ($items as $item )
                <tr>
                    <td class="text-center"><img src="{{asset($item->image)}}" alt class="w-px-40 h-auto rounded-circle" />{{$item->cne_etudiant}}</td>
                    <td class="text-center" >{{$item->Nom}}</td>
                    <td class="text-center">{{$item->note_1}}</td>
                    <td class="text-center">{{$item->note_2}}</td>
                    <td class="text-center">{{$item->note_3}}</td>
                    <td class="text-center">{{$item->note_3*$item->coefficient3+$item->note_2*$item->coefficient2+$item->note_1*$item->coefficient1}} </td>
                    <td class="text-center">
                        <a class="btn btn-primary " value=""  href="{{ route('etudiants.releve', $item->cne_etudiant) }}" >
                        <i class='bx bxs-eyedropper'></i></a>
                        <a class="btn btn-warning text-white "data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}"   role="button"  > <i class='bx bx-trash'></i> </a>
                    </td>
                  </tr>

                  <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" style="text-size:15px;" id="exampleModalLabel">Suppression d'un élèment</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin/Note' . '/' . $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        <div class="modal-body">
                          <h6 class="fw-light text-center text-dark">Voulez vous vraiment supprimer cette note?</h6>
                          <input type="hidden" id="deleteing_id">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span class="fw-light"
                          style="text-size:15px;">Fermer</span></button>
                          <button type="submit" class="btn btn-danger"><span
                          class="fw-light" style="text-size:15px;">Confirmer</span>
                          </button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>
                  @endforeach
            </tbody>
            @endforeach
          </table>

          @if(Session::has('success'))
          <div class="d-flex justify-content-end">
          <div class="alert  alert-dismissible w-50  alert-primary text-white " role="alert" >
              {{Session::get('success')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
          @endif
          @if(Session::has('supprimer'))
          <div class="d-flex justify-content-end">
          <div class="alert  alert-danger alert-dismissible w-50  text-white " role="alert" >
              {{Session::get('supprimer')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
          @endif
         </div>
        </div>
    </div>
</div>
@endsection




