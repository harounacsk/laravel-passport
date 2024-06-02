<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Price extends Model
{
    use HasFactory;

    protected $fillable =["article","distributor","price"];

    public $timestamps = false;

    public function article():BelongsTo
    {
        return $this->belongsTo(Article::class,"article");
    }
}
