<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "price", "depot"
    ];

    public $timestamps = false;

    public function depot(): BelongsTo
    {
        return $this->belongsTo(Depot::class, "depot");
    }

    public function prices(): HasMany
    {
        return $this->hasMany(Price::class,"article");
    }
}
