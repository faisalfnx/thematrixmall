<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'codeuser','namatoko', 'alamat', 'email', 'jenistoko','slogantoko','sampultoko',
    ];
}
