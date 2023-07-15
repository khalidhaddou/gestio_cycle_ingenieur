<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Admin;
use DB;
class ModuleController extends Controller
{

    public function index()
    {
        $Module=Module::paginate(5);
        $enseignant=DB::table('admins')->where('role', 'enseignant')->get();
        return view ('admin.Module.index',compact('Module','enseignant'));

    }

    public function store(Request $request)
    {
        $input= $request->all();
        Module::create($input);
        return redirect(url('admin/Module'))->with('flash_message', 'Le Module à été ajouté avec succes');
    }

    public function show(string $id)
    {
        $Module=Module::find($id);
        $enseignant=Admin::find($Module->id_enseignant);
        $ModuleAll=Module::paginate(3);
        return view ('admin.Module.show',compact('Module','ModuleAll','enseignant'));
    }

    public function edit(string $id)
    {
        $Module=Module::find($id);
        $enseignant=DB::table('admins')->where('role', 'enseignant')->get();
        return view ('admin.Module.edit',compact('Module','enseignant'));
    }

    public function update(Request $request, string $id)
    {
        $Module=Module::find($id);
        $input=$request->all();
        $Module->update($input);
        return redirect(url('admin/Module'))->with('flash_message', 'Le Module à été Modifier avec succes');
    }

    public function destroy(string $id)
    {
        Module::destroy($id);
        return redirect('admin/Module')->with('flash_message', 'Le Module à été supprimé avec succes');
    }
}
