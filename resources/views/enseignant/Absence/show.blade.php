@extends('enseignant.layouts.master')

@section('title','PFA')
@section('css')
@endsection
@section('content')

<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Ajouter une absence</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <form action="{{url('/enseignant/Absence')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row m-4">
                <div class="col-md ">
                  <label for="nameWithTitle" class="form-label">Date d'absence</label>
                  <input
                    id="nameWithTitle"
                    class="form-control"
                    type="date" name="date_absence"
                    placeholder="Enter le nom de cours"
                  />
                </div>
              </div>

        <div class="modal-body">
            <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead class="table-dark">
                    <tr>
                      <th class="text-center text-white">CNE</th>
                      <th class="text-center text-white">Nom</th>
                      <th class="text-center text-white">Prénom</th>
                      <th class="text-center text-white">Absence</th>

                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    @foreach ($etudiantAll as $index => $etudiant)
                     <tr>
                        <td class="text-center"><img src="{{asset($etudiant->image)}}" alt class="w-px-40 h-auto rounded-circle" />{{$etudiant->cne}} <input type="text" name="etudiantAll[{{ $index }}][cne_etudiant]" value="{{$etudiant->cne}}" hidden></td>
                        <td class="text-center">{{$etudiant->nom}}</td>
                        <td class="text-center">{{$etudiant->prenom}}</td>
                        <td class="text-center"><input class=" form-checkbox" type="checkbox" name="etudiantAll[{{ $index }}][absence]" id="" value="true"></td>

                     </tr>
                    @endforeach
                  </tbody>
                </table>
                <input type="text" name="id_Module" value="{{$id}}" hidden>
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn  btn-warning " >Valider</button>
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
                    Liste d'absences  </h4></div>
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
        <div class="card my-2">

            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-dark ">
                  <tr>
                    <th class="text-center text-white">CNE</th>
                    <th class="text-center text-white">Nom</th>
                    <th class="text-center text-white">Prénom</th>
                    <th class="text-center text-white">Nombre d'absence</th>
                    <th class="text-center text-white">Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($absences as $item)
                    <tr>
                        <td class="text-center"><img src="{{asset($item->image)}}" alt class="w-px-40 h-auto rounded-circle" />{{$item->cne_etudiant}}</td>
                        <td class="text-center" >{{$item->nom}}</td>
                        <td class="text-center">{{$item->prenom}}</td>
                        <td class="text-center"><span class="badge bg-label-danger me-1">{{$item->total_absences}}</span></td>
                        <td class="text-center">
                            <a class="btn btn-warning " value=""  href="{{url('/enseignant/Absence/'.$item->id .'/edit')}}" >
                            <i class='bx bxs-eyedropper'></i></a>

                        </td>
                      </tr>
                      @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-end">
                {!! $absences ->onEachSide(2)->links() !!}
               </div>
              @if(Session::has('success'))
              <div class="d-flex justify-content-end">
              <div class="alert  alert-dismissible w-50  alert-primary text-white " role="alert" >
                  {{Session::get('success')}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
              @endif

             </div>
            </div>

</div>
@endsection




