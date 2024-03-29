<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Raca extends Model
{
    use HasFactory;

    protected $fillable = [
        'especie_id', // string
        'racaNome', // string
    ];

    public function especie(): BelongsTo
    {
        return $this->belongsTo(Especie::class, 'especie_id', 'id');
    }

    public function animais(): HasMany
    {
        return $this->hasMany(Animal::class, 'raca_id', 'id');
    }

    public function adocao(): HasMany
    {
        return $this->hasMany(Adocao::class, 'raca_id', 'id');
    }
}
