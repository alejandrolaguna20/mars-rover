<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'message',
        'details',
        'type'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type' => 'string',
    ];

    /**
     * Get the user that owns the mission log.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the log types available.
     *
     * @return array
     */
    public static function getTypes(): array
    {
        return [
            'INFO' => 'Information',
            'WARNING' => 'Warning',
            'SUCCESS' => 'Success',
            'DANGER' => 'Danger'
        ];
    }
}
