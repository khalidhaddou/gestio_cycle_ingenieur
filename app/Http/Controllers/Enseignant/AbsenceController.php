<?php
namespace App\Http\Controllers\Enseignant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Module;
use App\Models\Absence;
use DB;
use Illuminate\Support\Facades\Auth;
class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $ModuleAll=DB::table('modules')->where('id_enseignant',Auth::guard('admin')->user()->id)->get();


        return view('enseignant.Absence.index',compact('ModuleAll'));
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
        $etudiantAll = $request->input('etudiantAll');
        //dd($etudiantAll);
    foreach ($etudiantAll as $index => $data) {

            $absence = new Absence();
            if(!empty($data['absence'])){
             $absence->absence = true;
             $absence->cne_etudiant = $data['cne_etudiant'];
             $absence->date_absence = $request->date_absence;
             $absence->id_Module = $request->id_Module;
             // Ajoutez d'autres colonnes de la table "absences" et assignez les valeurs correspondantes du tableau

             $absence->save();}
             else {
                $absence->cne_etudiant = $data['cne_etudiant'];
                $absence->date_absence =$request->date_absence;
                $absence->id_Module = $request->id_Module;
                $absence->save();
             }

    }

    return redirect()->back()->with('success', 'Données du tableau ajoutées à la base de données avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {    $etudiantAll=User::all();
        $absences=DB::table('absences')
        ->join('users', 'absences.cne_etudiant', '=', 'users.cne')
        ->select('absences.*', 'users.nom','users.prenom','users.image',DB::raw('COUNT(*) as total_absences'))
        ->where('absences.absence', '=', 1)
        ->where('absences.id_Module', '=', $id)
        ->groupBy('absences.cne_etudiant')
        ->paginate(3);
        return view('enseignant.Absence.show',compact('etudiantAll','id','absences'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $absences = Absence::find($id);
        $absence=DB::table('absences')
        ->join('users', 'absences.cne_etudiant', '=', 'users.cne')
        ->join('modules', 'absences.id_Module', '=', 'modules.id')
        ->select('absences.*', 'users.nom','users.prenom','users.image',DB::raw('COUNT(*) as total_absences'),'modules.Nom')
        ->where('absences.absence', '=', 1)
        ->where('absences.cne_etudiant', '=', $absences->cne_etudiant)
        ->where('modules.id', '=', $absences->id_Module)
        ->where('absences.id', '=', $id)
        ->get();
        //dd($absence);
        return view('enseignant.Absence.edit',compact('absence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $absence=Absence::find($id);
        $input=$request->all();
        $absence->update($input);
        if(!empty($input['absence'])){
            $absence->update($input);

            }
            else {
                $absence->update([
                  'absence'=>false,
                ]);
            }
            return redirect(url('/enseignant/Absence/'.$absence->id_Module))->with([
                "success" => "La absence  à éffectué  avec succès"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
