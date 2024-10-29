<?php
namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Opportunity;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all(); // Recupera todas as inscrições
        return view('applications.index', compact('applications'));
    }

    public function create()
    {
        $opportunities = Opportunity::all();
        return view('applications.create', compact('opportunities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
            'cpf' => 'required|string|max:14', // Validação do CPF
        ]);

        Application::create($request->all());

        return redirect()->route('applications.index')->with('success', 'Inscrição criada com sucesso.');
    }



    public function show($id)
    {
        $application = Application::findOrFail($id);
        return view('applications.show', compact('application'));
    }

    public function edit($id)
    {
        $application = Application::findOrFail($id);
        $opportunities = Opportunity::all();
        return view('applications.edit', compact('application', 'opportunities'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
            'cpf' => 'required|string|max:14', // Verifique a validação do CPF conforme necessário
        ]);

        $application = Application::findOrFail($id);
        $application->update($request->all());

        return redirect()->route('applications.index')->with('success', 'Inscrição atualizada com sucesso.');
    }


    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return redirect()->route('applications.index')->with('success', 'Inscrição deletada com sucesso.');
    }
}
