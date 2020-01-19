<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoliticalPost extends Model
{
    public function candidate_count()
    {
        return $this->hasMany('App\Student', 'political_post_id')->count();
    }

    public function candidate()
    {
        return $this->hasMany('App\Student', 'political_post_id');
    }
}
