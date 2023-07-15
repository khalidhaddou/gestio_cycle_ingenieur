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
                    Affichage des notes étudiants par module <span class="text-warning"></span></h4></div>
               <!--<div class="">
                 <button
                type="button" class="btn text-white" data-bs-toggle="modal"data-bs-target="#exLargeModal" style="background: rgb(255,105,0);">
                <i class=" bx bx-plus"></i>
                Ajouter
              </button>
               </div>-->
            </div>
            </div>
        </div>
        <hr class="my-3" />
        <div class="row mb-5 my-3">
            @foreach ($listeModule as $item )


            <div class="col-md-6 col-lg-4 mb-3">
              <div class="card h-100 align-items-center justify-content-center">
                <section class=" bg-[#0693e3] rounded-2xl px-8 py-6 shadow-lg w-64 mx-3  my-3">
                    <div class="flex items-center justify-between">
                    </div>
                    <div class="mt-6 w-fit mx-auto text-white">
                     Module: {{$item->Nom}}
                    </div>

                    <div class="h-1 w-full bg-black mt-8 rounded-full">
                        <div class="h-1 rounded-full w-2/5 bg-yellow-500 "></div>
                    </div>
                    <div class="mt-3 text-white text-sm">

                    </div>

                </section>
                <div class="card-body text-center ">

                    <a class="btn  btn-warning " href="{{url('admin/Note/'. $item->Nom)}}" >
                        <i class='bx bx-low-vision'></i>
                        Voir affichage

                  </a>
                  </div>

              </div>
            </div>

              @endforeach

    </div>
</div>
@endsection




