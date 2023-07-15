
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>affichage des notes</title>
    <style>
        table{
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 2px solid black;
            text-align: left;
        }
        th{
            text-align: center;
        }
        .page-break{
            page-break-after:always;
        }
    </style>

</head>
<body>
    <div class="">
        <div class="mx-1">
            <table style="width:100%;">
                <tr>
                    <th>
                    <img src="{{public_path('images/LOGO_FST.jpg')}}" alt="" class="img-fluid w-50">
                    </th>
                    <th class="float-end ">
                    Département d’Informatique<br>
                    A.U. : 2021-2022<br>
                    Semestre : S1
                    </th>
                </tr>
            </table>
        <hr>
        <h2 class="text-center mt-4">LISTE DES NOTES</h2>
        <h2 class="text-center mt-3">Cycle d'Ingénieurs « Génie Informatique »</h2>
        </div>
        <div class="">
        <span class="mt-4">Module : <span class="fw-bold">{{$Nom}}</span></span><br>
        <span class="mt-4">Session : <span class="fw-bold">Normale</span></span>
        </div>
        <div >
            <table class="mt-4" >
                <thead class="bg-light">
                    <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">CNE</th>
                    <th scope="col">Note</th>
                    <th scope="col">Résultat</th>
                    <th scope="col">Mention</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($note as $item)
                    @foreach($item as $item2)
                    <tr>
                    <td>{{$item2->nom}}</td>
                    <td>{{$item2->prenom}}</td>
                    <td>{{$item2->cne_etudiant}}</td>
                    <td>{{$item2->note_final}}</td>
                    <td>@if ($item2->note_final>=12 )
                           Validé
                            @elseif ($item2->note_final>=8 && $item2->note_final<12)
                            Rattrapage
                           @else
                           non validé
                           @endif</td>
                       <td>@if ($item2->note_final>=12 && $item2->note_final<14)
                            Assez Bien
                            @elseif ($item2->note_final>=14 && $item2->note_final<16)
                            Bien
                            @elseif ($item2->note_final>=16 && $item2->note_final<18)
                            Trés Bien
                            @elseif ($item2->note_final>=18 && $item2->note_final<20)
                            excellence
                           @else
                           non validé
                           @endif</td>
                    </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>