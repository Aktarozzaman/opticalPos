<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Group extends Model
{
    protected $fillable = [
        'group_name',
        'business_id',
    ];

    public function GroupContact()
    {
        return $this->hasMany(GroupContact::class);
    }
}
