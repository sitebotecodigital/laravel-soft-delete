@extends('layout')

@section('content')

    <h2 class="text-3xl font-bold mb-6">Lixeira de Projetos</h2>

    <a href="{{ route('projetos.index') }}" class="btn">Listagem de Projeto</a>


    @foreach ($projetos as $projeto)
        <div class="box">
            <h3 class="text-xl font-bold mb-4">{{ $projeto->titulo }}</h3>
            <div class="mb-2">Slug: {{ $projeto->slug }}</div>
            <div class="mb-2">
                <div class="mb-2">Descrição: </div>
                <div>{{ $projeto->descricao }}</div>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{route('projetos.restore', $projeto->id)}}" class="btn">Restaurar</a>
                <a href="{{route('projetos.forceDelete', $projeto->id)}}" class="btn bg-red-700 hover:bg-red-900">Editar Definitivamente</a>

            </div>
        </div>

    @endforeach

@endsection