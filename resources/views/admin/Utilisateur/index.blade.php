@extends('admin.layouts.master')

@section('title','PFA')

@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">

          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel4">Ajouter un utilisateur</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>

            <div class="modal-body">
            <form action="{{url('admin/Utilisateur')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col mb-3">
                  <label for="nameExLarge" class="form-label">Nom</label>
                  <input type="text" id="nameExLarge" class="form-control" name="nom" placeholder="Enter Votre nom" />
                </div>
                <div class="col mb-3">
                    <label for="nameExLarge" class="form-label">Prénom</label>
                    <input type="text" id="nameExLarge" class="form-control" name="prenom" placeholder="Enter Votre prénome" />
                  </div>
                  <div class="col mb-0">
                    <label for="emailExLarge" class="form-label">CIN</label>
                    <input type="text" id="emailExLarge" class="form-control" name="cin" placeholder="Entrer votre CIN" />
                  </div>
              </div>

              <div class="row g-2">
              <div class="col mb-0">
                  <label for="emailExLarge" class="form-label">N° Tel</label>
                  <input type="text" id="emailExLarge" class="form-control" name="telephone" placeholder="+11267867456789" />
                </div>
                <div class="col mb-0">
                    <label for="emailExLarge" class="form-label">Adresse</label>
                    <input type="text" id="emailExLarge" class="form-control" name="adresse" placeholder="adresse" />
                  </div>
                <div class="col mb-0">
                  <label for="emailExLarge" class="form-label">Email</label>
                  <input type="email" id="emailExLarge" class="form-control" name="email" placeholder="xxxx@xxx.xx" />
                </div>
              </div>
              <div class="row g-2">

              <div class="col mb-0">
                  <label for="pwdExLarge" class="form-label">Mot de passe</label>
                  <input type="password" id="pwdExLarge" class="form-control" name="password" placeholder="saisir le mot de passe " />
              </div>
                <div class="col mb-0">
                  <label for="image" class="form-label">Image</label>
                  <input type="file" id="image" class="form-control" name="image"  />
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <input type="submit" class="btn btn-primary" value="Enregestrer"/>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                      </svg>
                     
                    Liste des Utilisateur <span class="text-warning">({{$nbradmins->count()}})</span></h4></div>
               <div class="">
                 <button
                type="button" class="btn btn-primary " data-bs-toggle="modal"data-bs-target="#exLargeModal">
                <i class=" bx bx-plus"></i>
                Ajouter
              </button>
               </div>
            </div>
            </div>
        </div>
        <div class="card my-3">
        @foreach($admins as $item)
        @if($item->role=="admin")
            <div class="row">
                <div class="col-md mb-3">
                    <div class="card" >
                      <div class="card-body ">
                        <div class="d-flex text-black">
                          <div class="row">
                            <div class="col">
                                <div class="flex-shrink-0">
                                    <img src="{{asset($item->image)}}"
                                      alt="Generic placeholder image" class="img-fluid "
                                      style="width: 180px; border-radius: 10px;">
                                  </div>
                            </div>
                            <div class="col">
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="">{{$item->prenom}} {{$item->nom}}</h5>
                                    <p class=" text-muted" >{{$item->email}}</p>
                                    <div class="d-flex justify-content-start rounded-3 p-2 "
                                      style="background-color: #efefef;">
                                      <div>
                                        <p class="small text-muted ">CIN</p>
                                        <p class="mb-0">{{$item->cin}}</p>
                                      </div>
                                      <div class="px-1">
                                        <p class="small text-muted ">N° téléphone</p>
                                        <p class="mb-0">{{$item->telephone}}</p>
                                      </div>
                                      <div>
                                        <p class="small text-muted ">Adresse</p>
                                        <p class="mb-0">{{$item->adresse}}</p>
                                      </div>
                                    </div>
                                    <div class="d-flex  pt-1">
                                      <a class="btn btn-primary " href="{{url('admin/Utilisateur/'. $item->id)}}"
                                      ><i class='bx bxs-low-vision '></i></a >
                                      <a class="btn btn-warning mx-1" href="{{url('admin/Utilisateur/'. $item->id .'/edit')}}"
                                        ><i class="bx bx-edit-alt "></i></a>
                                      <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
                                          <i class="bx bx-trash "></i> </a >
                                    </div>
                                    <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ url('admin/Utilisateur' . '/' . $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <div class="modal-body">
                                                Vous voulez vraiment de supprimer cette utilisateur ?
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
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            @endif
            @endforeach
         </div>
    </div>
</div>

@endsection



