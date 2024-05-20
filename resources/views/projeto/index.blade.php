@extends('layout')

@section('content')

    <a href="{{ route('projetos.create') }}" class="btn">Adicionar Projeto</a>
    
    <a href="{{ route('projetos.trash') }}" class="btn">Lixeira de Projetos</a>

        @foreach ($projetos as $projeto)
            <div class="box">
                <h2 class="text-xl font-bold mb-4">{{ $projeto->titulo }}</h2>
                <div class="mb-2">Slug: {{ $projeto->slug }}</div>
                <div class="mb-2">
                    <div class="mb-2 border-b">Descrição: </div>
                    <div>{{ $projeto->descricao }}</div>
                </div>
                <div class="flex justify-end gap-2">
                    <a href="{{ route('tarefas.index', $projeto->id)}}" class="btn">Tarefas</a>
                    <a href="{{ route('projetos.edit', $projeto->id)}}" class="btn">Editar</a>
                    <a href="{{ route('projetos.destroy', $projeto->id)}}" class="btn bg-red-700 hover:bg-red-900">Excluir</a>
                </div>
            </div>

        @endforeach

@endsection