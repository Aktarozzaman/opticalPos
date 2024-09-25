<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMSBuyHistory extends Model
{
    protected $fillable = ['_token', 'business_id', 'mobile_number', 'sms_count', 'rand_number','purches__date', 'amount', 'status',];
}