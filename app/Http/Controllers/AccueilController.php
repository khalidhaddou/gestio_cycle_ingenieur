<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avis;
use App\Models\Admin;
class AccueilController extends Controller
{
    public function dashboard()
    {
        $avis_all=Avis::paginate(6);
        $nbrenseignant=Admin::where('role', 'enseignant')->get();
        return view('user.pages.dashboard',compact('avis_all','nbrenseignant'));
    }

}
