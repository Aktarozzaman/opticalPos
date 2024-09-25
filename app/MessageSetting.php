<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageSetting extends Model
{
    protected $fillable = ['business_id', 'enable_sale', 'enable_sale_return', 'enable_sale_replace', 'enable_due_receive', 'enable_due_payment', 'enable_installment'];
}