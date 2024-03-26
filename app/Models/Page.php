<?php

namespace App\Models;

use App\Http\Filters\PageFilter;
use App\Http\Filters\SiteFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    protected $guarded = false;

    public function site(): BelongsTo
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

    public function scopeFilter($request)
    {
        $query = $this::query();

        $filter = new PageFilter();

        return $filter->apply($query, $request);
    }
}
