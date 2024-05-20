<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Ramsey\Uuid\Exception\DateTimeException;

class TarefaController extends Controller
{
    public function index($projetoId)
    {
        $projeto = Projeto::find($projetoId);
        return view('tarefas.index', compact('projeto'));
    }

    public function create($projetoId)
    {
        $projeto = Projeto::find($projetoId);
        return view('tarefas.create', compact('projeto'));
    }

    public function store(Request $request, $projetoId)
    {
        $projeto = Projeto::find($projetoId);

        $data = $request->all();
        $data['slug'] = Str::slug($data['titulo']);
        $data['inicio_em'] = (new \DateTime('now'))->format('Y-m-d H:i:s');
        $projeto->tarefas()->create($data);
        return redirect()->route('tarefas.index', $projetoId);
    }

    public function finish($projetoId, $tarefaId)
    {
        $projeto = Projeto::find($projetoId);
        $tarefa = Tarefa::find($tarefaId);
        $tarefa->update([
            'fim_em' => (new \DateTime('now'))->format('Y-m-d H:i:s'),
        ]);
        return redirect()->route('tarefas.index', $projetoId);
    }

    public function destroy($projetoId, $tarefaId)
    {
        $projeto = Projeto::find($projetoId);
        $tarefa = Tarefa::find($tarefaId);
        $tarefa->delete();
        return redirect()->route('tarefas.index', $projetoId);
    }

    public function trash($projetoId)
    {
        $projeto = Projeto::find($projetoId);
        $tarefas = Tarefa::onlyTrashed()->get();
        return view('tarefas.trash', compact('tarefas','projeto'));
    }

    public function restore($projetoId, $tarefaId)
    {
        $tarefa = Tarefa::onlyTrashed()->find($tarefaId);
        $tarefa->restore();
        return redirect()->route('tarefas.index', $projetoId);
    }


    public function forceDelete($projetoId, $tarefaId)
    {
        $tarefa = Tarefa::onlyTrashed()->find($tarefaId);
        $tarefa->forceDelete();
        return redirect()->route('tarefas.index', $projetoId);
    }   

    public function edit($projetoId, $tarefaId)
    {
        $projeto = Projeto::find($projetoId);
        $tarefa = Tarefa::find($tarefaId);
        return view('tarefas.edit', compact('projeto', 'tarefa'));
    }

    public function update(Request $request, $projetoId, $tarefaId)
    {
        $projeto = Projeto::find($projetoId);
        $tarefa = Tarefa::find($tarefaId);
        $tarefa->update($request->all());
        return redirect()->route('tarefas.index', $projetoId);
    }
}
