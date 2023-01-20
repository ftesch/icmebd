<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ebds extends Model
{
    use HasFactory;

    protected $table = "ebds";

    protected $fillable = ["data_ebd", "data_limite"];

    public function perguntas()
    {
        return $this->hasMany(Perguntas::class, "ebd_id", "id");
    }

    public function respostas()
    {
        return $this->hasMany(Respostas::class, "ebd_id", "id");
    }


}
