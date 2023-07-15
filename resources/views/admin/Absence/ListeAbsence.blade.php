@extends('admin.layouts.master')

@section('title','PFA')
@section('css')
<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
@endsection
@section('content')
<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card" >
            <div class="card-body  ">
                <div class="d-flex  justify-content-between">
                    <div>

                <h4 class=" text-black-50 text-lg">
                    Liste des étudiants en situation d'absence </h4></div>

            </div>
            </div>
        </div>
        <hr class="my-3" />
        <div class="card my-2">

            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-dark">
                  <tr>
                    <th class="text-center text-white">CNE</th>
                    <th class="text-center text-white">Nom</th>
                    <th class="text-center text-white">Prénom</th>
                    <th class="text-center text-white">Nombre d'absence</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($absences as $item)
                    <tr>
                        <td class="text-center "><img src="{{asset($item->image)}}" alt class="w-px-40 h-auto rounded-circle" />{{$item->cne_etudiant}}</td>
                        <td class="text-center" >{{$item->nom}}</td>
                        <td class="text-center">{{$item->prenom}}</td>
                        <td class="text-center"><span class="badge bg-label-danger me-1">{{$item->total_absences}}</span></td>
                    </tr>
                      @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-end">
                {!! $absences ->onEachSide(2)->links() !!}
               </div>


             </div>
            </div>




    </div>
  </div>
@endsection



