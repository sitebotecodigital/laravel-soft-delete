<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjetoController extends Controller
{
    
    public function index()
    {
        $projetos = Projeto::orderBy('titulo', 'ASC')->get();

        return view('projeto.index', compact('projetos'));
    }

    public function create()
    {
        return view('projeto.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['titulo']);
        $projeto = Projeto::create($data);
        $projeto->save();   

        return redirect()->route('projetos.index');
    }

    public function destroy($id)
    {
        $projeto = Projeto::find($id);
        $projeto->delete();
        return redirect()->route('projetos.index');
    }

    public function trash()
    {
        $projetos = Projeto::onlyTrashed()->get();
        return view('projeto.trash', compact('projetos'));
    }

    public function restore($id)
    {
        $projeto = Projeto::withTrashed()->find($id);
        $projeto->restore();
        return redirect()->route('projetos.index');
    }

    public function forceDelete($id)
    {
        $projeto = Projeto::withTrashed()->find($id);
        $projeto->forceDelete();
        return redirect()->route('projetos.trash');
    }

    public function edit($id)
    {
        $projeto = Projeto::find($id);
        return view('projeto.edit', compact('projeto'));
    }

    public function update(Request $request, $id)
    {
        $projeto = Projeto::find($id);
        $projeto->update($request->all());
        return redirect()->route('projetos.index');
    }
}
