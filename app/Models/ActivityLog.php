<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'user_id',
        'user_type_id',
        'activity_id',
        'activity_model',
        'activity_name',
        'activity_description',
        'user_agent',
        'user_ip',
    ];
    public static function log($activityModel, $activityId, $activityName, $description = null)
    {
        return self::create([
            'user_id' => auth()->id(),
            'user_type_id' => auth()->user()->role ?? null,
            'activity_id' => $activityId,
            'activity_model' => $activityModel,
            'activity_name' => $activityName,
            'activity_description' => $description,
            'user_ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
