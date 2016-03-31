<?php

namespace App\Domains;

use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
    /* @var string */
    protected $table = 'phrases';

    public $dates = ['date'];

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'participantId',
        'receipt',
        'message',
        'date',
        'active',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participantId', 'id');
    }

}
