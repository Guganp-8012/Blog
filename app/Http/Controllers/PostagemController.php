<?php

namespace App\Http\Controllers;

use App\Models\Postagem;
use App\Models\User;
use Illuminate\Http\Request;

class PostagemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postagens = Postagem::with('user')->get();

        return view('postagem.index', ['postagens' => $postagens]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'nome' => 'required|string|max:255',
            'conteudo' => 'required|string',
            'data_postagem' => 'required|date',
            'foto' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
        ]);

        $foto_camimho = $request->file('foto')->store('fotos', 'public');

        $postagem = Postagem::create([
            'user_id' => $request->user_id,
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
            'data_postagem' => $request->data_postagem,
            'foto' => $foto_camimho,
        ]);

        return redirect()->route('postagem.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Postagem $postagem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Postagem $postagem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Postagem $postagem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Postagem $postagem)
    {
        //
    }
}
