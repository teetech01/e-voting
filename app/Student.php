<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function vote_count()
    {
        return $this->hasMany('App\VotingLog', 'aspirant_id')->count();
    }

    public function post()
    {
        return $this->hasOne('App\PoliticalPost', 'id', 'political_post_id');
    }
}
