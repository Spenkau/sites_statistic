<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Site extends Model
{
    use HasFactory;

    protected $table = 'sites';

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')
            ->with('children', 'details');
    }

    public function details(): HasMany
    {
        return $this->hasMany(Detail::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_site');
    }
}
