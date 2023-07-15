<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {     
        $etudiant=User::paginate(7);
        $liste=User::all();
        return view ('admin.Etudiant.index',compact('etudiant','liste'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      /*  $request->validate([
            'nom' => ['required', 'string', 'max:20'],
            'prenom' => ['required', 'string', 'max:15',],
            'cin' => ['required', 'string', ],
            'adresse' => ['required', 'string',],
            'N_tell' => ['required', 'string', ],
            'cne' => ['required', 'string', ],
            'image' => ['required', 'string', ],
            'email' => ['required', 'string', 'email', 'max:255', ],
            'sexe' => ['required', 'string', ],
            'date_Naissance' => ['required', 'string', ],
            'password' => ['required',]
        ] , [

            'nom.required'=>'Le champ du Nom  est obligatoire.',
            'prenom.required'=>'Le champ du Prénom  est obligatoire.',
            'cin.required'=>'Le champ du nom CIN est obligatoire.',
            'cne.required'=>'Le champ du CNE est obligatoire.',
            'email.required'=>'Le champ du nom Email est obligatoire.',
            'adresse.required'=>'Le champ d\'adresse est obligatoire.',
            'N_tele.required'=>'Le champ du Numéro de téléphone est obligatoire.',
            'sexe.required'=>'Le champ du Sexe est obligatoire.',
            'password.required'=>'Le champ du Mot de Passe est obligatoire.'
        ]);*/

        $input = $request->all();
        $fileName = time().$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images_etudaint', $fileName,'public');
        $input["image"] = '/storage/'.$path;
        $input["password"] = Hash::make($request->password);
         User::create($input);

        return redirect(url('admin/Etudiant'))->with([
        "success" => "Etudiant à bien enregestrer avece succesées"
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {       $etudiant = User::find($id);
        return view ('admin.Etudiant.show',compact('etudiant'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $etudiant = User::find($id);

        return view ('admin.Etudiant.edit',compact('etudiant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $etudiant=User::find($id);
        $input=$request->all();
        if($request->file('image')!=null){
            $fileName = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images_etudiant', $fileName,'public');
            $input["image"] = '/storage/'.$path;
            $input["password"] = Hash::make($request->password);
             $etudiant->update($input);
        }else{
            $input["image"] =$etudiant->image;
            $input["password"] = Hash::make($request->password);
             $etudiant->update($input);
        }

        return redirect(url('admin/Etudiant/'.$id .'/edit'))->with([
            "Modifier" => "Etudiant à Modifier avece succesées"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect(url('admin/Etudiant'))->with([
            "supprimer" => "Etudiant à supprimer avece succesées"]);
    }

    public function importUsers(Request $request)
    {
        $file = $request->file('excel_file');
        $rows = Excel::toCollection([], $file)[0];
        $rows->shift();
        foreach ($rows as $index => $row) {
            User::create([
                'cne' => $row[0],
                'cin' => $row[1],
                'nom' => $row[2],
                'prenom' => $row[3],
                'adresse' => $row[4],
                'sexe' => $row[5],
                'semestre' => $row[6],
                'date_Naissance' => Carbon::createFromFormat('d,m,Y', $row[7])->format('Y-m-d'),
                'N_telephone' => $row[8],
                'image' => '/storage/images_etudaint/profil_par_defaut.png',
                'email' => $row[9],
                'password' => Hash::make($row[10]),
            ]);
     
            
        }
    
        return redirect()->back()->with('success', 'Les étudiants  importés avec succès.');
    }

    public function deleteall()
    {
        $deleteall=DB::select("DELETE FROM users");
        return redirect(url('admin/Etudiant'))->with([
            "supprimer" => "tous Etudiants à supprimer avece succesées"]);
    }

}
