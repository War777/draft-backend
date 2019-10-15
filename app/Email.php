<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{

    protected $table = 'emails';

    protected $fillable = [
        'subject', 'body', 'user_id',
    ];
}
