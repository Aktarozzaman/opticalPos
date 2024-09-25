<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationSms extends Model
{
    protected $fillable = [
        'user_type',
        'message',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'User_id');
    }

    public function smshistory(){
        return $this->hasMany(SmsHistory::class);
    }
}
