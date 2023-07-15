<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Module;
use App\Models\Note;
use DB;
use PDF;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
class NoteController extends Controller
{
    public function index()
    {     $etudiantAll=User::all();
          $ModuleAll=Module::all();
          $listeModule=DB::table('modules')
          ->select(DB::raw('count(*) as Nom, Nom'))->groupBy('modules.Nom')
          ->get();
          $note=[];
          $i=0;
          $list=DB::table('notes')
          ->groupBy('notes.id_Module')
          ->get();


          foreach( $list as $itme){
            $note[$i]=DB::table('notes')
            ->join('modules', 'notes.id_Module', '=', 'modules.id')
            ->join('users', 'notes.cne_etudiant', '=', 'users.cne')
            ->select('notes.*', 'modules.Nom', 'users.*')
            ->where('notes.id_Module', '=', $itme->id_Module)
            ->get();
            $i++;
          }

        return view('admin.Note.index',compact('etudiantAll','ModuleAll','note','listeModule'));
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
        return redirect(url('admin/Note'))->with([
            "success" => "La note  à bien enregestrer avece succesées"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $note=[];
        $i=0;
        $list=DB::table('notes')
        ->groupBy('notes.id_Module')
        ->get();


        foreach( $list as $itme){
          $note[$i]=DB::table('notes')
          ->join('modules', 'notes.id_Module', '=', 'modules.id')
          ->join('users', 'notes.cne_etudiant', '=', 'users.cne')
          ->select('notes.*', 'modules.Nom', 'users.*')
          ->where('notes.id_Module', '=', $itme->id_Module)
          ->where('modules.Nom', '=', $id)
          ->get();
          $i++;
        }

      return view('admin.Note.show',compact('note','id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   $note=Note::find($id);
        $module=Module::find($note->id_Module);
        $moduleAll=Module::all();
        return view('admin.Note.edit',compact('note','moduleAll','module'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $note=Note::find($id);
        $input=$request->all();
        $input['note_final']=$request->note_3*$request->coefficient3+$request->note_2*$request->coefficient2+$request->note_1*$request->coefficient1;
        $note->update($input);
        return redirect(url('admin/Note/'.$id .'/edit'))->with([
            "Modifier" => "La note à Modifier avece succesées"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Note::destroy($id);
        return redirect(url('admin/Note'))->with([
            "supprimer" => "Etudiant à supprimer avece succesées"]);
    }
    public function releve($cne)
{
    $etudiant=DB::table('users')
    ->where('cne', $cne)
    ->first();
    $note=DB::table('notes')
    ->join('modules', 'notes.id_Module', '=', 'modules.id')
    ->select('modules.semestre', 'notes.cne_etudiant', 'modules.Nom', 'notes.*')
    ->where('notes.cne_etudiant', '=', $cne)
    ->orderBy('modules.semestre')
    ->get()
    ->groupBy('semestre');

    $pdf = PDF::loadView('admin.Note.releve',['note'=>$note,'etudiant'=>$etudiant]);
    // download PDF file with download method
    return $pdf->download('relever_de_notes.pdf');
}
public function Allreleve()
{
    $note=[];
    $i=0;
    $list=User::all();


    foreach( $list as $itme){
     $notes=DB::table('notes')
      ->join('modules', 'notes.id_Module', '=', 'modules.id')
      ->join('users', 'notes.cne_etudiant', '=', 'users.cne')
      ->select('modules.semestre', 'notes.cne_etudiant','notes.*', 'modules.Nom', 'users.nom', 'users.prenom', 'users.cne')
      ->where('notes.cne_etudiant', '=', $itme->cne)
      ->orderBy('modules.semestre')
      ->get()
      ->groupBy('semestre');

      if($notes->count()>0){
        $note[$i]=$notes;
        $i++;
      }
    }

    $pdf = PDF::loadView('admin.Note.relelveToutEtu',['note'=>$note]);
    // download PDF file with download method
    return $pdf->download('relever_de_notes.pdf');
}
public function notesModulesPDF(string $Nom)
{

    $note=[];
    $i=0;
    $list=DB::table('notes')
    ->groupBy('notes.id_Module')
    ->get();


    foreach( $list as $itme){
      $note[$i]=DB::table('notes')
      ->join('modules', 'notes.id_Module', '=', 'modules.id')
      ->join('users', 'notes.cne_etudiant', '=', 'users.cne')
      ->select('notes.*', 'modules.Nom', 'users.*')
      ->where('notes.id_Module', '=', $itme->id_Module)
      ->where('modules.Nom', '=', $Nom)
      ->get();
      $i++;
    }
    $pdf = PDF::loadView('admin.Note.affichage_notes',['note'=>$note,'Nom'=>$Nom]);
    // download PDF file with download method
    return $pdf->download('Liste_notes.pdf');

    // $dompdf = new Dompdf();
    // $dompdf->loadHtml($content);
    // $dompdf->render();
    // $dompdf->stream('notes_modules.pdf');
}
public function Affiche_notes()
{
    $note=DB::table('notes')
    ->join('modules', 'notes.id_Module', '=', 'modules.id')
    ->select('modules.semestre', 'notes.cne_etudiant', 'modules.Nom', 'notes.*')
    ->where('notes.cne_etudiant', '=', Auth::user()->cne)
    ->where('modules.semestre', '=', Auth::user()->semestre)
    ->get();
    return view ('user.pages.Notes',compact('note'));
}

}
