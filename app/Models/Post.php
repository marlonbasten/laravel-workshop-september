<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $connection = 'mysql_old';

    // protected $table = 'beitraege';

    use HasFactory;

    // protected $fillable = [
    //     'title',
    //     'content'
    // ];

    protected $guarded = [
        'created_at',
    ];
}
