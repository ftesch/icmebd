<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respostas extends Model
{
    use HasFactory;
    protected $table = "respostas";

    protected $fillable = ['ebd_id','user_id','pergunta_id','resposta'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
