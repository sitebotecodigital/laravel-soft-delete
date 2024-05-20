@extends('layout')

@section('content')

    <h1 class="mb-6 text-3xl font-bold">Editar Tarefa</h1>

    <form action="{{ route('tarefas.update', [$projeto->id, $tarefa->id]) }}" method="post">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{ $tarefa->id }}">
        <input type="hidden" name="projeto_id" value="{{ $projeto->id }}">
        <div class="mb-4">
            <label for="titulo" class="label">Título</label>
            <input type="text" class="input" name="titulo" id="titulo" value="{{$tarefa->titulo}}" required>
        </div>

        <div class="mb-4">
            <label for="descricao" class="label">Descrição</label>
            <textarea name="descricao" id="descricao" cols="30" rows="10" class="input">{{$tarefa->titulo}}</textarea>
        </div>

        <div class="mb-4">
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Editar Tarefa</button>
        </div>

    </form>


@endSection