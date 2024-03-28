<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detail extends Model
{
    use HasFactory;

    protected $table = 'details';

    protected $fillable = [
        'page_id',
        'status_code',
        'response_time',
        'error',
        'created_at',
        'updated_at'
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
