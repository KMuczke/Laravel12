<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [
        'task',
        'begindate',
        'enddate',
        'user_id',
        'project_id',
        'activity_id',
    ];

    // Remove or comment out the $casts to store dates as strings
    // protected $casts = [
    //     'begindate' => 'date',
    //     'enddate' => 'date',
    // ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }
}
