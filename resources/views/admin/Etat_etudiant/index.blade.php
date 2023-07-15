@extends('admin.layouts.master')

@section('title','PFA')
@section('css')
<style>
.vertical-line {
      border-left: 1px solid black;
}
</style>
@endsection

@section('content')
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
        <div class="card" >
            <div class="card-body  ">
                <div class="d-flex  justify-content-between">
                    <div>

                <h4 class=" text-black-50 text-lg">
               <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
              <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
              </svg>
              Consultation de l'état des étudiants</h4></div>
            </div>
            </div>
        </div>
        <hr class="my-3" />

        <!-- Bootstrap Table with Header - Dark -->
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table p-2  ">
              <thead class="table-dark">
                <tr>
                  <th class="text-center text-white">Nom & prénom</th>
                  <th class="text-center text-white " colspan="6">Semestre 1</th>
                  <th class="text-center text-white " colspan="6">Semestre 2</th>
                  <th class="text-center text-white " colspan="6">Semestre 3</th>
                  <th class="text-center text-white " colspan="6">Semestre 4</th>
                  <th class="text-center text-white " colspan="6">Semestre 5</th>
                  <th class="text-center text-white " colspan="6">Semestre 6</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <tr>
                  <th></th>
                <th class="text-center  vertical-line " colspan="6">année universitaire 2021/2022</th>
                <th class="text-center  vertical-line " colspan="6">année universitaire 2021/2022</th>
                <th class="text-center  vertical-line" colspan="6">année universitaire 2022/2023</th>
                <th class="text-center  vertical-line" colspan="6">année universitaire 2022/2023</th>
                <th class="text-center  vertical-line" colspan="6">année universitaire 20223/2024</th>
                <th class="text-center  vertical-line" colspan="6">année universitaire 2023/2024</th>
                </tr>
                <tr>
                  <th></th>
                <th class="text-center vertical-line" >M1</th>
                <th class="text-center " >M2</th>
                <th class="text-center " >M3</th>
                <th class="text-center " >M4</th>
                <th class="text-center " >M5</th>
                <th class="text-center " >M6</th>

                <!--déuxieme champs-->
                <th class="text-center vertical-line" >M1</th>
                <th class="text-center" >M2</th>
                <th class="text-center" >M3</th>
                <th class="text-center" >M4</th>
                <th class="text-center" >M5</th>
                <th class="text-center" >M6</th>

                <!--troisème champ-->
                <th class="text-center vertical-line" >M1</th>
                <th class="text-center" >M2</th>
                <th class="text-center" >M3</th>
                <th class="text-center" >M4</th>
                <th class="text-center" >M5</th>
                <th class="text-center" >M6</th>

                <!-- quatreime champs-->
                <th class="text-center vertical-line" >M1</th>
                <th class="text-center" >M2</th>
                <th class="text-center" >M3</th>
                <th class="text-center" >M4</th>
                <th class="text-center" >M5</th>
                <th class="text-center" >M6</th>

                <!-- cinquème champ-->
                <th class="text-center vertical-line" >M1</th>
                <th class="text-center" >M2</th>
                <th class="text-center" >M3</th>
                <th class="text-center" >M4</th>
                <th class="text-center" >M5</th>
                <th class="text-center" >M6</th>

                <th class="text-center vertical-line"  >Projet fin d'études (Stage de 4 à 6 mois)</th>
                </tr>
                <tr>
                  <th class="text-center" rowspan="2"> <strong>OUKHOUYA Omar</strong></th>
                  <th class="vertical-line">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>

                  <th class="vertical-line">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>

                  <th class="vertical-line">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>

                  <th class="vertical-line">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>

                  <th class="vertical-line">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>
                  <th class="">Note :</th>

                  <th class="vertical-line">Note :</th>
                </tr>
                <tr>
                  <th class="vertical-line">Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>

                  <th class="vertical-line">Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>

                  <th class="vertical-line">Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>

                  <th class="vertical-line">Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>

                  <th class="vertical-line">Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>
                  <th>Résultat :</th>

                  <th class="vertical-line">Résultat :</th>
                </tr>
                
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    </div>
                </div>
               
              </tbody>
            </table>
          
          </div>
        </div>
    </div>
</div>
@endsection




