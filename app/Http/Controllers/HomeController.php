<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $games = Game::query()->where('is_active', true)->latest()->take(6)->get();
        return view('home', compact('games'));
    }

    public function games(): View
    {
        $games = Game::query()->where('is_active', true)->latest()->paginate(12);
        return view('games.index', compact('games'));
    }

    public function about(): View
    {
        return view('about');
    }
}
