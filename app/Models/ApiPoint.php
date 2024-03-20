<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApiPoint extends Model
{
    use HasFactory;

    protected $table = 'api_points';

    protected $guarded = false;

    public function api_history(): HasMany
    {
        return $this->hasMany(ApiPointHistory::class);
    }
}
