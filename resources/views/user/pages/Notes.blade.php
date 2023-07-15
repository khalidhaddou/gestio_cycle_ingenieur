@extends('user.layouts.page_principale')
@section('title')
Note
@endsection
@section('title_page')
Mes Notes
@endsection
@section('css')
@endsection
@section('script')
@endsection
@section('content')
<div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-3">
            <div class="row g-5">

                <div class="card my-2">

                    <div class="table-responsive text-nowrap">

                      <table class="table">
                        <thead class="table-dark">
                          <tr>
                            <th class="text-center text-white">Nom de module</th>
                            <th class="text-center text-white">Note  </th>
                            <th class="text-center text-white">Résultat</th>
                            <th class="text-center text-white">Mention</th>
                            <th class="text-center text-white">Réclamation</th>
                          </tr>
                        </thead>

                        <tbody class="table-border-bottom-0">
                            @foreach ($note as $item)
                            <tr>

                                <td class="text-center" >{{$item->Nom}}</td>
                                <td class="text-center">{{$item->note_final}}</td>
                                <td class="text-center">@if ($item->note_final>=12 )
                                    Validé
                                     @elseif ($item->note_final>=8 && $item->note_final<12)
                                     Rattrapage
                                    @else
                                    non validé
                                    @endif</td>
                                <td class="text-center">@if ($item->note_final>=12 && $item->note_final<14)
                                     Assez Bien
                                     @elseif ($item->note_final>=14 && $item->note_final<16)
                                     Bien
                                     @elseif ($item->note_final>=16 && $item->note_final<18)
                                     Trés Bien
                                     @elseif ($item->note_final>=18 && $item->note_final<20)
                                     excellence
                                    @else
                                    non validé
                                    @endif</td>
                                    <td class="text-center" ><input type="checkbox" name="" id="" class="form-check-input"></td>
                              </tr>


                              @endforeach
                        </tbody>

                      </table>


                     </div>
                    </div>
            </div>
        </div>
    </div>

@endsection

