<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use DB;
class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $enseignant=Admin::where('role', 'enseignant')->get();
        return view ('admin.Enseignant.index',compact('enseignant'));
    }

    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $fileName =$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images_enseignant', $fileName,'public');
        $input["image"] = '/storage/'.$path;
        $input["password"] = Hash::make($request->password);
        $input["role"]="enseignant";
        Admin::create($input);
        return redirect(url('admin/Enseignant'))->with('flash_message', 'une nouvelle admin à été ajouté avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin=Admin::find($id);
        return view ('admin.Enseignant.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin=Admin::find($id);
        return view ('admin.Enseignant.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin=Admin::find($id);
        $input=$request->all();
        if($request->file('image')!=null){
            $fileName = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images_enseignant', $fileName,'public');
            $input["image"] = '/storage/'.$path;
             $admin->update($input);
        }else{
            $input["image"] =$admin->image;
             $admin->update($input);
        }

        return redirect(url('admin/Enseignant/'.$id .'/edit'))->with([
            "Modifier" => "Utilisateur à Modifier avece succesées"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Admin::destroy($id);
        return redirect(url('admin/Enseignant'))->with([
            "supprimer" => "admin à supprimer avece succesées"]);
    }
}
