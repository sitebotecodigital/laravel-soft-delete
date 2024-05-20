<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarefa extends Model
{
    use HasFactory;

    use SoftDeletes; // Adicione esta linha para habilitar o soft delete


    protected $fillable = [
        'id',
        'projeto_id',
        'titulo',
        'slug',
        'descricao',
        'inicio_em',
        'fim_em',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $casts = [
        'inicio_em' => 'datetime',
        'fim_em' => 'datetime',
    ];


    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }
}
