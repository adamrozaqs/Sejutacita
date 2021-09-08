<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Persona;
use App\Models\Interest;
use App\Models\Article;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        $users = User::with(['persona'])->get();
        $personas = Persona::all();
        $interests = Interest::all();
        $articles = Article::all();

        return view('pages.dashboard')->with([
            'users' => $users,
            'personas' => $personas,
            'interests' => $interests,
            'articles' => $articles
        ]);
    }
}
