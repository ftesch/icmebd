<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Igrejas extends Model
{
    use HasFactory;
    protected $table="igrejas";

    protected $fillable = ["codigo", "nome"];

    public function membros()
    {
        return $this->hasMany(Profile::class, 'igreja_id','id');
    }
}
