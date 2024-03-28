<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApiPointHistory extends Model
{
    use HasFactory;

    protected $table = 'api_points_history';

    protected $fillable = [
        'api_point_id',
        'status_code',
        'response_time',
        'created_at',
        'updated_at'
    ];

    public function api_point(): BelongsTo
    {
        return $this->belongsTo(ApiPoint::class);
    }
}
