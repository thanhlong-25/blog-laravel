<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timeStamps = false;
    protected $primaryKey = 'customer_id';
    protected $table = 'customer';

    protected $fillable = [
        'customer_id', 
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_password',
    ];
}
