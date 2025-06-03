<?php

namespace App\Http\Controllers;

use App\Models\Esmalte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EsmalteController extends Controller
{
    // Listar todos os esmaltes
    public function index()
    {
        $esmaltes = Esmalte::latest()->get();
        return view('esmaltes.index', compact('esmaltes'));
    }

    // Formulário de criação
    public function create()
    {
        return view('esmaltes.create');
    }

    // Salvar novo esmalte
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'cor' => 'required|string|max:100',
            'foto' => 'nullable|image|max:2048', // máx 2MB
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        Esmalte::create($data);

        return redirect()->route('esmaltes.index')->with('success', 'Esmalte cadastrado com sucesso!');
    }

    // Formulário de edição
    public function edit(Esmalte $esmalte)
    {
        return view('esmaltes.edit', compact('esmalte'));
    }

    // Atualizar esmalte
    public function update(Request $request, Esmalte $esmalte)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'cor' => 'required|string|max:100',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Remove imagem anterior se existir
            if ($esmalte->foto && Storage::disk('public')->exists($esmalte->foto)) {
                Storage::disk('public')->delete($esmalte->foto);
            }

            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        $esmalte->update($data);

        return redirect()->route('esmaltes.index')->with('success', 'Esmalte atualizado com sucesso!');
    }

    // Excluir esmalte
    public function destroy(Esmalte $esmalte)
    {
        // Remove imagem associada se existir
        if ($esmalte->foto && Storage::disk('public')->exists($esmalte->foto)) {
            Storage::disk('public')->delete($esmalte->foto);
        }

        $esmalte->delete();

        return redirect()->route('esmaltes.index')->with('success', 'Esmalte excluído com sucesso!');
    }
}
