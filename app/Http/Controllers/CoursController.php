<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
use DB;
use App\Models\Admin;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cours=DB::table('cours')
        ->select(DB::raw('count(*) as semestre, semestre'))
        ->groupBy('semestre')
        ->get();
        $enseignant=Admin::all();
        return view ('admin.Cours.index',compact('cours','enseignant'));
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
    {   $input = $request->all();
        $fileName = time().$request->file('pdf')->getClientOriginalName();
        $path = $request->file('pdf')->storeAs('Cours', $fileName,'public');
        $input["pdf"] = '/storage/'.$path;
        Cours::create($input);
        return redirect(url('admin/Cours'))->with([
            "success" => "Cour à bien enregestrer avece succesées"
        ]);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $cours=DB::select("SELECT * FROM cours WHERE semestre='$id' ");
        return view ('admin.Cours.show',compact('cours'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
         //trouver le module
         $cours = Cours::find($id);
         $admin=Admin::find($cours->id_enseignant);
         //si trouvé
         if($cours)
         {
              //reponse JSON
             return response()->json([
                 'status'=>200,
                 'cours'=> $cours,
                 'admin'=>$admin,
             ]);
         }
         //le cas échouant
         else
         {
             //reponse JSON
             return response()->json([
                 'status'=>404,
                 'message'=>'aucun cours trouvé.'
             ]);
         }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cours=Cours::find($id);
        $input=$request->all();
        if($request->file('pdf')!=null){
            $fileName = time().$request->file('pdf')->getClientOriginalName();
            $path = $request->file('pdf')->storeAs('images', $fileName,'public');
            $input["pdf"] = '/storage/'.$path;
            $input["id_enseignant"] =$cours->id_enseignant;
             $cours->update($input);
        }else{
            $input["pdf"] =$cours->pdf;
            $input["id_enseignant"] =$cours->id_enseignant;
             $cours->update($input);
        }

        return redirect(url('admin/Cours/'.$request->semestre))->with([
            "Modifier" => "Etudiant à Modifier avece succesées"]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cours::destroy($id);
        return redirect(url('admin/Cours'))->with([
            "supprimer" => "cour à supprimer avece succesées"]);
    }


    public function Affiche_cour()
    {
        $semester=['Semestre 1','Semestre 2','Semestre 3','Semestre 4','Semestre 5','Semestre 6'];
        $cours=[];
        $i=1;
        foreach($semester as $item){

        $cours_all=DB::table('cours')
        ->join('admins', 'cours.id_enseignant', '=', 'admins.id')
        ->select('cours.*','admins.prenom','admins.nom as nom_admin')
       ->where('cours.semestre', '=',$item)
       ->get();
        $cours[$i] = $cours_all;
        $i++;

        }

        $publier_par=DB::select("SELECT DISTINCT A.nom FROM admins A, cours C WHERE C.id_enseignant=A.id");
        return view ('user.pages.Cours',compact('cours','publier_par'));
    }

}

