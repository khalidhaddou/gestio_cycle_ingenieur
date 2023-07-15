@extends('admin.layouts.master')

@section('title','PFA')

@section('content')
<div class="content-wrapper">

    <!-- Content -->
    <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel4">Ajouter un Etudiant</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <form action="{{url('admin/Etudiant')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                    <label for="nameExLarge" class="form-label">CNE</label>
                    <input type="text" id="nameExLarge" name="cne" class="form-control" required placeholder="Enter Votre cne" />
                  </div>

                <div class="col mb-3">
                  <label for="nameExLarge" class="form-label">Nom</label>
                  <input type="text" id="nameExLarge" name="nom" class="form-control" required placeholder="Enter Votre nom" />
                </div>
                <div class="col mb-3">
                    <label for="nameExLarge"  class="form-label">Prénom</label>
                    <input type="text" id="nameExLarge" name="prenom" class="form-control" required placeholder="Enter Votre prénome" />
                  </div>
              </div>
              <div class="row g-2">
                <div class="col mb-0">
                  <label for="emailExLarge" class="form-label">CIN</label>
                  <input type="text" id="emailExLarge" name="cin"  class="form-control" required placeholder="Entrer votre CIN" />
                </div>
                <div class="col mb-0">
                    <label for="emailExLarge" class="form-label">Mot de passe</label>
                    <input type="password" id="emailExLarge" name="password"  class="form-control" required placeholder="Entrer votre Mot de passe" />
                  </div>

              </div>
              <div class="row g-2">
                <div class="col mb-0">
                  <label for="emailExLarge" class="form-label">Email</label>
                  <input type="email" id="emailExLarge" name="email" class="form-control" required placeholder="xxxx@xxx.xx" />
                </div>
                <div class="col mb-0">
                    <label for="emailExLarge" class="form-label">Adresse</label>
                    <input type="text" id="emailExLarge" name="adresse"  class="form-control" required placeholder="adresse" />
                  </div>
                <div class="col mb-0">
                  <label for="dobExLarge" class="form-label">Date de Naissance</label>
                  <input type="date" id="dobExLarge" name="date_Naissance" class="form-control" required placeholder="DD / MM / YY" />
                </div>
              </div>
              <div class="row g-2">
                <div class="col mb-0">
                  <label for="emailExLarge" class="form-label">N° Tell</label>
                  <input type="text" id="emailExLarge" name="N_tell"  class="form-control" required placeholder="+11267867456789" />
                </div>
                <div class="col mb-0">
                    <label for="emailExLarge" class="form-label">Sexe</label>
                    <select name="sexe" id="" class="form-control">
                        <option name="sexe" value="Homme">Homme</option>
                        <option  name="sexe"value="Femme">Femme</option>
                    </select>
                  </div>
                  <div class="col mb-0">
                    <label for="emailExLarge" class="form-label">SEMESTRE</label>
                    <select name="semestre" id="" class="form-control">
                        <option value="Semestre 1">Semestre 1</option>
                        <option value="Semestre 2">Semestre 2</option>
                        <option value="Semestre 3">Semestre 3</option>
                        <option value="Semestre 4">Semestre 4</option>
                        <option value="Semestre 5">Semestre 5</option>
                        <option value="Semestre 6">Semestre 6</option>
                    </select>
                  </div>
                <div class="col mb-0">
                  <label for="dobExLarge" class="form-label">Image</label>
                  <input type="file" name="image" id="dobExLarge" class="form-control"  />
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <input type="submit" class="btn btn-primary" value="Enregister" />
            </div>
            </form>
          </div>
        </div>
      </div>
 <!-- Modal Import etudiant -->
 <div class="modal" tabindex="-1" role="dialog" id="ImportETuModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Importation de fichier </h5>

        </div>
        <form action="{{ route('import.users') }}" method="POST" enctype="multipart/form-data">
        <div class="modal-body">

                @csrf
                <input type="file" class="form-control" name="excel_file">


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Importer</button>
          <button type="button" class="btn  btn-danger" data-bs-dismiss="modal">Fermer</button>
        </div>
    </form>
      </div>
    </div>
  </div>

 <!--  fin Modal Import etudiant -->



    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card" >
            <div class="card-body  ">
                <div class="d-flex  justify-content-between">
                    <div>

                <h4 class=" text-black-50 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                      </svg>
                    Liste des Etudiants <span class="text-warning">({{$liste->count()}})</span></h4></div>
               <div class="">

               

               <div class="modal fade" id="Modaldeleteall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('admin/Etudiant') }}" method="POST">
                        @csrf
                        @method('DELETE')
                    <div class="modal-body">
                        Vous voulez vraiment de supprimer tous les  etudiants ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                      <input type="submit" class="btn btn-primary" value="Oui"/>
                    </div>
                    </form>
                  </div>
                </div>
              </div>


              <a class="btn  btn-danger m-2" href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target="#Modaldeleteall"><i class="bx bx-trash me-1"></i> Supprimer tous</a>
                <a  href="{{ route('Alletudiants.releve') }}" class="btn  btn-secondary m-2"><i class='bx bxs-down-arrow-alt'></i> Les Relevés de notes</a>
                <button
                type="button" class="btn  btn-warning m-2 " data-bs-toggle="modal"data-bs-target="#ImportETuModal">
                <i class='bx bx-import'></i>
                Import
              </button>
                 <button
                type="button" class="btn btn-primary " data-bs-toggle="modal"data-bs-target="#exLargeModal">
                <i class=" bx bx-plus"></i>
                Ajouter
              </button>
              
               </div>
            </div>
            </div>
        </div>
        <div class="card my-2">

        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead class="table-light">
              <tr>
                <th>CNE</th>
                <th>Nom & Prénom</th>
                <th>Email</th>
                <th>Semestre</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($etudiant as $item )
              <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$item->cne}}</strong></td>
                <td>{{$item->nom}} {{$item->prenom}}</td>
                <td>

                        <img src="{{asset($item->image)}}" alt class="w-px-40 h-auto rounded-circle" />

                    {{$item->email}}
                </td>
                <td><span class="badge bg-label-primary me-1">{{$item->semestre}}</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('admin/Etudiant/'. $item->id)}}"
                        ><i class='bx bxs-low-vision me-1'></i>Consulter</a
                      >
                      <a class="dropdown-item" href="{{url('admin/Etudiant/'. $item->id .'/edit')}}">
                        <i class="bx bx-edit-alt me-1"></i>Modifier</a>
                      <a class="dropdown-item" href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
                        <i class="bx bx-trash me-1"></i>Supprimer</a>

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
                    <form action="{{ url('admin/Etudiant' . '/' . $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    <div class="modal-body">
                        Vous voulez vraiment de supprimer ce etudiant ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                      <input type="submit" class="btn btn-primary" value="Oui"/>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
           @endforeach

            </tbody>
          </table>
           <div class="d-flex justify-content-end">
            {!! $etudiant ->onEachSide(2)->links() !!}
           </div>
          @if(Session::has('success'))
          <div class="d-flex justify-content-end">
          <div class="alert  alert-dismissible w-50  text-white " role="alert" style="background:rgb(255,105,0) ;">
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



