@extends('layout')

@section('content')

    <h1 class="text-3xl font-bold mb-6">Lixeira de Tarefas</h1>


    @foreach ($tarefas as $tarefa)
        <div class="box">
            <h3 class="text-xl font-bold mb-4">{{ $tarefa->titulo }}</h3>
            <h4 class="text-lg font-bold mb-4">Projeto: {{ $tarefa->projeto->titulo }}</h4>
            <div class="mb-2">Slug: {{ $tarefa->slug }}</div>
            <div class="mb-2">Iniciada em: {{ $tarefa->inicio_em->format('d/m/Y H:i') }}</div>
            <div class="mb-2">Finalizada em: {{ $tarefa->fim_em?->format('d/m/Y H:i') ?? '-' }}</div>
            <div class="mb-2">
                <div class="mb-2">Descrição: </div>
                <div>{{ $tarefa->descricao }}</div>
            </div>
            <div class="flex justify-end gap-2">
                <a 
                    href="{{route('tarefas.restore',  [$projeto->id, $tarefa->id])}}" 
                    class="btn bg-blue-700 hover:bg-blue-900">
                    Restaurar
                </a>
                <a 
                    href="{{route('tarefas.forceDelete',  [$projeto->id, $tarefa->id])}}" 
                    class="btn bg-red-700 hover:bg-red-900">
                    Excluir Definitivamente
                </a>
            </div>
        </div>

    @endforeach

@endsection