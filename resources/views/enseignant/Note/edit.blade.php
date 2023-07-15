@extends('enseignant.layouts.master')

@section('title','PFA')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <form action="{{ url('/enseignant/Note' ,$note->id) }}" method="POST" enctype="multipart/form-data">

                @method('PUT')
                @csrf
            <div class="card-body">
                @if(Session::has('Modifier'))
                <div class="d-flex justify-content-end">
                <div class="alert   alert-success alert-dismissible w-50 " role="alert" >
                    {{Session::get('Modifier')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              </div>
                @endif
                   <div class="row">
                    <div class="col mb-3">
                        <label for="nameExLarge" class="form-label text-warning">CNE d'Etudiant</label>
                        <input type="text" id="emailExLarge" name="cne_etudiant" class="form-control" value="{{$note->cne_etudiant}}" />

                      </div>
                    </div>
                  <div class="row g-2">
                    <div class="col mb-0">
                      <label for="emailExLarge" class="form-label text-warning">Nom de module</label>

                      <select name="id_Module" id="" class="form-control">
                        <option selected value="{{$module->id}}">{{$module->Nom}}</option>
                        @foreach ($moduleAll as $item )
                        <option value="{{$item->id}}">{{$item->Nom}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col mb-0">
                      <label for="emailExLarge" class="form-label text-warning">Note Final</label>
                      <input type="number" step="any" id="emailExLarge" name="note_final" class="form-control" value="{{$note->note_final}}" />
                    </div>
                  </div>
            </div>
            <div class="card-footer">
                <div class="mt-2  text-center">
                    <button type="submit" class="btn btn-primary me-2">Modifier</button>
                    <a href="{{url('/enseignant/Note')}}"  class="btn btn-warning">Annuler</a>
                  </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
