@extends('enseignant.layouts.master')

@section('title','PFA')
@section('css')
@endsection
@section('content')




    <div class="container-xxl flex-grow-1 container-p-y">
    @foreach ( $absence as $absence)
    <form action="{{ url('/enseignant/Absence' ,$absence->id) }}" method="POST" enctype="multipart/form-data">

        @method('PUT')
        @csrf

        <hr class="my-3" />
        <div class="card my-2">

            <div class="row m-4">
                <div class="col-md ">
                  <div class="card  mb-3" style="" >

                    <div class="card-body">
                        <div class="text-center" >
                        <strong class="text-warning">Nombree absence :{{$absence->total_absences}}</strong>
                        </div>


                    </div>
                  </div>
                </div>
                  <div class="col-md">
                    <div class="card  mb-3">
                      <div class="card-body">
                          <div class=" text-center" >
                             <strong class="text-warning">{{$absence->Nom}}</strong>
                          </div>


                      </div>
                    </div>
                  </div>
              </div>
              <div class="row m-4">
                <div class="col-md ">
                  <label for="nameWithTitle" class="form-label text-warning">CNE</label>
                  <input
                    id="nameWithTitle"
                    class="form-control"
                    type="text" name="cne_etudiant"
                    value="{{$absence->cne_etudiant}}"
                  />
                </div>
              </div>
              <div class="row m-4">
                <div class="col-md ">
                  <label for="nameWithTitle" class="form-label text-warning">Nom</label>
                  <input
                    id="nameWithTitle"
                    class="form-control"
                    type="text" name=""
                   value="{{$absence->nom}}"
                  />
                </div>
              </div>
              <div class="row m-4">
                <div class="col-md ">
                  <label for="nameWithTitle" class="form-label text-warning">Prenom</label>
                  <input
                    id="nameWithTitle"
                    class="form-control"
                    type="text" name=""
                    value="{{$absence->prenom}}"
                  />
                </div>
              </div>
              <div class="row m-4">
                <div class="col-md ">
                  <label for="nameWithTitle" class="form-label text-warning">Date d'absence</label>
                  <input
                    id="nameWithTitle"
                    class="form-control"
                    type="text" name="date_absence"
                    value="{{$absence->date_absence}}"
                  />
                </div>
              </div>
              <div class="row m-4">
                <div class="col-md ">
                  <label for="nameWithTitle" class="form-label  text-warning ">Absence</label>
                   @if ($absence->absence=1)
                   <input
                   id="nameWithTitle"

                   type="checkbox" name="absence"
                  checked
                 />
                   @else
                   <input
                    id="nameWithTitle"

                    type="checkbox" name="absence"

                  />
                   @endif
                </div>
              </div>

              <div class="card-footer">
                <div class="mt-2  text-center">
                    <button type="submit" class="btn btn-primary me-2">Modifier</button>
                    <a href="{{url('/enseignant/Absence/'. $absence->id_Module)}}"  class="btn btn-warning">Annuler</a>
                  </div>
              </div>
            </div>
    </form>
            @endforeach
            @if(Session::has('success'))
            <div class="d-flex justify-content-end">
            <div class="alert  alert-dismissible w-50  alert-primary text-white " role="alert" >
                {{Session::get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          </div>
            @endif

</div>
@endsection




