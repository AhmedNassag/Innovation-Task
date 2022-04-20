<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $table    = 'user_addresses';
    protected $fillable = ['address','secondAddress','user_id'];
    protected $hidden   = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
