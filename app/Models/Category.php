<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timeStamps = false;
    protected $primaryKey = 'category_id';
    protected $table = 'category';

    protected $fillable = [
        'category_title'
    ];
}
