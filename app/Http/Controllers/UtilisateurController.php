<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use DB;
class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins=Admin::all();
        $nbradmins=Admin::where('role', 'admin')->get();
        //$nbradmins=DB::select("SELECT count(*) FROM admins WHERE role = 'admin' ");
        return view ('admin.Utilisateur.index',compact('admins','nbradmins'));
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
        $fileName =$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images_admins', $fileName,'public');
        $input["image"] = '/storage/'.$path;
        $input["password"] = Hash::make($request->password);
        Admin::create($input);
        return redirect(url('admin/Utilisateur'))->with('flash_message', 'une nouvelle admin à été ajouté avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin=Admin::find($id);
        return view ('admin.Utilisateur.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin=Admin::find($id);
        return view ('admin.Utilisateur.edit',compact('admin'));
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
            $path = $request->file('image')->storeAs('images_admins', $fileName,'public');
            $input["image"] = '/storage/'.$path;
             $admin->update($input);
        }else{
            $input["image"] =$admin->image;
             $admin->update($input);
        }

        return redirect(url('admin/Utilisateur/'.$id .'/edit'))->with([
            "Modifier" => "Utilisateur à Modifier avece succesées"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Admin::destroy($id);
        return redirect(url('admin/Utilisateur'))->with([
            "supprimer" => "admin à supprimer avece succesées"]);
    }



}
