<?php

namespace App\Http\Controllers\Enseignant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use DB;
use Illuminate\Support\Facades\Auth;
class ModuldEnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Module=DB::table('modules')->where('id_enseignant',Auth::guard('admin')->user()->id)->get();
        return view('enseignant.Module.index',compact('Module'));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
