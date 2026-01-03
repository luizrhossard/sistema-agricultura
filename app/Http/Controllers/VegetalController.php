<?php

namespace App\Http\Controllers;

use App\Models\Vegetal;
use Illuminate\Http\Request;

class VegetalController extends Controller
{
    // Listar todos os vegetais
    public function index()
    {
        $vegetais = Vegetal::all();
        return view('vegetais.index', compact('vegetais'));
    }

    // Formulário de criação
    public function create()
    {
        return view('vegetais.create');
    }

    // Salvar novo vegetal
    public function store(Request $request)
    {
        $data = $request->validate([
        'nome' => 'required|string|max:255',
        'categoria' => 'required|string',
        'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação da imagem
        'clima' => 'required|string',
        'tempo_plantio_dias' => 'required|integer',
        'profundidade_plantio_cm' => 'required|numeric',
        'distancia_entre_plantas_cm' => 'required|numeric',
        'umidade_solo_percentual' => 'required|integer',
        'descricao' => 'nullable|string',
        ]);

        // Lógica de Upload
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            // Salva na pasta 'public/vegetais' e retorna o caminho
            $imagePath = $request->imagem->store('vegetais', 'public');
            $data['imagem'] = $imagePath;
        }

        Vegetal::create($data);

        return redirect()->route('home')->with('success', 'Planta cadastrada com sucesso!');
    }


    // Exibir um vegetal específico
    public function show(Vegetal $vegetal)
    {
        return view('vegetais.show', compact('vegetal'));
    }

    // Formulário de edição
    public function edit(Vegetal $vegetal)
    {
        return view('vegetais.edit', compact('vegetal'));
    }

    // Atualizar vegetal
    public function update(Request $request, Vegetal $vegetal)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255|unique:vegetais,nome,' . $vegetal->id,
            'categoria' => 'required|string',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'clima' => 'required|string',
            'tempo_plantio_dias' => 'required|integer|min:1',
            'profundidade_plantio_cm' => 'required|numeric|min:0.1',
            'distancia_entre_plantas_cm' => 'required|numeric|min:0.1',
            'umidade_solo_percentual' => 'required|numeric|min:0|max:100',
            'descricao' => 'nullable|string',
        ]);

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->imagem->store('vegetais', 'public');
        } else {
            unset($data['imagem']);
        }

        $vegetal->update($data);

        return redirect()->route('vegetais.index')
                        ->with('success', 'Atualizado com sucesso!');
    }

    // Deletar vegetal
    public function destroy(Vegetal $vegetal)
    {
        $vegetal->delete();

        return redirect()->route('vegetais.index')
                        ->with('success', 'Vegetal deletado com sucesso!');
    }
    public function toggleFavorite(Vegetal $vegetal)
    {
        $user = auth()->user();

    // Se já favoritou, remove (toggle)
    // Se não, adiciona
        $user->favoritos()->toggle($vegetal->id);

        return back(); // Volta para a página anterior
    }
}
