<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    protected $guarded = false;

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

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
        return $this->belongsToMany(User::class, 'user_page');
    }
}
