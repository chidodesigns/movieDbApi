<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\User;

class Movie extends Model
{
    use Searchable;
    
    protected $guarded = [];

    protected $casts = [
        'writers' => 'array',
        'stars' => 'array'
    ];

       //  Know how to access its own resource
       public function path()
       {
           return '/movies/' . $this->id;
       }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
