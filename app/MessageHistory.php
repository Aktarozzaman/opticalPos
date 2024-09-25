<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageHistory extends Model
{
    protected $fillable = ['_token', 'business_id', 'sms_count', 'status', 'sms_type', 'mobile_number', 'temp_message_id', 'message', 'response'];
}