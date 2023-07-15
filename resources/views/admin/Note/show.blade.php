@extends('admin.layouts.master')

@section('title','PFA')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card" >
            <div class="card-body  ">
                <div class="d-flex  justify-content-between">
                    <div>

                <h4 class=" text-black-50 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                      </svg>
                    Affichage les notes étudiants  <span class="text-warning"></span></h4></div>
                    <a class="btn btn-primary " value=""  href="{{ route('etudiants.notes-modules-pdf',$id) }}" ><i class='bx bxs-down-arrow-alt'></i>Télécharger</a>
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
                <th class="text-center text-white">Nom & Prenom</th>
                <th class="text-center text-white">Nom de module</th>
                <th class="text-center text-white">Note final </th>
              </tr>
            </thead>
            @foreach ($note as $items)
            <tbody class="table-border-bottom-0">
               @foreach ($items as $item )
                <tr>
                    <td class="text-center"><img src="{{asset($item->image)}}" alt class="w-px-40 h-auto rounded-circle" />{{$item->cne_etudiant}}</td>
                    <td class="text-center" >{{$item->nom}} {{$item->prenom}}</td>
                    <td class="text-center" >{{$item->Nom}}</td>
                    <td class="text-center">{{$item->note_final}} </td>

                  </tr>


                  @endforeach
            </tbody>
            @endforeach
          </table>
          

         </div>
        </div>
    </div>
</div>
@endsection




