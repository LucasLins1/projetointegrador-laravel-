<?php

namespace App\Http\Controllers;

use App\Models\Postagem;
use Illuminate\Http\Request;

class PostagemController extends Controller
{
    public function create()
    {
        return view('postagem');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'tipo_cadastro' => 'required|string',
        'tipo_animal' => 'required|string',
        'outro_animal' => 'nullable|string',
        'tem_nome' => 'required|string',
        'nome_pet' => 'nullable|string',
        'raca' => 'nullable|string',
        'genero' => 'required|string',
        'idade' => 'nullable|string',
        'contato' => 'required|string',
        'ultima_localizacao' => 'nullable|string',
        'informacoes' => 'nullable|string',
        'foto' => 'nullable|image|max:2048'
    ]);

    // Upload da imagem
    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('pets', 'public');
    }

    Postagem::create($data);

    return redirect()->back()->with('success', 'Pet cadastrado com sucesso!');
}
}
