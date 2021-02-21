<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailAddress extends Model
{
    protected $fillable = [
        'user_id',
        'email_address'
    ];
    use HasFactory;
}
