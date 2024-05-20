<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projeto extends Model
{
    use HasFactory;

    use SoftDeletes; // Adicione esta linha para habilitar o soft delete

    protected $fillable = [
        'id',
        'titulo',
        'slug',
        'descricao',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }

    public static function boot ()
    {
        parent::boot();

        self::deleting(function ($projeto) {
            foreach ($projeto->tarefas as $tarefa){
                $tarefa->delete();
            }
        });

        self::restoring(function ($projeto) {
            
            foreach ($projeto->tarefas()->onlyTrashed()->get() as $tarefa){
                if( $tarefa->deleted_at >= $projeto->deleted_at ){
                    $tarefa->restore();
                }

            }
            
        });
    }
}
