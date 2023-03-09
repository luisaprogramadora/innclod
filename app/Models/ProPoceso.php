<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProPoceso extends Model
{
    use HasFactory;
    protected $table = 'pro_pocesos';
    protected $fillable = [
        'pro_prefijo',
        'pro_nombre'
    ];
}
