<?php

namespace Modules\Superadmin\Entities;

use Illuminate\Database\Eloquent\Model;

class SuperadminNotice extends Model
{
    protected $fillable = ['id', 'notice_message'];
}
