<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $skills = Skill::active()
            ->ordered()
            ->get()
            ->groupBy('category');

        // Jika ingin mengambil skills tanpa grouping
        $allSkills = Skill::active()->ordered()->get();

        return view('portofolio.index', compact('projects', 'skills', 'allSkills'));
    }
}
