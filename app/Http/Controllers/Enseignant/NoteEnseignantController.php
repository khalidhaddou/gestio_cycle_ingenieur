<?php

namespace App\Http\Controllers\Enseignant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Module;
use App\Models\Note;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
class NoteEnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $ModuleAll=DB::table('modules')->where('id_enseignant',Auth::guard('admin')->user()->id)->get();


        return view('enseignant.Note.index',compact('ModuleAll'));
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
        $input = $request->all();
        $input["ajouter_par"]=Auth::guard('admin')->user()->nom." ".Auth::guard('admin')->user()->prenom;
        Note::create($input);
        return redirect()->back()->with('success', 'Etudiants à ajouter  avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)

    {   $etudiantAll=User::all();
        $ModuleAll=DB::table('modules')->where('id_enseignant',Auth::guard('admin')->user()->id)->get();
        $ajouter_par=Auth::guard('admin')->user()->nom." ".Auth::guard('admin')->user()->prenom;
        $noteAll=DB::table('notes')
        ->join('modules', 'notes.id_Module', '=', 'modules.id')
        ->join('users', 'notes.cne_etudiant', '=', 'users.cne')
        ->where('notes.ajouter_par', '=', $ajouter_par)
        ->where('notes.id_Module', '=', $id)
        ->select('notes.*', 'modules.Nom', 'users.image','users.nom','users.prenom')
        ->orderBy('modules.Nom')
        ->paginate(7);
        
        return view('enseignant.Note.show',compact('etudiantAll','id','noteAll'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {     $note=Note::find($id);
        $module=Module::find($note->id_Module);
        $moduleAll=Module::all();
        return view('enseignant.Note.edit',compact('note','moduleAll','module'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $note=Note::find($id);
        $input=$request->all();
        $note->update($input);
        return redirect(url('/enseignant/Note/'.$id .'/edit'))->with([
            "Modifier" => "La note à Modifier avece succesées"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Note::destroy($id);
        return redirect()->back()->with('supprimer', 'Etudiant à supprimer avece succès.');

    }
    public function importNote(Request $request)
    {
        $file = $request->file('excel_file');
        $rows = Excel::toCollection([], $file)[0];
        $rows->shift();
        foreach ($rows as $row) {
            Note::create([
                'cne_etudiant' => $row[0],
                'id_Module' => $request->id_Module,
                'note_final' => $row[3],
                'ajouter_par' =>Auth::guard('admin')->user()->nom." ".Auth::guard('admin')->user()->prenom,

            ]);
        }

        return redirect()->back()->with('success', 'Les étudiants  importés avec succès.');
    }
}
