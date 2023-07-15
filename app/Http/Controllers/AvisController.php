<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avis;
use DB;
use Illuminate\Support\Facades\Storage;

class AvisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AvisAll=DB::table('avis')
        ->join('admins', 'avis.id_publieur', '=', 'admins.id')
        ->select('avis.*','admins.prenom','admins.nom')
       ->get();

        $Avis_paginate=Avis::paginate(3);
        
        return view ('admin.Avis.index',compact('AvisAll','Avis_paginate'));

    }

    public function create()
    {
        $avis_all=DB::select("SELECT * FROM avis AV ,admins A WHERE AV.id_publieur = A.id AND type = 'Avis Privé' ");
        $avis_paginate=Avis::paginate(6);
        return view('user.pages.Avis',compact('avis_all','avis_paginate'));
    }
    public function Avis_acc()
    {
        $avis_all=DB::select("SELECT * FROM avis WHERE type = 'Avis Privé' ");
        $avis_paginate=Avis::paginate(6);
        return view('user.pages.dashboard',compact('avis_all','avis_paginate'));
    }
    public function afficher_Avis_Public()
    {
        $Avis_Public=DB::select("SELECT * FROM avis WHERE type = 'Avis public' ");
        return view('welcome',compact('Avis_Public'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'titre' => 'required',
        //     'publier_par' => 'required',
        //     'fichier_pdf' => 'required|mimes:pdf|max:10000',
        //     'description' => 'required',
        // ]);

        $nom_fichier = $request->file('fichier_pdf')->store('public/pdf_Avis');
        $input = $request->all();
        $image_avis =$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images_Avis',$image_avis,'public');
        $input["image"] = '/storage/'.$path;

        $avis = Avis::create([
            'titre' => $request->input('titre'),
            'id_publieur' =>$request->input('id_publieur'),
            /*"Pr ".strtoupper(substr(Auth::guard('admin')->user()->prenom, 0, 1)).".".strtoupper(Auth::guard('admin')->user()->nom),*/
            'type' => $request->input('type'),
            'fichier_pdf' => basename($nom_fichier),
            'image'=>$input["image"],
            'description' => $request->input('description'),
        ]);
        return redirect()->back()->with('success', 'Votre avis a été enregistré avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        }else if ($request->file('image')!=null){
            $image_avis =$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images_Avis',$image_avis,'public');
            $input["image"] = '/storage/'.$path;
            $avis->update($input);
            

        }else{
            $input["fichier_pdf"] =$avis->fichier_pdf;
            $input["image"] =$avis->image;
            $avis->update($input);
        }

        return redirect(url('admin/Avis'))->with([
            "Modifier" => "avis à Modifier avece succesées"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Avis::destroy($id);
        return redirect(url('admin/Avis'))->with([
            "supprimer" => "Etudiant à supprimer avece succesées"]);
    }
}
