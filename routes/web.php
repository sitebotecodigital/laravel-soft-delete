<?php

use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjetoController::class, 'index'])->name('projetos.index');
Route::get('/projetos', [ProjetoController::class, 'index'])->name('projetos.index');
Route::get('/projetos/create', [ProjetoController::class, 'create'])->name('projetos.create');
Route::post('/projetos/store', [ProjetoController::class, 'store'])->name('projetos.store');
Route::get('/projetos/{id}/destroy', [ProjetoController::class, 'destroy'])->name('projetos.destroy');
Route::get('/projetos/trash', [ProjetoController::class, 'trash'])->name('projetos.trash');
Route::get('/projetos/{id}/restore', [ProjetoController::class, 'restore'])->name('projetos.restore');
Route::get('/projetos/{id}/forceDelete', [ProjetoController::class, 'forceDelete'])->name('projetos.forceDelete');
Route::get('/projetos/{id}/edit', [ProjetoController::class, 'edit'])->name('projetos.edit');
Route::put('/projetos/{id}/update', [ProjetoController::class, 'update'])->name('projetos.update');

Route::get('/projetos/{id}/tarefas', [TarefaController::class, 'index'])->name('tarefas.index');
Route::get('/projetos/{id}/tarefas/create', [TarefaController::class, 'create'])->name('tarefas.create');
Route::post('/projetos/{id}/tarefas/store', [TarefaController::class, 'store'])->name('tarefas.store');

Route::get('/projetos/{id}/tarefas/store', [TarefaController::class, 'store'])->name('tarefas.store');

Route::get('/projetos/{idProjeto}/tarefas/{id}/finish', [TarefaController::class, 'finish'])->name('tarefas.finish');

Route::get('/projetos/{idProjeto}/tarefas/{id}/edit', [TarefaController::class, 'edit'])->name('tarefas.edit');
Route::put('/projetos/{idProjeto}/tarefas/{id}/update', [TarefaController::class, 'update'])->name('tarefas.update');

Route::get('/projetos/{idProjeto}/tarefas/{id}/destroy', [TarefaController::class, 'destroy'])->name('tarefas.destroy');
Route::get('/projetos/{idProjeto}/tarefas/trash', [TarefaController::class, 'trash'])->name('tarefas.trash');
Route::get('/projetos/{idProjeto}/tarefas/{id}/restore', [TarefaController::class, 'restore'])->name('tarefas.restore');
Route::get('/projetos/{idProjeto}/tarefas/{id}/forceDelete', [TarefaController::class, 'forceDelete'])->name('tarefas.forceDelete');
