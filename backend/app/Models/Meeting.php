<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Meeting extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'organizer_id',
        'start_time',
        'end_time',
        'location',
        'participants',
    ];


    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'participants' => 'array',
    ];


    public function organizer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }
}
