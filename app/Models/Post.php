<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    // protected $connection = 'mysql_old';

    // protected $table = 'beitraege';

    use HasFactory;
    use SoftDeletes;

    // protected $fillable = [
    //     'title',
    //     'content'
    // ];

    protected $guarded = [
        'created_at',
    ];

    // get - accessor | set - mutator
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst(strtolower($value)),
            set: fn ($value) => ucfirst(strtolower($value)),
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        // Falls nicht standardisierter pivot table name,
        // dann als 2. Parameter pivot Table namen mitgeben
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
