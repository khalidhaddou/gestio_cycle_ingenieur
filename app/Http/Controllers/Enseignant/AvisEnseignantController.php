<?php

namespace App\Http\Controllers\Enseignant;
use App\Http\Controllers\Controller;
use App\Models\Avis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class AvisEnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        //$AvisAll=Avis::paginate(3);
        $id_admin=Auth::guard('admin')->user()->id;
        $AvisEns=DB::select("SELECT A.nom,A.prenom,AV.description,AV.titre,Av.fichier_pdf,AV.id From admins A,avis AV WHERE  A.id = AV.id_publieur AND AV.id_publieur = $id_admin ");
        return view('enseignant.Avis.index',compact('AvisEns'));
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


        $nom_fichier = $request->file('fichier_pdf')->store('public/pdf_Avis');
        $input = $request->all();

        $avis = Avis::create([
            'titre' => $request->input('titre'),
            'id_publieur' =>$request->input('id_publieur'),
            /*"Pr ".strtoupper(substr(Auth::guard('admin')->user()->prenom, 0, 1)).".".strtoupper(Auth::guard('admin')->user()->nom),*/
            'type' => 'Avis Privé',
            'fichier_pdf' => basename($nom_fichier),
            'image'=>'../assets/img/elements/Avis_img.png',
            'description' => $request->input('description'),
        ]);

        return redirect()->back()->with('success', 'Votre avis a été enregistré avec succès.');
    }
 /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $publieur=DB::select("SELECT nom,prenom FROM admins A,avis AV WHERE A.id=AV.id_publieur   AND ");
        return view('enseignant.Avis.index',compact('publieur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Avis = Avis::find($id);
        //si trouvé
        if($Avis)
        {
             //reponse JSON
            return response()->json([
                'status'=>200,
                'Avis'=> $Avis,
            ]);
        }
        //le cas échouant
        else
        {
            //reponse JSON
            return response()->json([
                'status'=>404,
                'message'=>'aucun Avis trouvé.'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $avis=Avis::find($id);
        $input=$request->all();
        if($request->file('fichier_pdf')!=null){
            $nom_fichier = $request->file('fichier_pdf')->store('public/pdf_Avis');
            $input["fichier_pdf"] = basename($nom_fichier);
            $avis->update($input);
        }else{
            $input["fichier_pdf"] =$avis->fichier_pdf;
             $avis->update($input);
        }

        return redirect(url('/enseignant/Avis'))->with([
            "Modifier" => "avis à Modifier avece succesées"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Avis::destroy($id);
        return redirect(url('/enseignant/Avis'))->with([
            "supprimer" => "Etudiant à supprimer avece succesées"]);
    }
}
