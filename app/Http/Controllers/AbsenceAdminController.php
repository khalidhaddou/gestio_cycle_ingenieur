<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Module;
use App\Models\Absence;
use DB;
use Illuminate\Support\Facades\Auth;
class AbsenceAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.Absence.index');
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

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)

    {  $module=DB::select("SELECT * FROM modules WHERE semestre='$id' ");
        return view('admin.Absence.show',compact('module'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $absences=DB::table('absences')
        ->join('users', 'absences.cne_etudiant', '=', 'users.cne')
        ->select('absences.*', 'users.nom','users.prenom','users.image',DB::raw('COUNT(*) as total_absences'))
        ->where('absences.absence', '=', 1)
        ->where('absences.id_Module', '=', $id)
        ->groupBy('absences.cne_etudiant')
        ->paginate(3);
        return view('admin.Absence.ListeAbsence',compact('absences'));
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
