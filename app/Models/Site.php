<?php

namespace App\Models;

use App\Http\Filters\BaseFilter;
use App\Http\Filters\SiteFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;

class Site extends Model
{
    use HasFactory;

    protected $table = 'sites';

    protected $fillable = [
        'name',
        'url',
        'comment',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'site_user');
    }

    public function scopeFilter($request)
    {
        $query = $this::query();

        $filter = new SiteFilter();

        return $filter->apply($query, $request);
    }
}
