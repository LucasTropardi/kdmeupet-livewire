<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Situacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'situacao', // string
    ];

    public function animais(): HasMany
    {
        return $this->hasMany(Animal::class, 'situacao_id', 'id');
    }
}
