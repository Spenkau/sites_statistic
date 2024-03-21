<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApiPointHistory extends Model
{
    use HasFactory;

    protected $table = 'api_points_history';

    protected $guarded = false;

    public function api_point(): BelongsTo
    {
        return $this->belongsTo(ApiPoint::class);
    }
}
