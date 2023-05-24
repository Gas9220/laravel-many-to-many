<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        if (Schema::hasTable('projects') && Schema::hasTable('types')) {
            $totalProjects = DB::table('projects')->count();
            $lastCreation = DB::table('projects')->latest()->first();
            $lastEdit = DB::table('projects')->where('updated_at', Project::max('updated_at'))->first();
            $totalRevenues = DB::table('projects')->sum('revenues');
            $types = Type::all();
            $technologies = Technology::all();

            return view('admin.dashboard', compact('totalProjects', 'lastCreation', 'lastEdit', 'totalRevenues', 'types', 'technologies'));
        } else {
        // Se faccio il login senza effettuare prima la migrazione non riceverò più l'errore causato della mancanza delle variabili che passo alla view
            return ('Non hai creato le tabelle projects e types. Esegui le migrazioni!');
        }
    }
}
