@extends('layout')

@section('content')

    <h1 class="text-3xl font-bold mb-6">Tarefas do projeto: {{$projeto->titulo}}</h1>
    <div>
        <a href="{{ route('projetos.index') }}" class="btn">Listagem de Projetos</a>
    </div>

    <div>
        <a href="{{ route('tarefas.create', $projeto->id) }}" class="btn">Adicionar Tarefa</a>
        <a href="{{ route('tarefas.trash', $projeto->id) }}" class="btn">Lixeira de Tarefas</a>
    </div>

    @foreach ($projeto->tarefas as $tarefa)
        <div class="box">
            <h3 class="text-xl font-bold mb-4">{{ $tarefa->titulo }}</h3>
            <div class="mb-2">Slug: {{ $tarefa->slug }}</div>
            <div class="mb-2">Iniciada em: {{ $tarefa->inicio_em->format('d/m/Y H:i') }}</div>
            <div class="mb-2">Finalizada em: {{ $tarefa->fim_em?->format('d/m/Y H:i') ?? '-' }}</div>
            <div class="mb-2">
                <div class="mb-2">Descrição: </div>
                <div>{{ $tarefa->descricao }}</div>
            </div>
            <div class="flex justify-end gap-2">
                @if($tarefa->fim_em == null)
                <a href="{{route('tarefas.finish', [$projeto->id , $tarefa->id])}}" class="btn">Finalizar</a>
                @endif
                <a href="{{route('tarefas.edit', [$projeto->id , $tarefa->id])}}" class="btn">Editar</a>
                <a href="{{route('tarefas.destroy',  [$projeto->id, $tarefa->id])}}" class="btn bg-red-700 hover:bg-red-900">Excluir</a>

            </div>
        </div>

    @endforeach

@endsection