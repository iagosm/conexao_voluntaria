<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // Isso exige que o usuário esteja logado
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Busca todas as oportunidades
        $opportunities = Opportunity::all(); // Você pode usar outros métodos para filtrar ou limitar os resultados

        // Retorna a view com as oportunidades
        return view('home', compact('opportunities'));
    }
}
