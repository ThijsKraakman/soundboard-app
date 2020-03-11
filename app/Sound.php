<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Sound extends Model
{
    protected $guarded = [];

    protected $appends = [
        'likeCount',
        'isLiked',
        'isOwner'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Likes::class);
    }

    public function like()
    {
        if(! $this->likes()->where(['user_id' => auth()->id()])->exists()) {
            $points = Points::firstOrCreate(['user_id' => $this->owner->id]);

            $points->awardPoints($this->owner, 100);
            $points->save();
            return $this->likes()->create(['user_id' => auth()->id()]); //give like
        } else {
            $this->likes()->where('user_id', auth()->id())->first()->delete(); //remove like
        }
    }

    public function isLiked()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    public function getLikeCountAttribute()
    {
        return $this->likes()->count();
    }

    public function getIsLikedAttribute()
    {
        return $this->isLiked();
    }

    public function getIsOwnerAttribute()
    {
        if (auth()->id() === $this->owner->id) {
            return true;
        } else {
            return false;
        }
    }
}
