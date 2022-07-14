<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{

    protected $table = 'encomendas';

    protected $fillable = [
        'codhistorico',
        'codstatus',
        'dtstatus',
        'hrstatus',
        'status',
        'observacao',
        'codremessa',
    ];

}
