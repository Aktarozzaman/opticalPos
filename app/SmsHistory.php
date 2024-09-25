<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsHistory extends Model
{
    protected $fillable = [
        'notification_sms_id', 
        'user_type',
        'contact_id',
        'message',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function smsnotify(){
        return $this->belongsTo(NotificationSms::class,'notification_sms_id');
    }
}
