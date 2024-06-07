<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lenguaje extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'pronunciacion',
        'significado',
        'content_id',
    ];

    public function contents(): BelongsTo
    {
        return $this->belongsTo(Content::class);
    }
}