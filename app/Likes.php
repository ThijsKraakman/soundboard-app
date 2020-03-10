<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $guarded = [];

    public function sounds()
    {
        return $this->hasMany(Sound::class);
    }
}
