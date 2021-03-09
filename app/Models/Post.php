<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timeStamps = false;
    protected $primaryKey = 'post_id';
    protected $table = 'post';

    protected $fillable = [
        'post_title',
        'post_des',
        'post_image',
        'post_content',
        'post_view',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
