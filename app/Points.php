<?php

namespace App;

use App\Events\UserEarnedPoints;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    protected $fillable = [
        'user_id', 'points'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function awardPoints(User $user, $pointsToAdd)
    {
        $this->user()->associate($user);
        $this->points = $this->user->getPoints() + $pointsToAdd;

        UserEarnedPoints::dispatch($this->user, $pointsToAdd, $this->points);
        return $this;
    }
}
