<?php

namespace App\Http\Controllers\Enseignant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cours;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
class CoursEnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_admin=Auth::guard('admin')->user()->id;
        $cours=DB::table('cours')
        ->join('admins', 'cours.id_enseignant', '=', 'admins.id')
        ->select(DB::raw('count(*) as semestre, semestre'))
        ->groupBy('semestre')
        ->where('cours.id_enseignant', '=',$id_admin)
        ->get();
        return view('enseignant.Cours.index',compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $fileName = time().$request->file('pdf')->getClientOriginalName();
        $path = $request->file('pdf')->storeAs('images', $fileName,'public');
        $input["pdf"] = '/storage/'.$path;
        $input["id_enseignant"]=Auth::guard('admin')->user()->id;
        Cours::create($input);
        return redirect(url('/enseignant/Cours'))->with([
            "success" => "Cour à bien enregestrer avece succesées"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $id_admin=Auth::guard('admin')->user()->id;
        $cours=DB::select("SELECT * FROM cours WHERE semestre='$id' AND id_enseignant=$id_admin");
        return view ('enseignant.Cours.show',compact('cours'));
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
            $input["id_enseignant"]=Auth::guard('admin')->user()->id;
             $cours->update($input);
        }else{
            $input["pdf"] =$cours->pdf;
            $input["id_enseignant"]=Auth::guard('admin')->user()->id;
             $cours->update($input);
        }

        return redirect(url('/enseignant/Cours/'.$request->semestre))->with([
            "Modifier" => "Etudiant à Modifier avece succesées"]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cours::destroy($id);
        return redirect(url('/enseignant/Cours'))->with([
            "supprimer" => "cour à supprimer avece succesées"]);
    }

}
