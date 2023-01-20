<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perguntas extends Model
{
    use HasFactory;

    private $colorClasse = [
        "TODOS" => "bg-cyan-700",
        "CIAS" => "bg-purple-700",
        "JOVENS" => "bg-green-700",
        "VARÕES" => "bg-blue-700",
        "SENHORAS" => "bg-rose-700",
    ];

    protected $table = "perguntas";
    protected $fillable = ["ebd_id", "pergunta", "resposta","classe", "numero","texto_referencia"];

    protected function background(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $this->colorClasse[$attributes['classe']],
        );
    }

    public function respostas()
    {
        return $this->hasMany(Respostas::class,'pergunta_id','id' );
    }
}
