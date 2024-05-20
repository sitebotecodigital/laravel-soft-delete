@extends('layout')

@section('content')

    <h1 class="text-3xl font-bold mb-6">Adicionar de Projeto</h1>

    <form action="{{ route('projetos.store') }}" method="post">

        @csrf

        <div class="mb-4">
            <label for="titulo" class="label">Título</label>
            <input type="text" class="input" name="titulo" id="titulo" required>
        </div>

        <div class="mb-4">
            <label for="descricao" class="label">Descrição</label>
            <textarea name="descricao" id="descricao" cols="30" rows="10" class="input"></textarea>
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600">Adicionar Projeto</button>
        </div>  

    </form>

@endSection