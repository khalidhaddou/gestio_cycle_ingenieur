@extends('admin.layouts.master')

@section('title','PFA')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">Ajouter un module</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
            <form action="{{url('admin/Module')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col mb-3">
                  <label for="nameWithTitle" class="form-label">Nom</label>
                  <input
                    type="text"
                    id="nameWithTitle"
                    class="form-control"
                    placeholder="Enter le nom de module"
                    name="Nom"
                  />
                </div>
              </div>
              <div class="row">
                <div class="col mb-3">
                  <label for="nameWithTitle" class="form-label">Enseignant</label>
                  <select name="id_enseignant" id="" class="form-control">
                    @foreach ($enseignant as $item)
                    <option value="{{$item->id}}">{{$item->nom}}  {{$item->prenom}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
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
              <div class="row g-2">
                <div class="col mb-0">
                  <label for="emailWithTitle" class="form-label">Code</label>
                  <input
                    type="text"
                    id="emailWithTitle"
                    class="form-control"
                    placeholder="Entrer le code module"
                    name="Code"
                  />
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                      <label for="emailWithTitle" class="form-label">description</label>
                      <div class="input-group input-group-merge speech-to-text">
                        <textarea class="form-control" placeholder="Saisir votre description  ici" rows="2" name="Description"></textarea>
                        <span class="input-group-text">
                          <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
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
                        placeholder="Entrer le nombre des h'heure"
                        name="nbr_H"
                      />
                    </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <input type="submit" class="btn text-primary " style="background:rgb(255,105,0) ;" value="Enregistrer">
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
               <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
              <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
              </svg>
                    Liste des Module <span class="text-warning">(4)</span></h4></div>
               <div class="">
                 <button
                type="button" class="btn    text-white" data-bs-toggle="modal" data-bs-target="#modalCenter" style="background:rgb(255,105,0) ;">
                <i class=" bx bx-plus"></i>
                Ajouter
              </button>
               </div>
            </div>
            </div>
        </div>
        <hr class="my-3" />

        <!-- Bootstrap Table with Header - Dark -->
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table ">
              <thead class="table-dark">
                <tr>
                  <th class="text-center text-white">N°</th>
                  <th class="text-center text-white">Code</th>
                  <th class="text-center text-white">Nom</th>
                  <th class="text-center text-white">Nombre d'heurs</th>
                  <th class="text-center text-white">Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
              @foreach ($Module as $item )
                <tr>
                  <td class="text-center" > <strong>{{$loop->iteration}}</strong></td>
                  <td class="text-center">{{$item->Code}}</td>
                  <td class="text-center">{{$item->Nom}}</td>
                  <td class="text-center">{{$item->nbr_H}}</td>
                  <td class="text-center">
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('admin/Module/'. $item->id)}}"
                        ><i class='bx bxs-low-vision me-1'></i>Consulter</a
                      >
                        <a class="dropdown-item" href="{{url('admin/Module/'. $item->id .'/edit')}}"
                          ><i class="bx bx-edit-alt me-1"></i>Modifier</a
                        >
                        <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}"  href=""
                          ><i class="bx bx-trash me-1"></i>Supprimer</a
                        >
                      </div>
                    </div>
                  </td>
                </tr>
                <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="{{ url('admin/Module' . '/' . $item->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                      <div class="modal-body">
                          Vous voulez vraiment de supprimer ce Module ?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer </button>
                        <input type="submit" class="btn btn-primary" value="Confermer"/>
                      </div>
                      </form>
                    </div>
                </div>
                @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {!! $Module ->onEachSide(2)->links() !!}
               </div>
          </div>
        </div>
    </div>
</div>
@endsection



