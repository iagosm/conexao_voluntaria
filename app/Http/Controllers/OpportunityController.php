<?php
namespace App\Http\Controllers;

use App\Models\Opportunity;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::all();
        return view('opportunities.index', compact('opportunities'));
    }

    public function create()
    {
        return view('opportunities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação da imagem
        ]);

        $opportunity = new Opportunity();
        $opportunity->title = $request->title;
        $opportunity->description = $request->description;

        // Armazenar o ID do usuário
        $opportunity->user_id = auth()->id();

        if ($request->hasFile('cover_image')) {
            $filename = time() . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('images'), $filename);
            $opportunity->cover_image = $filename;
        }

        $opportunity->save();

        return redirect()->route('opportunities.index')->with('success', 'Oportunidade criada com sucesso!');
    }


    


    public function show($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        return view('opportunities.show', compact('opportunity'));
    }

    public function edit($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        return view('opportunities.edit', compact('opportunity'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Permitir que o campo seja opcional
        ]);
    
        $opportunity = Opportunity::findOrFail($id);
        $opportunity->title = $request->title;
        $opportunity->description = $request->description;
    
        if ($request->hasFile('cover_image')) {
            // Deletar imagem antiga, se necessário
            if ($opportunity->cover_image) {
                \File::delete(public_path('images/' . $opportunity->cover_image));
            }
    
            $filename = time() . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('images'), $filename);
            $opportunity->cover_image = $filename;
        }
    
        $opportunity->save();
    
        return redirect()->route('opportunities.index')->with('success', 'Oportunidade atualizada com sucesso.');
    }
    

    public function destroy($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        $opportunity->delete();

        return redirect()->route('opportunities.index')->with('success', 'Oportunidade deletada com sucesso.');
    }
}
