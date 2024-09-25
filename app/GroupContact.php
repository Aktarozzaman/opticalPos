<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupContact extends Model
{
    protected $fillable = [
        'group_id',
        'mobile_number',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
