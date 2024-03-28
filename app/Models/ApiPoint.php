<?php

namespace App\Models;

use App\Http\Filters\SiteFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApiPoint extends Model
{
    use HasFactory;

    protected $table = 'api_points';

    protected $fillable = [
        'name',
        'url',
        'request_data',
        'response_data',
        'service',
        'created_at',
        'updated_at'
    ];
    protected $guarded = false;

    public function api_history(): HasMany
    {
        return $this->hasMany(ApiPointHistory::class);
    }

    public function scopeFilter($request)
    {
        $query = $this::query();

        $filter = new SiteFilter();

        return $filter->apply($query, $request);
    }
}
