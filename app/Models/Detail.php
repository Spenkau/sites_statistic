<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detail extends Model
{
    use HasFactory;

    protected $table = 'details';

    protected $guarded = false;

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
