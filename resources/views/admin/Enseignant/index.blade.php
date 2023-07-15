@extends('admin.layouts.master')

@section('title','PFA')
@section('css')
<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
@endsection
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
            <form action="{{url('admin/Enseignant')}}" method="POST" enctype="multipart/form-data">
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
                    Liste des enseignants <span class="text-warning">({{$enseignant->count()}})</span></h4></div>
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

        <div class="row mb-5 my-3">
            @foreach($enseignant as $item)

            <div class="col-md-6 col-lg-4 mb-3">
              <div class="card h-100 d-flex align-items-center justify-content-center">
                <section class=" bg-[#ff6900] rounded-2xl px-8 py-6 mt-4 shadow-lg w-70 ">
                    <div class=" d-flex align-items-center justify-content-center">
                        <img src="{{asset($item->image)}}" class="rounded-full w-28 " alt="profile picture" srcset="">
                    </div>

                    <div class=" ">
                        <h2 class="text-white text-xl tracking-wide">{{$item->nom}} {{$item->prenom}}</h2>
                        <h5 class="text-white mt-2 ">{{$item->email}}</h5>
                    </div>

                    <div class="h-1 w-full bg-black mt-8 rounded-full">
                        <div class="h-1 rounded-full w-2/5 bg-yellow-500 "></div>
                    </div>
                    <div class="mt-3 text-white text-sm">

                    </div>

                </section>
                <div class="card-body">

                    <a class="btn btn-primary " href="{{url('admin/Enseignant/'. $item->id)}}" >
                        <i class='bx bx-low-vision'></i>

                  </a>

                    <a class="btn btn-warning " href="{{url('admin/Enseignant/'. $item->id .'/edit')}}" >
                        <i class='bx bxs-eyedropper'></i>

                        </a>
                        <a class="btn btn-danger text-white"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}" >
                            <i class='bx bx-trash'></i>

                            </a>
                            <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ url('admin/Enseignant' . '/' . $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <div class="modal-body">
                                        Vous voulez vraiment de supprimer cette utilisateur ?
                                        {{$item->id}}
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



            @endforeach



              </div>

    </div>
  </div>
@endsection



