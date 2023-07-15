<!-- resources/views/etudiants/releve.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Relevé de notes</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table .th_table,
        table .td_table {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    @foreach($note as $item)



  <div class="">
  <table style="width:100%;">
                <tr>
                    <th>
                    <img src="{{public_path('images/LOGO_FST.jpg')}}" alt="" class="img-fluid w-100">
                    </th>
                    <th class="text-end">
                    <img src="{{public_path('images/Logo_gi.png')}}" alt="" class="img-fluid w-50">
                    </th>
                </tr>
            </table>
  </div>

  <hr class="m-2">
    <h3 class=" text-center mt-4"><u>Relevé de notes</u></h3>

        <h6 class="mt-3">Nom et Prénom : {{ $item->first()->first()->nom}} {{ $item->first()->first()->prenom}} <span class="fw-bold float-end "> CNE: {{ $item->first()->first()->cne}}</span></h6>

    <h6>Filière : Cycle d'Ingénieurs "Génie Informatique" </h6>
    @foreach($item as $semestre => $item3)
    @php

    $moyenne=0;
    $i=0;
      @endphp


        <h4 class="mt-4">{{$semestre}}</h4>

            <table >
                <thead >
                  <tr>
                    <th class="th_table">Module</th>
                    <th class="th_table">Note</th>
                    <th class="th_table">Résultat</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach($item3 as $item2)
                  <tr>

                    {{$noteFiinal=$item2->note_final}}
                    {{$moyenne=$moyenne+$noteFiinal}}
                    {{$i++}}
                    <td class="td_table">{{$item2->Nom}}</td>
                    <td class="td_table">{{$noteFiinal}}</td>
                    <td class="td_table"> @if ($noteFiinal>=12 && $noteFiinal<14)
                     Assez Bien
                     @elseif ($noteFiinal>=14 && $noteFiinal<16)
                     Bien
                     @elseif ($noteFiinal>=16 && $noteFiinal<18)
                     Trés Bien
                     @elseif ($noteFiinal>=18 && $noteFiinal<20)
                     excellence
                    @else
                    non validé
                    @endif</td>
                  </tr>
                  @endforeach

                  <tr>

                    <td colspan="2" class=" text-end td_table" >Moyenne</td>
                    <td class="td_table">{{ sprintf("%.2f", $moyenne /$i)}}</td>
                  </tr>
                  <tr>

                    <td colspan="2" class=" text-end td_table ">Résultat</td>
                    <td class="td_table">@if (($moyenne /$i)>=12)
                     Validé
                    @else
                    non validé
                    @endif</td>
                  </tr>
                </tbody>
              </table>


       @endforeach
       <div style="page-break-after: always;" ></div>
       @endforeach
</body>
</html>
